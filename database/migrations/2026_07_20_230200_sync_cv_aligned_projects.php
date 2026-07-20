<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $projects = [
            [
                'title' => 'Full Stack Dynamic Portfolio',
                'description' => 'I built my personal portfolio in Laravel with an admin panel so projects, skills, experience, and contact messages can be updated without touching code. The site is deployed online for recruiters to review. Live: https://full-stack-dynamic-portfolio1.onrender.com',
                'tech_tags' => json_encode(['Laravel', 'PHP', 'Admin CMS', 'Docker', 'Render']),
                'category' => 'Web',
                'project_url' => 'https://github.com/Hasin-99/hasin-portfolio',
                'order' => 1,
            ],
            [
                'title' => 'PayKotha - Core Banking Wallet',
                'description' => 'I built a wallet-style banking simulation using FastAPI and React. It includes transfers, KYC tiers, OTP checks, double-entry ledger records, and audit logs to show how fintech systems are structured.',
                'tech_tags' => json_encode(['FastAPI', 'React', 'TypeScript', 'PostgreSQL', 'Redis', 'Docker']),
                'category' => 'Fintech',
                'project_url' => 'https://github.com/Hasin-99/PayKotha',
                'order' => 2,
            ],
            [
                'title' => 'StudentMove Flutter App',
                'description' => 'Our team built a Flutter mobile app for Dhaka students who rely on campus transport daily. It shows live bus schedules, route updates, announcements, and in-app chat so students know when to leave home or campus. Separate login and dashboards are set up for students, drivers, and admins.',
                'tech_tags' => json_encode(['Flutter', 'Dart', 'Firebase', 'Firestore', 'Cloud Functions', 'RBAC']),
                'category' => 'Mobile',
                'project_url' => 'https://github.com/Hasin-99/StudentMove_Flutter_App',
                'order' => 3,
            ],
            [
                'title' => 'StudentMove - Smart Transport Solution for Dhaka',
                'description' => 'I worked on a team Laravel platform for smart student transport in Dhaka. My work covered bus tracking, route management, subscription plans, notifications, and admin panels so transport can be monitored from one place.',
                'tech_tags' => json_encode(['Laravel', 'PHP', 'MySQL', 'Google Maps', 'OTP', 'Full Stack']),
                'category' => 'Full Stack',
                'project_url' => 'https://github.com/Tahis-Fzs/StudentMove-Smart-Transport-Solution-for-Dhaka',
                'order' => 4,
            ],
            [
                'title' => 'CKD Multimodal Detection (FYDP)',
                'description' => 'Our final-year thesis team developed a Python-based system to detect chronic kidney disease early using multiple data types, with explainable AI so results are easier to interpret for clinical review.',
                'tech_tags' => json_encode(['Python', 'Deep Learning', 'XAI', 'NHANES', 'MIMIC-IV', 'WESAD', 'Healthcare']),
                'category' => 'Deep Learning',
                'project_url' => 'https://github.com/Tahis-Fzs/ckd-multimodal-detection-',
                'order' => 5,
            ],
            [
                'title' => 'CICIDS2017 Intrusion & Insider Threat Detection',
                'description' => 'Our team built a Python pipeline to detect network intrusions and insider threats using the CICIDS2017 dataset. The project covers data preprocessing, model training, and evaluation for security analysis workflows.',
                'tech_tags' => json_encode(['Python', 'Security', 'ML', 'CICIDS2017', 'Anomaly Detection']),
                'category' => 'Security',
                'project_url' => 'https://github.com/Tahis-Fzs/cicids2017-intrusion-detection',
                'order' => 6,
            ],
            [
                'title' => 'Retinal OCT Deep Learning Classification',
                'description' => 'Our team trained deep learning models in Python to classify retinal OCT scans for disease screening. The work focuses on automated image classification to support early eye disease detection.',
                'tech_tags' => json_encode(['Python', 'EfficientNet', 'MobileNet', 'OCT2017', 'Medical Imaging']),
                'category' => 'Deep Learning',
                'project_url' => 'https://github.com/Tahis-Fzs/retinal-oct-deep-learning',
                'order' => 7,
            ],
            [
                'title' => 'AgroCulture - Farmer Marketplace',
                'description' => 'Our team developed a PHP and MySQL marketplace where farmers can list produce, manage carts, receive reviews, and publish posts on an agro blog. Buyers can browse and order from one web platform.',
                'tech_tags' => json_encode(['PHP', 'MySQL', 'E-commerce', 'Marketplace']),
                'category' => 'Web',
                'project_url' => 'https://github.com/Tahis-Fzs/agro-culture',
                'order' => 8,
            ],
            [
                'title' => 'OpenGL Maritime Day/Night Simulation',
                'description' => 'Our team created a C++ OpenGL simulation of a maritime scene with automatic day and night lighting, ocean rendering, a lighthouse, and animated ships. It was built as a graphics and simulation course project.',
                'tech_tags' => json_encode(['C++', 'OpenGL', 'GLUT', 'Graphics', 'Lighting']),
                'category' => 'Graphics',
                'project_url' => 'https://github.com/Tahis-Fzs/opengl-maritime-day-night',
                'order' => 9,
            ],
            [
                'title' => 'Smart Cart IoT - Intelligent Shopping Trolley',
                'description' => 'Our team developed a smart shopping trolley using ESP32 and RFID so items scan as they enter the cart, with live feedback on an LCD and inventory logging through PHP and MySQL for store demos.',
                'tech_tags' => json_encode(['ESP32', 'RFID', 'PHP', 'MySQL', 'Ultrasonic', 'IoT']),
                'category' => 'IoT',
                'project_url' => 'https://github.com/Tahis-Fzs/smart-cart-iot',
                'order' => 10,
            ],
            [
                'title' => 'CodeKotha - Bangla Programming Language',
                'description' => 'Our team designed and built a Bangla programming language compiler in C++17 with Qt. Users can write code in Bangla and run it through a command line or GUI interface, with C code generation behind the scenes.',
                'tech_tags' => json_encode(['C++17', 'Qt', 'Compiler', 'Lexer', 'AST', 'Bangla']),
                'category' => 'Compiler',
                'project_url' => 'https://github.com/Hasin-99/CodeKotha',
                'order' => 11,
            ],
            [
                'title' => 'Why So Serious Mail',
                'description' => 'For our OS lab course, our team built an offline mail client using Bash and Zenity. Messages are stored as files, sending runs as background processes, and the project demonstrates file handling, permissions, and basic system behavior.',
                'tech_tags' => json_encode(['Bash', 'Zenity', 'OS Concepts', 'Linux']),
                'category' => 'Systems',
                'project_url' => 'https://github.com/Hasin-99/why-so-serious-mail',
                'order' => 12,
            ],
        ];

        $now = now();

        foreach ($projects as $project) {
            $payload = array_merge($project, [
                'is_featured' => true,
                'is_active' => true,
                'updated_at' => $now,
            ]);

            $existing = DB::table('projects')->where('title', $project['title'])->first();

            if ($existing) {
                DB::table('projects')->where('id', $existing->id)->update($payload);
            } else {
                DB::table('projects')->insert(array_merge($payload, [
                    'created_at' => $now,
                ]));
            }
        }

        DB::table('projects')->where('title', 'AgroCulture (Organization Suite)')->delete();

        DB::table('settings')->updateOrInsert(
            ['key' => 'projects_count'],
            ['value' => '12', 'updated_at' => $now, 'created_at' => $now]
        );

        DB::table('settings')->updateOrInsert(
            ['key' => 'about_text_2'],
            [
                'value' => 'I work across mobile and web apps, machine learning, and information security fundamentals. I am comfortable with Python, Flutter, JavaScript, SQL, and modern tooling. Projects on this site include this Laravel portfolio CMS, PayKotha (FastAPI wallet with KYC and audit), StudentMove (Flutter and Laravel for student transport), CodeKotha (Bangla compiler in C++ and Qt), CKD multimodal detection with explainable AI, CICIDS2017 intrusion work, retinal OCT, AgroCulture, Smart Cart IoT, OpenGL maritime simulation, and Why So Serious Mail. Design experience at Nexaaverse and an Accenture Forage UI/UX simulation are extra detail beyond the CV project list.',
                'updated_at' => $now,
                'created_at' => $now,
            ]
        );
    }

    public function down(): void
    {
        DB::table('projects')->where('title', 'Full Stack Dynamic Portfolio')->delete();
    }
};
