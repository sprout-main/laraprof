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
        'slug' => 'github.com/sprout-main',
        'domain' => 'github.com/sprout-main',
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
            'name' => 'Bayugo Dental Clinic System',
            'type' => 'Full-Stack Dental Clinic Scheduling & Record Management Platform',
            'stack' => ['PHP', 'HTML5', 'CSS', 'JavaScript', 'MySQL'],
            'description' => 'Comprehensive scheduling and management platform engineered for Bayugo Dental Clinic. Features dynamic single-page routing with interactive calendars, robust user authentication, role-based access control (RBAC), and distinct data filtering separating notifications from patient messages.',
            'pills' => [
                ['label' => 'Full-Stack Web', 'variant' => 'gold'],
                ['label' => 'Interactive Calendar', 'variant' => 'crimson'],
                ['label' => 'RBAC', 'variant' => 'pearl'],
            ],
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
            'title' => 'Online Safety Through Netiquette',
            'issuer' => 'Department of Information and Communications Technology (DICT)',
            'year' => '2026',
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
