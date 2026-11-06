<?php

return [

    'name' => 'Jake Carlo G. Mandi',
    'initials' => 'JM',
    'role' => 'BSIT Student · Full-Stack Web Developer · UI/UX & Systems Builder',
    'tagline' => 'Building practical digital solutions with full-stack web development, database management, and system architecture.',

    'email' => 'mandijakecarlog@gmail.com',
    'location' => 'Abra, Philippines',

    'bio' => 'An Information Technology student (BSIT) at Data Center Colleges of The Philippines, focused on building practical digital solutions. Specializes in full-stack web development, database management, and system architecture, combined with a strong foundation in hardware troubleshooting and UI/UX design.',

    'socials' => [
        'github' => 'https://github.com/sprout-main',
        'email' => 'mailto:mandijakecarlog@gmail.com',
    ],

    'brand' => [
        'slug' => 'sprout.free.nf',
        'domain' => 'sprout.free.nf',
    ],

    'profile_image' => 'jm.jpg',

    'skills' => [
        [
            'group' => 'Programming & Core Web Languages',
            'items' => [
                ['name' => 'PHP', 'badge' => 'gold', 'focus' => 'Backend logic, system architecture, API routing, appointment workflows'],
                ['name' => 'JavaScript', 'badge' => 'gold', 'focus' => 'ESNext, single-page routing, interactive calendars, DOM manipulation, motion.dev'],
                ['name' => 'HTML5', 'badge' => 'crimson', 'focus' => 'Semantic DOM architecture, accessibility (WCAG), microdata'],
                ['name' => 'CSS3 / Tailwind', 'badge' => 'crimson', 'focus' => 'Modern responsive layouts, glassmorphic styling, fluid animations'],
                ['name' => 'VB.NET', 'badge' => 'pearl', 'focus' => 'Desktop application architecture, form controls, business logic'],
                ['name' => 'SQL / MySQL', 'badge' => 'pearl', 'focus' => 'Relational database schema design, querying, data persistence'],
            ],
        ],
        [
            'group' => 'Tools, Frameworks & Environments',
            'items' => [
                ['name' => 'PHP', 'badge' => null], ['name' => 'JavaScript', 'badge' => null], ['name' => 'VB.NET', 'badge' => null],
                ['name' => 'MySQL', 'badge' => null], ['name' => 'phpMyAdmin', 'badge' => null], ['name' => 'WordPress CMS', 'badge' => null],
                ['name' => 'Tailwind CSS', 'badge' => null], ['name' => 'Vite', 'badge' => null], ['name' => 'Composer', 'badge' => null],
                ['name' => 'npm', 'badge' => null], ['name' => 'VS Code', 'badge' => null], ['name' => 'Git', 'badge' => null],
                ['name' => 'GitHub CLI', 'badge' => null], ['name' => 'Windows PowerShell', 'badge' => null],
                ['name' => 'Microsoft Office 365', 'badge' => null], ['name' => 'Google Workspace', 'badge' => null],
            ],
        ],
        [
            'group' => 'Creative, Systems & Hardware',
            'items' => [
                ['name' => 'UI/UX Design', 'badge' => null], ['name' => 'Wireframing', 'badge' => null],
                ['name' => 'Roadmapping', 'badge' => null], ['name' => 'Interactive Prototyping (Figma)', 'badge' => null],
                ['name' => 'AI Prompting', 'badge' => null], ['name' => 'PC Assembly & Component Matching', 'badge' => null],
                ['name' => 'Hardware Diagnostics & Troubleshooting', 'badge' => null],
                ['name' => 'Precision Motorcycle Engine Tuning', 'badge' => null],
                ['name' => 'Problem-Solving', 'badge' => null], ['name' => 'Team Collaboration', 'badge' => null],
                ['name' => 'Technical Documentation', 'badge' => null], ['name' => 'Public Administration Support', 'badge' => null],
            ],
        ],
    ],

    'languages' => [
        ['name' => 'Filipino', 'level' => 'Fluent'],
        ['name' => 'English', 'level' => 'Conversational'],
        ['name' => 'Kapampangan', 'level' => 'Novice'],
        ['name' => 'Ilocano', 'level' => 'Novice'],
    ],

    'projects' => [
        [
            'id' => 'sarak',
            'name' => 'Sarak — Bangued Community Spatial Atlas',
            'type' => 'Community Geospatial Directory & Open Data Platform',
            'featured' => true,
            'live_url' => 'https://sarak.free.nf',
            'repo_url' => null,
            'description' => 'Interactive spatial atlas and verified community directory cataloging essential establishments, healthcare facilities, and points of interest across Bangued, Abra. Engineered with MariaDB Spatial extensions and audited crowdsourced moderation.',
            'stack' => ['Laravel 11', 'MariaDB Spatial GIS', 'Leaflet.js', 'OpenStreetMap', 'REST APIs', 'Tailwind CSS'],
            'pills' => [
                ['label' => 'Live System', 'variant' => 'gold'],
                ['label' => 'Open Data Export', 'variant' => 'pearl'],
            ],
            'screenshots' => [
                [
                    'src' => 'images/projects/sarak-1.png',
                    'title' => 'Sarak Login Page',
                    'caption' => 'Secure portal authentication and user access management for the community geospatial platform.',
                    'badge' => 'Login Page',
                ],
                [
                    'src' => 'images/projects/sarak-2.png',
                    'title' => 'POI Detail & Barangay Coverage Grid',
                    'caption' => 'Administrative coverage matrix, verified place cards, and citizen contribution queue with side-by-side diff review.',
                    'badge' => 'Directory & Data',
                ],
            ],
            'icon' => '🗺️',
        ],
        [
            'id' => 'bdc',
            'name' => 'Bayugo Dental Clinic System',
            'type' => 'Full-Stack Dental Clinic Scheduling & Record Management Platform',
            'featured' => true,
            'live_url' => null,
            'repo_url' => null,
            'description' => 'Comprehensive scheduling and clinical records platform engineered for Bayugo Dental Clinic. Features dynamic single-page routing with interactive calendars, robust authentication, role-based access control, and segregated patient-doctor messaging.',
            'stack' => ['PHP', 'JavaScript (ESNext)', 'MySQL', 'HTML5/CSS3', 'Vanilla JS SPA', 'RBAC'],
            'pills' => [
                ['label' => 'Clinical Operations', 'variant' => 'gold'],
                ['label' => 'Interactive Calendar', 'variant' => 'crimson'],
                ['label' => 'RBAC & Triage', 'variant' => 'pearl'],
            ],
            'screenshots' => [
                [
                    'src' => 'images/projects/bdc-1.png',
                    'title' => 'Bayugo Dental Clinic Landing Page',
                    'caption' => 'Official clinic homepage showcasing aesthetic dental services, consultation scheduling, and patient testimonials.',
                    'badge' => 'Landing Page',
                ],
                [
                    'src' => 'images/projects/bdc-2.png',
                    'title' => 'Clinic Portal Login Page',
                    'caption' => 'Administrative portal authentication gateway with role-based sign-in for clinic staff and patients.',
                    'badge' => 'Login Page',
                ],
            ],
            'icon' => '🦷',
        ],
        [
            'id' => 'laraprof',
            'name' => 'Laraprof Portfolio Engine',
            'featured' => false,
            'live_url' => null,
            'repo_url' => 'https://github.com/sprout-main/laraprof',
            'description' => 'High-performance zero-database portfolio engine built on Laravel 12. Delivers Awwwards-tier visual fidelity with Doppelwand concentric porcelain styling, 120fps motion spring physics, and WebGL ambient caustics.',
            'stack' => ['Laravel 12', 'Tailwind CSS v4', 'Three.js WebGL', 'Vite', 'motion.dev'],
            'pills' => [
                ['label' => 'Laravel 12', 'variant' => 'gold'],
                ['label' => 'Open Source', 'variant' => 'pearl'],
            ],
            'screenshots' => [],
            'icon' => '⚡',
        ],
        [
            'id' => 'somms',
            'name' => 'Student Offense Monitoring Management System (S.O.M.M.S)',
            'type' => 'Institutional Disciplinary Tracking & Incident Management System',
            'featured' => true,
            'live_url' => null,
            'repo_url' => null,
            'description' => 'Desktop disciplinary records management application engineered for academic institutions. Streamlines student profiling, incident cataloging, offense violation tracking, sanction assignments, and automated report generation.',
            'stack' => ['VB.NET', 'SQLite', 'Windows Forms', 'Data Analytics'],
            'pills' => [
                ['label' => 'Desktop System', 'variant' => 'gold'],
                ['label' => 'Offense Tracking', 'variant' => 'crimson'],
                ['label' => 'CRUD', 'variant' => 'pearl'],
            ],
            'screenshots' => [
                [
                    'src' => 'images/projects/somms-1.png',
                    'title' => '',
                    'caption' => 'Central monitoring console showcasing active violation cases, recent disciplinary incidents, student counts, and sanction status.',
                    'badge' => 'Dashboard',
                ],
                [
                    'src' => 'images/projects/somms-2.png',
                    'title' => '',
                    'caption' => 'Profiling interface for cataloging student information, department assignments, and automated student identification number generation.',
                    'badge' => 'Registration',
                ],
                [
                    'src' => 'images/projects/somms-3.png',
                    'title' => '',
                    'caption' => 'Secure credentials gateway providing role-based login access for disciplinary staff and school administrators.',
                    'badge' => 'Login Gateway',
                ],
                [
                    'src' => 'images/projects/somms-4.png',
                    'title' => '',
                    'caption' => 'Authentication confirmation feedback granting authorized administrative privileges for managing student disciplinary records.',
                    'badge' => 'Auth Verification',
                ],
            ],
            'icon' => '⚖️',
        ],
    ],

    'education' => [
        [
            'degree' => 'Bachelor of Science in Information Technology',
            'school' => 'Data Center Colleges of The Philippines',
            'place' => 'Bangued, Abra',
            'period' => '2023 — 2027',
            'current' => true,
        ],
        [
            'degree' => 'Humanities and Social Sciences (HUMSS)',
            'school' => 'Little Flower High School',
            'place' => 'Peñarrubia, Abra',
            'period' => '2017 — 2023',
            'current' => false,
        ],
    ],

    'certifications' => [
        [
            'id' => 'cisco-modern-ai',
            'title' => 'Introduction to Modern AI',
            'issuer' => 'Cisco Networking Academy',
            'category' => 'Artificial Intelligence & Machine Learning',
            'signatory' => 'Lynn Bloomer, Director, Cisco Networking Academy',
            'cert_id' => '454dda3c-6624-4587-bef6-b48e5e720965',
            'year' => '2026',
            'icon' => '🧠',
            'image' => 'images/certs/cisco-modern-ai.png',
            'badge_image' => 'images/certs/badges/cisco-modern-ai-badge.png',
            'pdf' => 'docs/certs/cisco-modern-ai.pdf',
            'pills' => [
                ['label' => 'Cisco Verified', 'variant' => 'gold'],
                ['label' => 'Generative AI', 'variant' => 'crimson'],
                ['label' => 'Global Credential', 'variant' => 'pearl'],
            ],
            'summary' => 'Comprehensive mastery of modern artificial intelligence foundations, deep neural network concepts, generative model workflows, and responsible AI alignment principles.',
            'skills' => ['Foundation Models', 'Prompt Architecture', 'Deep Learning Concepts', 'AI Ethics & Alignment'],
        ],
        [
            'id' => 'cisco-hardware-basics',
            'title' => 'Computer Hardware Basics',
            'issuer' => 'Cisco Networking Academy',
            'category' => 'Computer Architecture & Systems Engineering',
            'signatory' => 'Lynn Bloomer, Director, Cisco Networking Academy',
            'cert_id' => 'e885388f-37d2-4b2e-bba5-38919617dd4c',
            'year' => '2026',
            'icon' => '⚙️',
            'image' => 'images/certs/cisco-hardware-basics.png',
            'badge_image' => 'images/certs/badges/cisco-hardware-basics-badge.png',
            'pdf' => 'docs/certs/cisco-hardware-basics.pdf',
            'pills' => [
                ['label' => 'Cisco Verified', 'variant' => 'gold'],
                ['label' => 'Hardware Architecture', 'variant' => 'crimson'],
                ['label' => 'Diagnostics Pro', 'variant' => 'pearl'],
            ],
            'summary' => 'Hands-on validation of personal computer architecture, motherboards, bus protocols, component matching, electrical diagnostics, and preventative hardware maintenance.',
            'skills' => ['PC Assembly', 'Subsystem Troubleshooting', 'Component Matching', 'Bus Topologies'],
        ],
        [
            'id' => 'dict-startup-challenge',
            'title' => 'Philippine Startup Challenge XI: Understanding Startups & Idea Readiness',
            'issuer' => 'Department of Information and Communications Technology (DICT CAR)',
            'category' => 'Startup Incubation & Tech Entrepreneurship',
            'signatory' => 'Dir. Jimmy C. Daoaten, Regional Director, DICT CAR',
            'cert_id' => 'COP-WS11-2026-072',
            'year' => '2026',
            'icon' => '🚀',
            'image' => 'images/certs/dict-startup-challenge.png',
            'badge_image' => null,
            'pdf' => 'docs/certs/dict-startup-challenge.pdf',
            'pills' => [
                ['label' => 'DICT CAR', 'variant' => 'gold'],
                ['label' => 'Startup Challenge XI', 'variant' => 'crimson'],
                ['label' => 'Idea Incubation', 'variant' => 'pearl'],
            ],
            'summary' => 'High-intensity national startup development curriculum focused on lean venture validation, problem-solution fit analysis, and preparation for the Philippine Startup Challenge XI.',
            'skills' => ['Lean Canvas Validation', 'Pitch Architecture', 'Problem-Solution Fit', 'Ecosystem Navigation'],
        ],
        [
            'id' => 'dost-startup-cordillera',
            'title' => 'Startup Now Cordillera: Exploring Programs, Funding & Opportunities',
            'issuer' => 'Department of Science and Technology (DOST CAR)',
            'category' => 'GovTech R&D & Innovation Grants',
            'signatory' => 'Nancy A. Bantog, PhD, CESO III, Regional Director, DOST CAR',
            'cert_id' => '073 - CAR',
            'year' => '2026',
            'icon' => '💡',
            'image' => 'images/certs/dost-startup-cordillera.png',
            'badge_image' => null,
            'pdf' => 'docs/certs/dost-startup-cordillera.pdf',
            'pills' => [
                ['label' => 'DOST CAR', 'variant' => 'gold'],
                ['label' => 'R&D Grants', 'variant' => 'crimson'],
                ['label' => 'Regional Incubation', 'variant' => 'pearl'],
            ],
            'summary' => 'Advanced exploration of science and technology commercialization pathways, DOST technopreneurship incubation, government grant frameworks, and venture support mechanisms in the Cordillera Administrative Region.',
            'skills' => ['Technopreneurship', 'R&D Grant Pathways', 'Venture Financing', 'Regional Innovation'],
        ],
        [
            'id' => 'dict-netiquette',
            'title' => 'Online Safety Through Netiquette',
            'issuer' => 'Department of Information and Communications Technology (DICT Region II)',
            'category' => 'Cybersecurity Hygiene & Digital Ethics',
            'signatory' => 'Engr. Reynaldo T. Sy, PECE, Ph.D., Regional Director, DICT Region II',
            'cert_id' => 'DICT-R02-2026-NET',
            'year' => '2026',
            'icon' => '🛡️',
            'image' => 'images/certs/dict-netiquette.png',
            'badge_image' => null,
            'pdf' => 'docs/certs/dict-netiquette.pdf',
            'pills' => [
                ['label' => 'DICT Region II', 'variant' => 'gold'],
                ['label' => 'Cyber Hygiene', 'variant' => 'crimson'],
                ['label' => 'Digital Ethics', 'variant' => 'pearl'],
            ],
            'summary' => 'Official certification in ethical digital citizenship, communication protocols, cyber harassment prevention, and information hygiene across modern network platforms.',
            'skills' => ['Digital Ethics', 'Cyber Safety Protocols', 'Information Hygiene', 'Responsible Networking'],
        ],
    ],

    'experience' => [
        [
            'role' => 'IT Intern',
            'hours' => '288 Hours OJT',
            'org' => "Mayor's Office, Municipality of Peñarrubia, Abra",
            'period' => 'Mar 2023 — Apr 2023',
            'location' => 'Onsite',
            'highlights' => [
                'Administrative digitization, IT troubleshooting, and records processing.',
            ],
        ],
        [
            'role' => 'Crew Member',
            'org' => "McDonald's, Bangued, Abra",
            'period' => 'Dec 2025 — Mar 2026',
            'highlights' => [
                'Fast-paced customer service, inventory handling, and team coordination.',
            ],
        ],
    ],

    'interests' => [
        [
            'title' => 'Motorcycle Mechanics & Tuning',
            'description' => 'Precision fuel system optimization and valve clearance calibration.',
        ],
        [
            'title' => 'Custom PC Architecture',
            'description' => 'Hardware market pricing analytics, component matching, and custom desktop builds.',
        ],
        [
            'title' => 'Tactical Strategy & Fitness',
            'description' => 'Competitive chess play and physical strength conditioning.',
        ],
    ],
];
