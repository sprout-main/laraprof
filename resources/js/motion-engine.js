import { animate, inView, scroll, stagger } from 'motion';

/**
 * Laraprof Motion 12 Cinematic Physics Engine
 * Powered by motion (v14.9.1) & motion.dev primitives
 * 
 * Master Architectural Modules:
 * 1. Magnetic Pointer Physics with Spring Return (buttons & controls)
 * 2. 3D Gyroscopic Card Tilt & Dynamic Celluloid Specular Glare
 * 3. Velocity-Linked Multi-Track Scroll Scrubber & WebGL Turbulence
 * 4. Kinetic Word-by-Word Spring Staggering (Zero Content Alteration)
 * 5. 35mm Analog Projector Arc Lamp Ignition & Slide Transitions
 * 6. Vector SVG Stroke Path Tracing on Hover
 * 7. Accessibility: Inviolable prefers-reduced-motion fallback
 */

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/**
 * 1. 35mm Film Reel Scroll Progress Scrubber with Velocity Detection
 */
export function initFilmReelScrubber() {
    const progressEl = document.getElementById('film-reel-progress');
    if (prefersReducedMotion) return;

    scroll((progress, info) => {
        if (progressEl) {
            progressEl.style.transform = `scaleX(${progress})`;
        }

        // Velocity tracking for optical feedback
        if (info && typeof info.velocity === 'number') {
            const vel = Math.min(Math.abs(info.velocity) / 1400, 1.0);
            document.documentElement.style.setProperty('--scroll-velocity', vel.toFixed(3));
            
            // Broadcast event for WebGL particle turbulence
            window.dispatchEvent(new CustomEvent('laraprof-scroll-velocity', {
                detail: { velocity: vel }
            }));
        }
    });
}

/**
 * 2. InView Hardware-Accelerated Spring Reveals & Stagger Cascades
 */
export function initMotionReveals() {
    if (prefersReducedMotion) {
        document.querySelectorAll('.motion-reveal, .scroll-reveal, .motion-stagger-item, .word-token').forEach((el) => {
            el.style.opacity = '1';
            el.style.transform = 'none';
            el.style.filter = 'none';
            el.classList.add('revealed');
        });
        return;
    }

    // Standard section reveal (supports both .motion-reveal and .scroll-reveal)
    inView(
        '.motion-reveal, .scroll-reveal',
        (element) => {
            element.classList.add('revealed');
            animate(
                element,
                {
                    opacity: [0, 1],
                    y: [28, 0],
                    filter: ['blur(4px)', 'blur(0px)']
                },
                {
                    duration: 0.65,
                    type: 'spring',
                    stiffness: 240,
                    damping: 24
                }
            );
        },
        { margin: '0px 0px -40px 0px' }
    );

    // Staggered card groups
    inView(
        '.motion-stagger-parent',
        (element) => {
            const items = element.querySelectorAll('.motion-stagger-item, .scroll-reveal-item');
            if (!items.length) return;

            items.forEach((item) => item.classList.add('revealed'));
            animate(
                items,
                {
                    opacity: [0, 1],
                    y: [24, 0],
                    scale: [0.97, 1]
                },
                {
                    delay: stagger(0.06, { start: 0.05 }),
                    type: 'spring',
                    stiffness: 280,
                    damping: 22
                }
            );
        },
        { margin: '0px 0px -40px 0px' }
    );
}

export const initScrollReveal = initMotionReveals;

/**
 * 3. Kinetic Word-by-Word Typography Spring Staggering
 * Client-side tokenization guarantees ZERO alteration of original content text.
 */
export function initKineticTypography() {
    if (prefersReducedMotion) return;

    const headings = document.querySelectorAll('.motion-kinetic-heading');
    headings.forEach((heading) => {
        // Prevent double tokenization
        if (heading.dataset.tokenized === 'true') return;
        heading.dataset.tokenized = 'true';

        // Tokenize text nodes into word spans
        const processNode = (node) => {
            if (node.nodeType === Node.TEXT_NODE) {
                const words = node.textContent.split(/(\s+)/);
                if (words.length <= 1 && words[0].trim() === '') return node;
                
                const fragment = document.createDocumentFragment();
                words.forEach((w) => {
                    if (w.trim() === '') {
                        fragment.appendChild(document.createTextNode(w));
                    } else {
                        const span = document.createElement('span');
                        span.className = 'word-token inline-block';
                        span.textContent = w;
                        span.style.opacity = '0';
                        span.style.transform = 'translateY(24px) rotate(-1.5deg)';
                        fragment.appendChild(span);
                    }
                });
                return fragment;
            } else if (node.nodeType === Node.ELEMENT_NODE) {
                const childNodes = Array.from(node.childNodes);
                childNodes.forEach((child) => {
                    const replaced = processNode(child);
                    if (replaced !== child) {
                        node.replaceChild(replaced, child);
                    }
                });
            }
            return node;
        };

        Array.from(heading.childNodes).forEach((child) => {
            const replaced = processNode(child);
            if (replaced !== child) {
                heading.replaceChild(replaced, child);
            }
        });
    });

    inView(
        '.motion-kinetic-heading',
        (element) => {
            const tokens = element.querySelectorAll('.word-token');
            if (!tokens.length) return;

            animate(
                tokens,
                {
                    opacity: [0, 1],
                    y: [24, 0],
                    rotate: [-1.5, 0]
                },
                {
                    delay: stagger(0.04, { start: 0.08 }),
                    type: 'spring',
                    stiffness: 280,
                    damping: 20,
                    bounce: 0.15
                }
            );
        },
        { margin: '0px 0px -40px 0px' }
    );
}

/**
 * 4. Magnetic Pointer Physics (Buttons, Close Controls, Marquee Links)
 */
export function initMagneticButtons() {
    if (prefersReducedMotion) return;

    const magneticElements = document.querySelectorAll('[data-motion-magnetic="btn"], [data-motion-spring="btn"]');

    magneticElements.forEach((btn) => {
        let isPointerOver = false;

        btn.addEventListener('pointerenter', () => {
            isPointerOver = true;
        });

        btn.addEventListener('pointermove', (e) => {
            if (!isPointerOver) return;
            const rect = btn.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            
            // Subtle magnetic displacement factor
            const pullFactor = 0.35;
            const dx = (e.clientX - centerX) * pullFactor;
            const dy = (e.clientY - centerY) * pullFactor;

            animate(
                btn,
                { x: dx, y: dy, scale: 1.04 },
                {
                    type: 'spring',
                    stiffness: 340,
                    damping: 22,
                    mass: 0.4
                }
            );
        });

        btn.addEventListener('pointerleave', () => {
            isPointerOver = false;
            animate(
                btn,
                { x: 0, y: 0, scale: 1 },
                {
                    type: 'spring',
                    stiffness: 380,
                    damping: 24
                }
            );
        });

        btn.addEventListener('pointerdown', () => {
            animate(btn, { scale: 0.94 }, { duration: 0.1 });
        });

        btn.addEventListener('pointerup', () => {
            animate(
                btn,
                { scale: 1.04 },
                {
                    type: 'spring',
                    stiffness: 450,
                    damping: 18
                }
            );
        });
    });
}

/**
 * 5. 3D Gyroscopic Card Tilt & Specular Celluloid Glare
 */
export function initCard3DTilt() {
    if (prefersReducedMotion) return;

    const cards = document.querySelectorAll('[data-motion-tilt="card"], [data-motion-spring="card"]');

    cards.forEach((card) => {
        card.classList.add('motion-tilt-card');

        card.addEventListener('pointermove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            // Calculate rotational tilt angles (max ~6.5 deg)
            const rotX = -((y - rect.height / 2) / (rect.height / 2)) * 6.5;
            const rotY = ((x - rect.width / 2) / (rect.width / 2)) * 6.5;

            // Update CSS specular glare position
            const glareX = (x / rect.width) * 100;
            const glareY = (y / rect.height) * 100;
            card.style.setProperty('--glare-x', `${glareX}%`);
            card.style.setProperty('--glare-y', `${glareY}%`);
            card.style.setProperty('--glare-opacity', '1');

            animate(
                card,
                {
                    rotateX: rotX,
                    rotateY: rotY,
                    y: -6,
                    transformPerspective: 1200
                },
                {
                    type: 'spring',
                    stiffness: 320,
                    damping: 24,
                    mass: 0.5
                }
            );
        });

        card.addEventListener('pointerleave', () => {
            card.style.setProperty('--glare-opacity', '0');
            animate(
                card,
                {
                    rotateX: 0,
                    rotateY: 0,
                    y: 0,
                    transformPerspective: 1200
                },
                {
                    type: 'spring',
                    stiffness: 350,
                    damping: 25
                }
            );
        });
    });
}

/**
 * 6. 35mm Projector Lamp Ignition Modal Animation
 */
export function animateProjectorModalOpen(lightboxEl, modalDialogEl) {
    if (prefersReducedMotion) {
        lightboxEl.style.opacity = '1';
        return;
    }

    // Shutter backdrop fade
    animate(lightboxEl, { opacity: [0, 1] }, { duration: 0.22, ease: 'easeOut' });

    // Projector arc lamp ignition: double light oscillation pulse
    if (modalDialogEl) {
        animate(
            modalDialogEl,
            {
                opacity: [0, 0.95, 0.4, 1],
                scale: [0.93, 1.015, 1],
                y: [24, -2, 0]
            },
            {
                duration: 0.42,
                type: 'spring',
                stiffness: 340,
                damping: 25
            }
        );
    }
}

export function animateProjectorModalClose(lightboxEl, modalDialogEl, onComplete) {
    if (prefersReducedMotion) {
        if (onComplete) onComplete();
        return;
    }

    if (modalDialogEl) {
        animate(
            modalDialogEl,
            { opacity: [1, 0], scale: [1, 0.94], y: [0, 16] },
            { duration: 0.2, ease: 'easeIn' }
        );
    }

    const anim = animate(lightboxEl, { opacity: [1, 0] }, { duration: 0.22, ease: 'easeIn' });
    anim.then(() => {
        if (onComplete) onComplete();
    });
}

export function animateProjectorSlideChange(imgEl) {
    if (!imgEl || prefersReducedMotion) return;

    // Analog film slide cut with optical exposure flash
    animate(
        imgEl,
        {
            opacity: [0.2, 1],
            scale: [0.985, 1],
            filter: ['contrast(135%) brightness(120%)', 'contrast(100%) brightness(100%)']
        },
        {
            duration: 0.22,
            ease: 'easeOut'
        }
    );
}

/**
 * 7. Interactive Flashlight Beam on Viewport
 */
export function initFlashlightTracking() {
    let ticking = false;

    window.addEventListener('pointermove', (e) => {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                const x = (e.clientX / window.innerWidth) * 100;
                const y = (e.clientY / window.innerHeight) * 100;
                document.documentElement.style.setProperty('--flashlight-x', `${x}%`);
                document.documentElement.style.setProperty('--flashlight-y', `${y}%`);
                ticking = false;
            });
            ticking = true;
        }
    }, { passive: true });
}

/**
 * 8. Motion Smooth Tabs: Sliding Spring Nav Indicator
 * Inspired by Motion's shared layoutId tab pill indicator (motion.dev/examples)
 */
export function initSlidingNavIndicator() {
    const container = document.getElementById('nav-links-container');
    const pill = document.getElementById('nav-spring-pill');
    if (!container || !pill) return;

    const links = Array.from(container.querySelectorAll('.nav-link'));
    if (!links.length) return;
    let activeLink = null;

    function movePillTo(element, animateSpring = true) {
        if (!element) {
            animate(pill, { opacity: 0, scale: 0.95 }, { duration: 0.2 });
            return;
        }

        const left = element.offsetLeft;
        const top = element.offsetTop;
        const width = element.offsetWidth;
        const height = element.offsetHeight;

        if (animateSpring && !prefersReducedMotion) {
            animate(
                pill,
                {
                    x: left,
                    y: top,
                    width: width,
                    height: height,
                    opacity: 1,
                    scale: 1
                },
                {
                    type: 'spring',
                    stiffness: 420,
                    damping: 30,
                    mass: 0.35
                }
            );
        } else {
            pill.style.transform = `translate3d(${left}px, ${top}px, 0)`;
            pill.style.width = `${width}px`;
            pill.style.height = `${height}px`;
            pill.style.opacity = '1';
        }
    }

    links.forEach((link) => {
        link.addEventListener('pointerenter', () => {
            movePillTo(link, true);
        });
    });

    container.addEventListener('pointerleave', () => {
        movePillTo(activeLink, true);
    });

    // Auto-track active section while scrolling
    const sectionIds = ['about', 'skills', 'projects', 'experience', 'education'];
    const sectionEls = sectionIds.map((id) => document.getElementById(id)).filter(Boolean);

    if (sectionEls.length) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const id = entry.target.id;
                        const matchingLink = container.querySelector(`a[href="#${id}"]`);
                        if (matchingLink) {
                            activeLink = matchingLink;
                            if (!container.matches(':hover')) {
                                movePillTo(activeLink, true);
                            }
                        }
                    }
                });
            },
            { threshold: 0.35, rootMargin: '-10% 0px -40% 0px' }
        );

        sectionEls.forEach((sec) => observer.observe(sec));
    }
}

/**
 * 9. 35mm Cinema Command Palette (⌘K)
 * Inspired by Motion Command Palette with arc-lamp ignite spring (motion.dev/examples/command-palette)
 */
export function initCommandPalette() {
    const palette = document.getElementById('cmd-palette');
    const trigger = document.getElementById('cmd-palette-trigger');
    const input = document.getElementById('cmd-palette-input');
    const list = document.getElementById('cmd-palette-list');
    if (!palette || !input || !list) return;

    const dialog = palette.querySelector('.cmd-palette-dialog') || palette.firstElementChild;
    const items = Array.from(list.querySelectorAll('.cmd-item'));
    let activeIdx = 0;

    function openPalette() {
        palette.classList.remove('hidden');
        palette.classList.add('flex');
        input.value = '';
        filterItems('');
        activeIdx = 0;
        updateActiveHighlight();
        setTimeout(() => input.focus(), 50);

        if (!prefersReducedMotion) {
            animate(palette, { opacity: [0, 1] }, { duration: 0.18 });
            animate(
                dialog,
                {
                    opacity: [0, 1],
                    scale: [0.94, 1],
                    y: [-16, 0]
                },
                {
                    type: 'spring',
                    stiffness: 380,
                    damping: 26
                }
            );
        }
    }

    function closePalette() {
        if (!prefersReducedMotion) {
            animate(palette, { opacity: [1, 0] }, { duration: 0.15 });
            animate(
                dialog,
                {
                    opacity: [1, 0],
                    scale: [1, 0.94],
                    y: [0, -12]
                },
                {
                    duration: 0.15,
                    ease: 'easeIn'
                }
            ).then(() => {
                palette.classList.remove('flex');
                palette.classList.add('hidden');
            });
        } else {
            palette.classList.remove('flex');
            palette.classList.add('hidden');
        }
    }

    function filterItems(query) {
        const q = query.trim().toLowerCase();
        let firstMatch = -1;

        items.forEach((item, idx) => {
            const key = (item.dataset.cmdKey || item.textContent).toLowerCase();
            const matches = !q || key.includes(q);
            item.style.display = matches ? 'flex' : 'none';
            if (matches && firstMatch === -1) {
                firstMatch = idx;
            }
        });

        activeIdx = firstMatch !== -1 ? firstMatch : 0;
        updateActiveHighlight();
    }

    function updateActiveHighlight() {
        const visibleItems = items.filter((el) => el.style.display !== 'none');
        items.forEach((el) => el.classList.remove('bg-amber-500/20', 'text-amber-300', 'border-l-2', 'border-amber-400'));
        
        if (visibleItems.length && activeIdx >= 0 && activeIdx < visibleItems.length) {
            const current = visibleItems[activeIdx];
            current.classList.add('bg-amber-500/20', 'text-amber-300', 'border-l-2', 'border-amber-400');
            current.scrollIntoView({ block: 'nearest' });
        }
    }

    function executeCurrentItem() {
        const visibleItems = items.filter((el) => el.style.display !== 'none');
        if (!visibleItems.length || activeIdx < 0 || activeIdx >= visibleItems.length) return;
        const current = visibleItems[activeIdx];

        closePalette();

        if (current.id === 'cmd-toggle-theme') {
            const themeBtn = document.getElementById('theme-toggle');
            if (themeBtn) themeBtn.click();
        } else if (current.dataset.cmdAction === 'project') {
            const projId = current.dataset.projectId;
            const lightboxTrigger = document.querySelector(`[data-open-lightbox][data-project-id="${projId}"]`);
            if (lightboxTrigger) lightboxTrigger.click();
        } else if (current.tagName === 'A' && current.getAttribute('href')) {
            const href = current.getAttribute('href');
            const target = document.querySelector(href);
            if (target) {
                setTimeout(() => target.scrollIntoView({ behavior: 'smooth', block: 'start' }), 120);
            }
        }
    }

    if (trigger) {
        trigger.addEventListener('click', openPalette);
    }

    palette.addEventListener('click', (e) => {
        if (e.target === palette) closePalette();
    });

    items.forEach((item) => {
        item.addEventListener('click', () => {
            const visible = items.filter((el) => el.style.display !== 'none');
            activeIdx = visible.indexOf(item);
            executeCurrentItem();
        });
        item.addEventListener('pointerenter', () => {
            const visible = items.filter((el) => el.style.display !== 'none');
            const vIdx = visible.indexOf(item);
            if (vIdx !== -1) {
                activeIdx = vIdx;
                updateActiveHighlight();
            }
        });
    });

    input.addEventListener('input', (e) => {
        filterItems(e.target.value);
    });

    input.addEventListener('keydown', (e) => {
        const visible = items.filter((el) => el.style.display !== 'none');
        if (!visible.length) return;

        if (e.key === 'ArrowDown') {
            e.preventDefault();
            activeIdx = (activeIdx + 1) % visible.length;
            updateActiveHighlight();
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            activeIdx = (activeIdx - 1 + visible.length) % visible.length;
            updateActiveHighlight();
        } else if (e.key === 'Enter') {
            e.preventDefault();
            executeCurrentItem();
        } else if (e.key === 'Escape') {
            e.preventDefault();
            closePalette();
        }
    });

    // Global keyboard shortcut: Cmd+K or Ctrl+K
    window.addEventListener('keydown', (e) => {
        if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') {
            e.preventDefault();
            if (palette.classList.contains('hidden')) {
                openPalette();
            } else {
                closePalette();
            }
        } else if (e.key === 'Escape' && !palette.classList.contains('hidden')) {
            closePalette();
        }
    });
}

/**
 * 10. Mac Dock Proximity Magnification
 * Inspired by Motion's Dock Magnification example (motion.dev/examples/dock)
 */
export function initDockMagnification() {
    if (prefersReducedMotion) return;

    const dockContainers = document.querySelectorAll('[data-motion-dock="true"]');
    
    dockContainers.forEach((dock) => {
        const items = Array.from(dock.querySelectorAll('[data-dock-item="true"], .screenshot-thumb-btn'));
        if (!items.length) return;

        const maxScale = 1.16;
        const maxDistance = 90;

        dock.addEventListener('pointermove', (e) => {
            const mouseX = e.clientX;
            const mouseY = e.clientY;

            items.forEach((item) => {
                const rect = item.getBoundingClientRect();
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;
                const distance = Math.hypot(mouseX - centerX, mouseY - centerY);

                if (distance < maxDistance) {
                    const factor = 1 - distance / maxDistance;
                    const scale = 1 + (maxScale - 1) * Math.sin(factor * (Math.PI / 2));
                    animate(
                        item,
                        { scale: scale },
                        { type: 'spring', stiffness: 450, damping: 25, mass: 0.3 }
                    );
                } else {
                    animate(
                        item,
                        { scale: 1 },
                        { type: 'spring', stiffness: 400, damping: 28 }
                    );
                }
            });
        });

        dock.addEventListener('pointerleave', () => {
            items.forEach((item) => {
                animate(
                    item,
                    { scale: 1 },
                    { type: 'spring', stiffness: 400, damping: 28 }
                );
            });
        });
    });
}

/**
 * 11. Celluloid Spotlight Cursor Follower
 * Inspired by Motion's Scroll Spotlight & Cursor Torch (motion.dev/examples)
 */
export function initSpotlightCursor() {
    const cards = document.querySelectorAll('.doppelwand');
    if (!cards.length) return;

    window.addEventListener('pointermove', (e) => {
        cards.forEach((card) => {
            const rect = card.getBoundingClientRect();
            if (rect.bottom < -100 || rect.top > window.innerHeight + 100) return;

            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.setProperty('--spotlight-x', `${x}px`);
            card.style.setProperty('--spotlight-y', `${y}px`);
        });
    }, { passive: true });
}

/**
 * Master Initialization Sequence
 */
export function initAllMotionEngine() {
    initFilmReelScrubber();
    initMotionReveals();
    initKineticTypography();
    initMagneticButtons();
    initCard3DTilt();
    initFlashlightTracking();
    initSlidingNavIndicator();
    initCommandPalette();
    initDockMagnification();
    initSpotlightCursor();
}
