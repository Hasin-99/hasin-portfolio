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
                'title' => 'Full Stack Dynamic Portfolio',
                'description' => 'I built my personal portfolio in Laravel with an admin panel so projects, skills, experience, and contact messages can be updated without touching code. The site is deployed online for recruiters to review. Live: https://full-stack-dynamic-portfolio1.onrender.com',
                'tech_tags' => ['Laravel', 'PHP', 'Admin CMS', 'Docker', 'Render'],
                'category' => 'Web',
                'project_url' => 'https://github.com/Hasin-99/hasin-portfolio',
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'PayKotha - Core Banking Wallet',
                'description' => 'I built a wallet-style banking simulation using FastAPI and React. It includes transfers, KYC tiers, OTP checks, double-entry ledger records, and audit logs to show how fintech systems are structured.',
                'tech_tags' => ['FastAPI', 'React', 'TypeScript', 'PostgreSQL', 'Redis', 'Docker'],
                'category' => 'Fintech',
                'project_url' => 'https://github.com/Hasin-99/PayKotha',
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'StudentMove Flutter App',
                'description' => 'Our team built a Flutter mobile app for Dhaka students who rely on campus transport daily. It shows live bus schedules, route updates, announcements, and in-app chat so students know when to leave home or campus. Separate login and dashboards are set up for students, drivers, and admins.',
                'tech_tags' => ['Flutter', 'Dart', 'Firebase', 'Firestore', 'Cloud Functions', 'RBAC'],
                'category' => 'Mobile',
                'project_url' => 'https://github.com/Hasin-99/StudentMove_Flutter_App',
                'is_featured' => true,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'StudentMove - Smart Transport Solution for Dhaka',
                'description' => 'I worked on a team Laravel platform for smart student transport in Dhaka. My work covered bus tracking, route management, subscription plans, notifications, and admin panels so transport can be monitored from one place.',
                'tech_tags' => ['Laravel', 'PHP', 'MySQL', 'Google Maps', 'OTP', 'Full Stack'],
                'category' => 'Full Stack',
                'project_url' => 'https://github.com/Tahis-Fzs/StudentMove-Smart-Transport-Solution-for-Dhaka',
                'is_featured' => true,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'CKD Multimodal Detection (FYDP)',
                'description' => 'Our final-year thesis team developed a Python-based system to detect chronic kidney disease early using multiple data types, with explainable AI so results are easier to interpret for clinical review.',
                'tech_tags' => ['Python', 'Deep Learning', 'XAI', 'NHANES', 'MIMIC-IV', 'WESAD', 'Healthcare'],
                'category' => 'Deep Learning',
                'project_url' => 'https://github.com/Tahis-Fzs/ckd-multimodal-detection-',
                'is_featured' => true,
                'is_active' => true,
                'order' => 5,
            ],
            [
                'title' => 'CICIDS2017 Intrusion & Insider Threat Detection',
                'description' => 'Our team built a Python pipeline to detect network intrusions and insider threats using the CICIDS2017 dataset. The project covers data preprocessing, model training, and evaluation for security analysis workflows.',
                'tech_tags' => ['Python', 'Security', 'ML', 'CICIDS2017', 'Anomaly Detection'],
                'category' => 'Security',
                'project_url' => 'https://github.com/Tahis-Fzs/cicids2017-intrusion-detection',
                'is_featured' => true,
                'is_active' => true,
                'order' => 6,
            ],
            [
                'title' => 'Retinal OCT Deep Learning Classification',
                'description' => 'Our team trained deep learning models in Python to classify retinal OCT scans for disease screening. The work focuses on automated image classification to support early eye disease detection.',
                'tech_tags' => ['Python', 'EfficientNet', 'MobileNet', 'OCT2017', 'Medical Imaging'],
                'category' => 'Deep Learning',
                'project_url' => 'https://github.com/Tahis-Fzs/retinal-oct-deep-learning',
                'is_featured' => true,
                'is_active' => true,
                'order' => 7,
            ],
            [
                'title' => 'AgroCulture - Farmer Marketplace',
                'description' => 'Our team developed a PHP and MySQL marketplace where farmers can list produce, manage carts, receive reviews, and publish posts on an agro blog. Buyers can browse and order from one web platform.',
                'tech_tags' => ['PHP', 'MySQL', 'E-commerce', 'Marketplace'],
                'category' => 'Web',
                'project_url' => 'https://github.com/Tahis-Fzs/agro-culture',
                'is_featured' => true,
                'is_active' => true,
                'order' => 8,
            ],
            [
                'title' => 'OpenGL Maritime Day/Night Simulation',
                'description' => 'Our team created a C++ OpenGL simulation of a maritime scene with automatic day and night lighting, ocean rendering, a lighthouse, and animated ships. It was built as a graphics and simulation course project.',
                'tech_tags' => ['C++', 'OpenGL', 'GLUT', 'Graphics', 'Lighting'],
                'category' => 'Graphics',
                'project_url' => 'https://github.com/Tahis-Fzs/opengl-maritime-day-night',
                'is_featured' => true,
                'is_active' => true,
                'order' => 9,
            ],
            [
                'title' => 'Smart Cart IoT - Intelligent Shopping Trolley',
                'description' => 'Our team developed a smart shopping trolley using ESP32 and RFID so items scan as they enter the cart, with live feedback on an LCD and inventory logging through PHP and MySQL for store demos.',
                'tech_tags' => ['ESP32', 'RFID', 'PHP', 'MySQL', 'Ultrasonic', 'IoT'],
                'category' => 'IoT',
                'project_url' => 'https://github.com/Tahis-Fzs/smart-cart-iot',
                'is_featured' => true,
                'is_active' => true,
                'order' => 10,
            ],
            [
                'title' => 'CodeKotha - Bangla Programming Language',
                'description' => 'Our team designed and built a Bangla programming language compiler in C++17 with Qt. Users can write code in Bangla and run it through a command line or GUI interface, with C code generation behind the scenes.',
                'tech_tags' => ['C++17', 'Qt', 'Compiler', 'Lexer', 'AST', 'Bangla'],
                'category' => 'Compiler',
                'project_url' => 'https://github.com/Hasin-99/CodeKotha',
                'is_featured' => true,
                'is_active' => true,
                'order' => 11,
            ],
            [
                'title' => 'Why So Serious Mail',
                'description' => 'For our OS lab course, our team built an offline mail client using Bash and Zenity. Messages are stored as files, sending runs as background processes, and the project demonstrates file handling, permissions, and basic system behavior.',
                'tech_tags' => ['Bash', 'Zenity', 'OS Concepts', 'Linux'],
                'category' => 'Systems',
                'project_url' => 'https://github.com/Hasin-99/why-so-serious-mail',
                'is_featured' => true,
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
            'about_text_2' => 'I work across mobile and web apps, machine learning, and information security fundamentals. I am comfortable with Python, Flutter, JavaScript, SQL, and modern tooling. Projects on this site include this Laravel portfolio CMS, PayKotha (FastAPI wallet with KYC and audit), StudentMove (Flutter and Laravel for student transport), CodeKotha (Bangla compiler in C++ and Qt), CKD multimodal detection with explainable AI, CICIDS2017 intrusion work, retinal OCT, AgroCulture, Smart Cart IoT, OpenGL maritime simulation, and Why So Serious Mail. Design experience at Nexaaverse and an Accenture Forage UI/UX simulation are extra detail beyond the CV project list.',
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
            // Do not wipe admin-uploaded resume/profile media on redeploy/seed
            if (in_array($key, ['resume_file', 'profile_image'], true) && Setting::get($key)) {
                continue;
            }
            Setting::set($key, $value);
        }
    }
}
