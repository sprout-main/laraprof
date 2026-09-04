import './bootstrap';

function initScrollReveal() {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    observer.unobserve(entry.target);
                    setTimeout(() => {
                        entry.target.style.transitionDelay = '';
                    }, 800 + parseFloat(entry.target.style.transitionDelay || '0'));
                }
            });
        },
        { threshold: 0.1, rootMargin: '0px 0px -40px 0px' }
    );

    document.querySelectorAll('.scroll-reveal').forEach((el, i) => {
        el.style.transitionDelay = `${i * 80}ms`;
        observer.observe(el);
    });
}

function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', (e) => {
            e.preventDefault();
            const target = document.querySelector(anchor.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initScrollReveal();
    initSmoothScroll();

    import('./webgl.js').catch(() => {
        const container = document.getElementById('webgl-bg');
        if (container) {
            container.style.background =
                'radial-gradient(ellipse at top left, rgba(245,208,97,0.15), transparent 60%), ' +
                'radial-gradient(circle at bottom right, rgba(220,38,38,0.1), transparent 50%), #FAFAF9';
        }
    });
});
