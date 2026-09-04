import * as THREE from 'three';

const container = document.getElementById('webgl-bg');
if (!container) throw new Error('WebGL container not found');

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 0.1, 1000);
camera.position.z = 30;

const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);
renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.5));
renderer.setClearColor(0x000000, 0);
container.appendChild(renderer.domElement);

const PARTICLE_COUNT = 90;
const particleGeometry = new THREE.BufferGeometry();
const positions = new Float32Array(PARTICLE_COUNT * 3);
const velocities = new Float32Array(PARTICLE_COUNT * 3);
const sizes = new Float32Array(PARTICLE_COUNT);
const opacities = new Float32Array(PARTICLE_COUNT);

for (let i = 0; i < PARTICLE_COUNT; i++) {
    const i3 = i * 3;
    positions[i3] = (Math.random() - 0.5) * 60;
    positions[i3 + 1] = (Math.random() - 0.5) * 60;
    positions[i3 + 2] = (Math.random() - 0.5) * 20;
    velocities[i3] = (Math.random() - 0.5) * 0.008;
    velocities[i3 + 1] = Math.random() * 0.005 + 0.002;
    velocities[i3 + 2] = (Math.random() - 0.5) * 0.003;
    sizes[i] = Math.random() * 4.0 + 1.5;
    opacities[i] = Math.random() * 0.7 + 0.4;
}

particleGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
particleGeometry.setAttribute('aSize', new THREE.BufferAttribute(sizes, 1));
particleGeometry.setAttribute('aOpacity', new THREE.BufferAttribute(opacities, 1));

const particleVertexShader = `
    attribute float aSize;
    attribute float aOpacity;
    varying float vOpacity;
    void main() {
        vOpacity = aOpacity;
        vec4 mvPosition = modelViewMatrix * vec4(position, 1.0);
        gl_PointSize = aSize * (300.0 / -mvPosition.z);
        gl_Position = projectionMatrix * mvPosition;
    }
`;

const particleFragmentShader = `
    varying float vOpacity;
    void main() {
        float dist = length(gl_PointCoord - vec2(0.5));
        if (dist > 0.5) discard;
        float alpha = smoothstep(0.5, 0.05, dist) * vOpacity;
        vec3 color = mix(vec3(0.95, 0.78, 0.35), vec3(1.0, 0.95, 0.75), dist * 0.4);
        gl_FragColor = vec4(color, alpha);
    }
`;

const particleMaterial = new THREE.ShaderMaterial({
    vertexShader: particleVertexShader,
    fragmentShader: particleFragmentShader,
    transparent: true,
    depthWrite: false,
    blending: THREE.AdditiveBlending,
});

const particles = new THREE.Points(particleGeometry, particleMaterial);
scene.add(particles);

const causticGeometry = new THREE.PlaneGeometry(80, 80);
const causticVertexShader = `
    varying vec2 vUv;
    void main() {
        vUv = uv;
        gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
    }
`;

const causticFragmentShader = `
    uniform float uTime;
    uniform vec2 uMouse;
    varying vec2 vUv;

    float caustic(vec2 uv, float t) {
        float c = 0.0;
        c += sin(uv.x * 3.0 + t * 0.7) * 0.5;
        c += sin(uv.y * 4.0 + t * 0.5) * 0.5;
        c += sin((uv.x + uv.y) * 2.5 + t * 0.3) * 0.5;
        c += cos(length(uv - 0.5) * 6.0 - t * 0.4) * 0.3;
        return c * 0.25;
    }

    void main() {
        vec2 uv = vUv;
        float mouseInfluence = smoothstep(0.4, 0.0, length(uv - uMouse));
        uv += mouseInfluence * 0.05;
        float c1 = caustic(uv, uTime);
        float c2 = caustic(uv + 0.3, uTime * 1.1);
        vec3 gold = vec3(0.85, 0.68, 0.22);
        vec3 crimson = vec3(0.88, 0.24, 0.27);
        vec3 color = mix(gold, crimson, c1 * 0.5 + 0.5);
        float alpha = (c1 + c2) * 0.12 * (1.0 - mouseInfluence * 0.3);
        gl_FragColor = vec4(color, alpha);
    }
`;

const causticMaterial = new THREE.ShaderMaterial({
    vertexShader: causticVertexShader,
    fragmentShader: causticFragmentShader,
    uniforms: {
        uTime: { value: 0 },
        uMouse: { value: new THREE.Vector2(0.5, 0.5) },
    },
    transparent: true,
    depthWrite: false,
    side: THREE.DoubleSide,
});

const causticPlane = new THREE.Mesh(causticGeometry, causticMaterial);
causticPlane.position.z = -10;
scene.add(causticPlane);

let mouseX = 0.5;
let mouseY = 0.5;

document.addEventListener('mousemove', (e) => {
    mouseX = e.clientX / window.innerWidth;
    mouseY = 1.0 - e.clientY / window.innerHeight;
});

window.addEventListener('resize', () => {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
});

const clock = new THREE.Clock();

function animate() {
    requestAnimationFrame(animate);
    const elapsed = clock.getElapsedTime();

    causticMaterial.uniforms.uTime.value = elapsed;
    causticMaterial.uniforms.uMouse.value.set(mouseX, mouseY);

    const posArray = particleGeometry.attributes.position.array;
    for (let i = 0; i < PARTICLE_COUNT; i++) {
        const i3 = i * 3;
        posArray[i3] += velocities[i3] + Math.sin(elapsed * 0.3 + i) * 0.003;
        posArray[i3 + 1] += velocities[i3 + 1];
        posArray[i3 + 2] += velocities[i3 + 2];
        if (posArray[i3 + 1] > 30) posArray[i3 + 1] = -30;
        if (posArray[i3] > 30) posArray[i3] = -30;
        if (posArray[i3] < -30) posArray[i3] = 30;
    }
    particleGeometry.attributes.position.needsUpdate = true;

    particles.rotation.y = elapsed * 0.02;
    particles.rotation.x = Math.sin(elapsed * 0.01) * 0.05;

    camera.position.x += (mouseX * 4 - 2 - camera.position.x) * 0.02;
    camera.position.y += (mouseY * 4 - 2 - camera.position.y) * 0.02;
    camera.lookAt(scene.position);

    renderer.render(scene, camera);
}

animate();
