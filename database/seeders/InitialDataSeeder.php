<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class InitialDataSeeder extends Seeder
{
    public function run(): void
    {
        Project::query()->delete();
        Skill::query()->delete();
        Experience::query()->delete();

        $projects = [
            [
                'title' => 'StudentMove Flutter App',
                'description' => 'Smart transportation mobile app for Dhaka students built with Flutter and a Firebase-first backend. Implements Firebase Authentication, Cloud Firestore (users, schedules, announcements, live buses, chat, preferences), Cloud Functions for privileged writes/audit events, and Storage for chat attachments. Role-based access, real-time schedules, announcements, and messaging for a campus-ready experience. Dev/prod flavors with optional emulator support.',
                'tech_tags' => ['Flutter', 'Dart', 'Firebase', 'Firestore', 'Cloud Functions', 'RBAC'],
                'category' => 'Mobile',
                'project_url' => 'https://github.com/Hasin-99/StudentMove_Flutter_App',
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'StudentMove - Smart Transport Solution for Dhaka',
                'description' => 'Full-stack smart transportation platform for Dhaka City students (5-member team, dedicated modules each). Features: student auth with email OTP, Google Maps routes, live bus GPS tracking (≈10s updates), ETA predictions, subscription plans with payment/invoices, push+email delay/route alerts, feedback system, driver tracking, and admin monitoring. Built to tackle real student mobility constraints across campus corridors.',
                'tech_tags' => ['Laravel', 'PHP', 'MySQL', 'Google Maps', 'OTP', 'Full Stack'],
                'category' => 'Full Stack',
                'project_url' => 'https://github.com/Tahis-Fzs/StudentMove-Smart-Transport-Solution-for-Dhaka',
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'PayKotha - Core Banking Wallet',
                'description' => 'Engineering-grade sandbox core-banking wallet (FastAPI + React/TypeScript + Postgres/Redis). Implements double-entry ledger with GL accounts, idempotency keys, KYC tiers (L0/L1/L2) with caps, step-up OTP above configurable amounts, PIN lockout, Redis rate limits, JWT+refresh, payment-rail adapters (sandbox/mock NPSB), maker-checker reversals, EOD settlement, reconciliation snapshots, audit log, and Prometheus metrics. Product surface: send, cash-in/out, recharge, bills, QR, bank rails, request money, savings, donate.',
                'tech_tags' => ['FastAPI', 'React', 'TypeScript', 'PostgreSQL', 'Redis', 'Docker', 'Anime.js'],
                'category' => 'Fintech',
                'project_url' => 'https://github.com/Hasin-99/PayKotha',
                'is_featured' => true,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'CKD Multimodal Detection (FYDP)',
                'description' => 'Deep learning framework for early chronic kidney disease risk prediction - DIU B.Sc. Final-Year Design Project. Four modality branches: NHANES population clinical, MIMIC-IV hospital EHR (primary), WESAD wearable physiology proxy, and exploratory multimodal fusion. Model families include logistic regression with calibration, tabular/residual MLPs, Random Forest, XGBoost, and wearable window-feature RF. Workflow covers leakage checks, grouped splits, operating-point selection, robustness, explainable AI, and a clinical decision-support demo. Research/education use - not a clinical diagnostic tool.',
                'tech_tags' => ['Python', 'Deep Learning', 'XAI', 'NHANES', 'MIMIC-IV', 'WESAD', 'Healthcare'],
                'category' => 'Deep Learning',
                'project_url' => 'https://github.com/Tahis-Fzs/ckd-multimodal-detection-',
                'is_featured' => true,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'CodeKotha - Bangla Programming Language',
                'description' => 'কোডকথা - write programs in Bangla, compile them like a real language. Compact C++17 compiler with lexer → parser → AST → codegen. Native Bangla keywords (পূর্ণসংখ্যা, যদি, নইলে, দেখাও), CLI (`codekotha`) and Qt GUI (`codekotha_gui`), dual output: interpret immediately or emit C source. Built as a Compiler Design course project demonstrating a classic front-end pipeline - not a string rewriter.',
                'tech_tags' => ['C++17', 'Qt', 'Compiler', 'Lexer', 'AST', 'Bangla'],
                'category' => 'Compiler',
                'project_url' => 'https://github.com/Hasin-99/CodeKotha',
                'is_featured' => true,
                'is_active' => true,
                'order' => 5,
            ],
            [
                'title' => 'CICIDS2017 Intrusion & Insider Threat Detection',
                'description' => 'Preprocessing and ML pipeline for network intrusion detection on the CICIDS2017 dataset and related security corpora. Focuses on practical anomaly recognition for intrusion and insider-threat scenarios with Python-based feature engineering, model training, and evaluation workflows.',
                'tech_tags' => ['Python', 'Security', 'ML', 'CICIDS2017', 'Anomaly Detection'],
                'category' => 'Security',
                'project_url' => 'https://github.com/Tahis-Fzs/cicids2017-intrusion-detection',
                'is_featured' => true,
                'is_active' => true,
                'order' => 6,
            ],
            [
                'title' => 'Retinal OCT Deep Learning Classification',
                'description' => 'Deep learning models for retinal OCT disease classification using EfficientNet and MobileNet on the OCT2017 dataset. Applies computer vision to ophthalmology screening workflows for disease detection from optical coherence tomography imagery.',
                'tech_tags' => ['Python', 'EfficientNet', 'MobileNet', 'OCT2017', 'Medical Imaging'],
                'category' => 'Deep Learning',
                'project_url' => 'https://github.com/Tahis-Fzs/retinal-oct-deep-learning',
                'is_featured' => true,
                'is_active' => true,
                'order' => 7,
            ],
            [
                'title' => 'OpenGL Maritime Day/Night Simulation',
                'description' => 'Interactive maritime scene simulation using C++ and OpenGL/GLUT with automated day/night lighting cycle, ocean rendering, lighthouse, and animated vessels. Demonstrates real-time graphics, lighting models, and scene animation.',
                'tech_tags' => ['C++', 'OpenGL', 'GLUT', 'Graphics', 'Lighting'],
                'category' => 'Graphics',
                'project_url' => 'https://github.com/Tahis-Fzs/opengl-maritime-day-night',
                'is_featured' => true,
                'is_active' => true,
                'order' => 8,
            ],
            [
                'title' => 'AgroCulture - Farmer Marketplace',
                'description' => 'PHP/MySQL agricultural e-commerce platform for farmer to buyer trading: product listings, cart management, reviews, and content publishing. Built to connect rural producers with buyers through a practical web storefront.',
                'tech_tags' => ['PHP', 'MySQL', 'E-commerce', 'Marketplace'],
                'category' => 'Web',
                'project_url' => 'https://github.com/Tahis-Fzs/agro-culture',
                'is_featured' => true,
                'is_active' => true,
                'order' => 9,
            ],
            [
                'title' => 'Smart Cart IoT - Intelligent Shopping Trolley',
                'description' => 'IoT smart shopping trolley (CSE234/CSE233 Embedded Systems & IoT Lab). RFID product scanning (MFRC522), ultrasonic obstacle detection, LCD status + buzzer, ESP32 Wi-Fi, PHP/MySQL inventory API (`smart_inventory`), optional Firebase product viewer and Flutter cart UI sketches. Scans RFID-tagged items into the cart with live billing feedback - reducing checkout friction for academic/demo use.',
                'tech_tags' => ['ESP32', 'RFID', 'PHP', 'MySQL', 'Ultrasonic', 'IoT'],
                'category' => 'IoT',
                'project_url' => 'https://github.com/Tahis-Fzs/smart-cart-iot',
                'is_featured' => true,
                'is_active' => true,
                'order' => 10,
            ],
            [
                'title' => 'Why So Serious Mail',
                'description' => 'CSE324 OS Lab - offline mail-management system using Bash and Zenity. Demonstrates operating-system concepts: file-based storage, process handling, and access permissions through a desktop GUI mail workflow without a network server.',
                'tech_tags' => ['Bash', 'Zenity', 'OS Concepts', 'Linux'],
                'category' => 'Systems',
                'project_url' => 'https://github.com/Hasin-99/why-so-serious-mail',
                'is_featured' => true,
                'is_active' => true,
                'order' => 11,
            ],
            [
                'title' => 'AgroCulture (Organization Suite)',
                'description' => 'Extended AgroCulture organization repositories exploring farmer marketplace variants and related agricultural product management flows in PHP - companion work to the core agro-culture marketplace.',
                'tech_tags' => ['PHP', 'MySQL', 'Agriculture', 'Web'],
                'category' => 'Web',
                'project_url' => 'https://github.com/Tahis-Fzs/AgroCulture',
                'is_featured' => false,
                'is_active' => true,
                'order' => 12,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        $skills = [
            [
                'title' => 'Python',
                'description' => 'ML pipelines, FastAPI services, data analysis, research tooling for CKD/OCT/security projects',
                'icon' => '01',
                'order' => 1,
            ],
            [
                'title' => 'Flutter & Dart',
                'description' => 'StudentMove mobile client - Firebase auth, Firestore realtime data, role-based UX',
                'icon' => '02',
                'order' => 2,
            ],
            [
                'title' => 'Laravel / PHP / MySQL',
                'description' => 'StudentMove platform, AgroCulture marketplace, Smart Cart inventory APIs',
                'icon' => '03',
                'order' => 3,
            ],
            [
                'title' => 'React / TypeScript / Node',
                'description' => 'PayKotha wallet UI, modern SPA patterns, API-driven frontends',
                'icon' => '04',
                'order' => 4,
            ],
            [
                'title' => 'C / C++ & OpenGL',
                'description' => 'CodeKotha compiler (C++17/Qt), maritime OpenGL/GLUT simulation',
                'icon' => '05',
                'order' => 5,
            ],
            [
                'title' => 'Machine Learning & Deep Learning',
                'description' => 'Multimodal CKD with XAI, EfficientNet/MobileNet OCT, CICIDS2017 intrusion models',
                'icon' => '06',
                'order' => 6,
            ],
            [
                'title' => 'Databases & Caching',
                'description' => 'SQL, MySQL, MongoDB, PostgreSQL, Redis - ledgers, inventories, session/rate-limit stores',
                'icon' => '07',
                'order' => 7,
            ],
            [
                'title' => 'IoT & Embedded',
                'description' => 'ESP32, RFID (MFRC522), ultrasonic, LCD/buzzer - Smart Cart trolley system',
                'icon' => '08',
                'order' => 8,
            ],
            [
                'title' => 'Information Security',
                'description' => 'Great Learning certification · intrusion detection pipelines · auth/OTP/KYC controls in PayKotha',
                'icon' => '09',
                'order' => 9,
            ],
            [
                'title' => 'UI/UX & Visual Design',
                'description' => 'Figma, Canva, Photoshop & Illustrator basics - dashboards, brand materials, product flows',
                'icon' => '10',
                'order' => 10,
            ],
            [
                'title' => 'Git, Collaboration & Delivery',
                'description' => 'GitHub workflows, team modules on StudentMove, documentation, professional communication',
                'icon' => '11',
                'order' => 11,
            ],
            [
                'title' => 'OOP & Data Structures',
                'description' => 'Strong fundamentals applied across compilers, APIs, mobile apps, and research codebases',
                'icon' => '12',
                'order' => 12,
            ],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        $experiences = [
            [
                'title' => 'Nexaaverse, UI/UX and Graphic Designer',
                'description' => 'February to April 2025. Designed UI for HR/CRM dashboards and created digital brand materials for product surfaces.',
                'icon' => 'Feb to Apr 2025',
                'order' => 1,
            ],
            [
                'title' => 'Accenture, UI/UX and Graphic Designer (Simulation)',
                'description' => 'November 2024 to April 2025. Forage product-design simulation covering feature iteration, wireframes, prototypes, and UX improvements.',
                'icon' => 'Nov 2024 to Apr 2025',
                'order' => 2,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }

        $defaultSettings = [
            'profile_name' => 'Md. Shadman Hasin',
            'profile_role' => 'Software Developer and IT Professional',
            'profile_bio' => 'CSE graduate from Daffodil International University. Thesis defended, certificate pending. I build StudentMove, PayKotha, CodeKotha, and clinical ML systems, and I am looking for full-time work in Dhaka or Faridpur.',
            'profile_image' => 'assets/images/profile.jpg',
            'resume_file' => 'assets/Md._Shadman_Hasin_CV.pdf',
            'experience_years' => '2+',
            'clients_count' => '5+',
            'projects_count' => '12+',
            'about_text_1' => 'I am Md. Shadman Hasin, a Computer Science and Engineering graduate from Daffodil International University. My thesis is defended and I am awaiting the final certificate. I am seeking an entry to mid-level full-time software role in Dhaka, and Faridpur is also fine if the team is right.',
            'about_text_2' => 'I work across mobile and web apps, machine learning, and information security fundamentals. I am comfortable with Python, Flutter, JavaScript, SQL, and modern tooling. Projects on this site include StudentMove (Flutter and Laravel for student transport), PayKotha (FastAPI wallet with KYC and audit), CodeKotha (Bangla compiler in C++ and Qt), CKD multimodal detection with explainable AI, CICIDS2017 intrusion work, retinal OCT, AgroCulture, Smart Cart IoT, OpenGL maritime simulation, and Why So Serious Mail. I also designed at Nexaaverse and completed an Accenture Forage UI/UX simulation.',
            'about_text_3' => 'My strengths include OOP, data structures, database management, Great Learning Information Security training, CITI biomedical research basics, and collaborative delivery. I learn quickly when a problem needs late-night focus. Bangla is high in reading, writing, and speaking. English is high in reading and writing, and medium in speaking. Permanent home is Faridpur. Current base is Daffodil Smart City, Savar, Dhaka.',
            'contact_email' => 'md.shadmanhasin520k82@gmail.com',
            'contact_phone' => '+880 1764-851551 · +880 1719-639794',
            'contact_location' => 'YKSG-1, Daffodil Smart City (DSC), Birulia, Savar, Dhaka 1340',
            'facebook_url' => 'https://www.facebook.com/share/1DXDNhmRdW/',
            'instagram_url' => 'https://www.instagram.com/shadman_hasin_99/',
            'linkedin_url' => 'https://www.linkedin.com/in/md-shadman-hasin-648587333',
            'github_url' => 'https://github.com/Hasin-99',
            'twitter_url' => 'https://x.com/shadman_hasin99',
            'threads_url' => 'https://www.threads.com/@shadman_hasin_99',
            'telegram_url' => 'https://t.me/Hasin_999',
            'whatsapp_url' => 'https://wa.me/8801764851551',
            'behance_url' => '',
            'dribbble_url' => '',
        ];

        foreach ($defaultSettings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
