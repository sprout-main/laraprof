import './bootstrap';
import {
    initAllMotionEngine,
    animateProjectorModalOpen,
    animateProjectorModalClose,
    animateProjectorSlideChange,
} from './motion-engine';
import { animate } from 'motion';

function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', (e) => {
            const href = anchor.getAttribute('href');
            if (!href || href === '#') return;
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
}

function initThemeSwitcher() {
    const toggleBtn = document.getElementById('theme-toggle');
    if (!toggleBtn) return;

    function applyTheme(isDark, persist = true) {
        if (isDark) {
            document.documentElement.classList.add('dark');
            const meta = document.querySelector('meta[name="color-scheme"]');
            if (meta) meta.content = 'dark';
            if (persist) localStorage.setItem('laraprof-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            const meta = document.querySelector('meta[name="color-scheme"]');
            if (meta) meta.content = 'light';
            if (persist) localStorage.setItem('laraprof-theme', 'light');
        }

        window.dispatchEvent(
            new CustomEvent('laraprof-theme-change', {
                detail: { theme: isDark ? 'dark' : 'light' },
            })
        );
    }

    toggleBtn.addEventListener('click', () => {
        const currentlyDark = document.documentElement.classList.contains('dark');
        applyTheme(!currentlyDark, true);

        // Motion shutter bounce on toggle click
        animate(
            toggleBtn,
            { rotate: [0, -15, 15, 0], scale: [1, 0.9, 1.15, 1] },
            { duration: 0.35, ease: 'easeOut' }
        );
    });
}

function initProjectShowcase() {
    // 1. Inline Thumbnail Switcher on Lobby Cards
    document.querySelectorAll('.screenshot-thumb-btn').forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const projectId = btn.dataset.thumbTarget;
            const src = btn.dataset.src;
            const badge = btn.dataset.badge;
            const title = btn.dataset.title;

            const previewImg = document.getElementById(`preview-img-${projectId}`);
            const previewBadge = document.getElementById(`preview-badge-${projectId}`);

            if (previewImg) {
                previewImg.src = src;
                previewImg.alt = title;
                animate(previewImg, { opacity: [0.2, 1], scale: [0.985, 1] }, { duration: 0.22, ease: 'easeOut' });
            }

            if (previewBadge) {
                previewBadge.textContent = badge;
            }

            // Update active state among siblings
            const parent = btn.closest('[data-project-card]');
            if (parent) {
                parent.querySelectorAll('.screenshot-thumb-btn').forEach((b) => {
                    b.classList.remove('active');
                    const ind = b.querySelector('.thumb-indicator');
                    if (ind) {
                        ind.classList.remove('bg-red-500');
                        ind.classList.add('bg-stone-300', 'dark:bg-stone-600');
                    }
                });
                btn.classList.add('active');
                const activeInd = btn.querySelector('.thumb-indicator');
                if (activeInd) {
                    activeInd.classList.remove('bg-stone-300', 'dark:bg-stone-600');
                    activeInd.classList.add('bg-red-500');
                }
            }
        });
    });

    // 2. 35mm Cinema Projector Lightbox Controller
    const lightbox = document.getElementById('project-lightbox');
    if (!lightbox) return;

    const modalDialog = lightbox.querySelector('.projector-dialog') || lightbox.firstElementChild;

    const projectsMap = {};
    const projectsDataEl = document.getElementById('projects-data');
    if (projectsDataEl) {
        try {
            const projects = JSON.parse(projectsDataEl.textContent);
            projects.forEach((p) => {
                projectsMap[p.id] = p;
            });
        } catch (err) {
            console.error('Failed to parse projects data', err);
        }
    }

    let currentProject = null;
    let currentIndex = 0;

    const imgEl = document.getElementById('lightbox-img');
    const titleEl = document.getElementById('lightbox-title');
    const subtitleEl = document.getElementById('lightbox-subtitle');
    const counterEl = document.getElementById('lightbox-counter');
    const captionEl = document.getElementById('lightbox-caption');
    const iconEl = document.getElementById('lightbox-icon');
    const liveLinkEl = document.getElementById('lightbox-live-link');
    const prevBtn = document.getElementById('lightbox-prev');
    const nextBtn = document.getElementById('lightbox-next');
    const closeBtn = document.getElementById('lightbox-close');

    function updateLightboxView() {
        if (!currentProject || !currentProject.screenshots || !currentProject.screenshots.length) return;
        const screenshots = currentProject.screenshots;
        if (currentIndex < 0) currentIndex = screenshots.length - 1;
        if (currentIndex >= screenshots.length) currentIndex = 0;

        const currentSs = screenshots[currentIndex];
        if (imgEl) {
            imgEl.src = currentSs.src;
            imgEl.alt = currentSs.title || `${currentProject.name} · ${currentSs.badge}`;
            animateProjectorSlideChange(imgEl);
        }

        if (currentSs.title) {
            if (titleEl) {
                titleEl.textContent = currentSs.title;
                titleEl.classList.remove('hidden');
            }
            if (subtitleEl) {
                subtitleEl.textContent = `${currentProject.name} · ${currentSs.badge}`;
                subtitleEl.classList.remove('hidden');
            }
        } else {
            if (titleEl) {
                titleEl.textContent = `${currentProject.name} · ${currentSs.badge}`;
                titleEl.classList.remove('hidden');
            }
            if (subtitleEl) {
                subtitleEl.textContent = '';
                subtitleEl.classList.add('hidden');
            }
        }
        if (counterEl) counterEl.textContent = `${currentIndex + 1} / ${screenshots.length}`;
        if (captionEl) captionEl.textContent = currentSs.caption;
        if (iconEl) iconEl.textContent = currentProject.icon || '🎬';

        if (liveLinkEl) {
            if (currentProject.live_url) {
                liveLinkEl.href = currentProject.live_url;
                liveLinkEl.classList.remove('hidden');
                liveLinkEl.classList.add('inline-flex');
            } else {
                liveLinkEl.classList.add('hidden');
                liveLinkEl.classList.remove('inline-flex');
            }
        }

        if (screenshots.length <= 1) {
            if (prevBtn) prevBtn.classList.add('hidden');
            if (nextBtn) nextBtn.classList.add('hidden');
        } else {
            if (prevBtn) prevBtn.classList.remove('hidden');
            if (nextBtn) nextBtn.classList.remove('hidden');
        }
    }

    function openLightbox(projectId, initialIndex = 0) {
        const proj = projectsMap[projectId];
        if (!proj || !proj.screenshots || !proj.screenshots.length) return;
        currentProject = proj;
        currentIndex = initialIndex;

        updateLightboxView();
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';

        animateProjectorModalOpen(lightbox, modalDialog);
    }

    function closeLightbox() {
        animateProjectorModalClose(lightbox, modalDialog, () => {
            lightbox.classList.remove('flex');
            lightbox.classList.add('hidden');
            document.body.style.overflow = '';
            currentProject = null;
        });
    }

    // Trigger open on any element with data-open-lightbox
    document.querySelectorAll('[data-open-lightbox]').forEach((el) => {
        el.addEventListener('click', (e) => {
            e.preventDefault();
            const projectId = el.dataset.projectId;
            let activeIdx = 0;
            const parent = el.closest('[data-project-card]');
            if (parent) {
                const activeBtn = parent.querySelector('.screenshot-thumb-btn.active');
                if (activeBtn && activeBtn.dataset.index) {
                    activeIdx = parseInt(activeBtn.dataset.index, 10);
                }
            }
            openLightbox(projectId, activeIdx);
        });
    });

    if (prevBtn) {
        prevBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            currentIndex--;
            updateLightboxView();
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            currentIndex++;
            updateLightboxView();
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            closeLightbox();
        });
    }

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (lightbox.classList.contains('hidden')) return;
        if (e.key === 'Escape') {
            closeLightbox();
        } else if (e.key === 'ArrowLeft') {
            currentIndex--;
            updateLightboxView();
        } else if (e.key === 'ArrowRight') {
            currentIndex++;
            updateLightboxView();
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initAllMotionEngine();
    initSmoothScroll();
    initThemeSwitcher();
    initProjectShowcase();

    import('./webgl.js').catch(() => {
        const container = document.getElementById('webgl-bg');
        if (container) {
            container.style.background =
                'radial-gradient(ellipse at top left, rgba(225,29,72,0.15), transparent 65%), ' +
                'radial-gradient(circle at bottom right, rgba(245,158,11,0.1), transparent 55%), var(--color-canvas)';
        }
    });
});
