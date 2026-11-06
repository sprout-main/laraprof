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

// Drifting Theatrical Embers & Ash
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
    velocities[i3] = (Math.random() - 0.5) * 0.009;
    velocities[i3 + 1] = Math.random() * 0.007 + 0.003;
    velocities[i3 + 2] = (Math.random() - 0.5) * 0.004;
    sizes[i] = Math.random() * 4.5 + 1.5;
    opacities[i] = Math.random() * 0.75 + 0.35;
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
    uniform float uDarkMode;
    varying float vOpacity;
    void main() {
        float dist = length(gl_PointCoord - vec2(0.5));
        if (dist > 0.5) discard;
        float alpha = smoothstep(0.5, 0.05, dist) * vOpacity;
        
        // Light mode: Aged brass celluloid flakes & dried oxblood
        vec3 lightEmber = mix(vec3(0.72, 0.32, 0.12), vec3(0.55, 0.08, 0.12), dist * 0.5);
        
        // Midnight Grindhouse: Fiery blood-red sparks & hot phosphor embers
        vec3 darkEmber = mix(vec3(1.0, 0.15, 0.25), vec3(1.0, 0.65, 0.15), dist * 0.6);
        vec3 color = mix(lightEmber, darkEmber, uDarkMode);
        
        gl_FragColor = vec4(color, alpha * mix(0.9, 1.4, uDarkMode));
    }
`;

const particleMaterial = new THREE.ShaderMaterial({
    vertexShader: particleVertexShader,
    fragmentShader: particleFragmentShader,
    uniforms: {
        uDarkMode: { value: document.documentElement.classList.contains('dark') ? 1.0 : 0.0 },
    },
    transparent: true,
    depthWrite: false,
    blending: THREE.AdditiveBlending,
});

const particles = new THREE.Points(particleGeometry, particleMaterial);
scene.add(particles);

// Eerie Spectral Mist Caustic Plane
const causticGeometry = new THREE.PlaneGeometry(85, 85);
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
    uniform float uDarkMode;
    varying vec2 vUv;

    float horrorMist(vec2 uv, float t) {
        float c = 0.0;
        c += sin(uv.x * 2.8 + t * 0.5) * 0.5;
        c += sin(uv.y * 3.6 + t * 0.4) * 0.5;
        c += sin((uv.x + uv.y) * 2.2 + t * 0.25) * 0.5;
        c += cos(length(uv - 0.5) * 5.0 - t * 0.35) * 0.35;
        return c * 0.25;
    }

    void main() {
        vec2 uv = vUv;
        float flashlight = smoothstep(0.45, 0.0, length(uv - uMouse));
        uv += flashlight * 0.04;
        
        float m1 = horrorMist(uv, uTime);
        float m2 = horrorMist(uv + 0.35, uTime * 1.15);

        // Sun-Bleached 35mm Celluloid light colors: warm sepia + deep theater oxblood
        vec3 sepiaHaze = vec3(0.82, 0.62, 0.42);
        vec3 oxbloodInk = vec3(0.65, 0.12, 0.18);
        vec3 lightColor = mix(sepiaHaze, oxbloodInk, m1 * 0.5 + 0.5);

        // Midnight Grindhouse dark colors: abyssal ruby mist + toxic phosphor rim
        vec3 deepRuby = vec3(0.75, 0.06, 0.18);
        vec3 toxicGlow = vec3(0.95, 0.20, 0.22);
        vec3 darkColor = mix(deepRuby, toxicGlow, m1 * 0.6 + 0.4);

        vec3 color = mix(lightColor, darkColor, uDarkMode);
        float baseAlpha = (m1 + m2) * mix(0.14, 0.24, uDarkMode) * (1.0 - flashlight * 0.25);
        gl_FragColor = vec4(color, baseAlpha);
    }
`;

const causticMaterial = new THREE.ShaderMaterial({
    vertexShader: causticVertexShader,
    fragmentShader: causticFragmentShader,
    uniforms: {
        uTime: { value: 0 },
        uMouse: { value: new THREE.Vector2(0.5, 0.5) },
        uDarkMode: { value: document.documentElement.classList.contains('dark') ? 1.0 : 0.0 },
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

// Theme Change Synchronization
let targetDarkMode = document.documentElement.classList.contains('dark') ? 1.0 : 0.0;
window.addEventListener('laraprof-theme-change', (e) => {
    targetDarkMode = e.detail && e.detail.theme === 'dark' ? 1.0 : 0.0;
});

// Velocity-linked ember turbulence
let turbulence = 1.0;
window.addEventListener('laraprof-scroll-velocity', (e) => {
    if (e.detail && typeof e.detail.velocity === 'number') {
        turbulence = 1.0 + Math.min(e.detail.velocity * 3.2, 4.0);
    }
});

const observer = new MutationObserver(() => {
    targetDarkMode = document.documentElement.classList.contains('dark') ? 1.0 : 0.0;
});
observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });

const clock = new THREE.Clock();

function renderLoop() {
    requestAnimationFrame(renderLoop);
    const elapsed = clock.getElapsedTime();

    const currentDark = causticMaterial.uniforms.uDarkMode.value;
    const newDark = currentDark + (targetDarkMode - currentDark) * 0.06;
    causticMaterial.uniforms.uDarkMode.value = newDark;
    particleMaterial.uniforms.uDarkMode.value = newDark;

    causticMaterial.uniforms.uTime.value = elapsed;
    causticMaterial.uniforms.uMouse.value.set(mouseX, mouseY);

    // Dynamic kinetic turbulence decay
    turbulence += (1.0 - turbulence) * 0.05;

    const posArray = particleGeometry.attributes.position.array;
    for (let i = 0; i < PARTICLE_COUNT; i++) {
        const i3 = i * 3;
        posArray[i3] += (velocities[i3] + Math.sin(elapsed * 0.35 + i) * 0.003) * turbulence;
        posArray[i3 + 1] += velocities[i3 + 1] * turbulence;
        posArray[i3 + 2] += velocities[i3 + 2] * turbulence;
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

renderLoop();
