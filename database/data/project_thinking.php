<?php

return [
    'Full Stack Dynamic Portfolio' => [
        'problem' => 'Recruiters and hiring managers needed one permanent place to review my work, resume, and contact options. Updating projects by editing code each time was slow and error-prone.',
        'approach' => 'Built a Laravel portfolio with an admin CMS for projects, skills, experience, and messages. Deployed with Docker on Render so the site stays online without local tunnels. Focused on clear navigation, fast pages, and content that matches my CV.',
        'impact' => 'I can update portfolio content without redeploying code for every text change. Recruiters get a live site, resume download, and GitHub links in one place.',
    ],
    'PayKotha - Core Banking Wallet' => [
        'problem' => 'Many student fintech demos only show UI transfers. They skip the hard parts: safe money movement, identity limits, and an auditable ledger that matches real banking constraints.',
        'approach' => 'Designed a wallet simulation with FastAPI and React. Used KYC tiers, OTP step-up checks, double-entry ledger records, and audit logs so each transfer can be traced. Chose this stack to separate API rules from the client UI and keep ledger logic testable.',
        'impact' => 'Hiring conversations can go past screens into trust decisions: who can move money, when OTP is required, and how every transfer stays auditable.',
    ],
    'StudentMove Flutter App' => [
        'problem' => 'Dhaka campus students often miss buses because schedules, delays, and driver updates live in scattered chats or posters. Waiting without reliable info wastes time every day.',
        'approach' => 'Our team built a Flutter app with Firebase for live schedules, announcements, chat, and role-based dashboards for students, drivers, and admins. Realtime data and separate logins keep each role focused on what they need.',
        'impact' => 'Students can check routes and updates before leaving home or campus. The app structure made it easier to extend alerts and admin control without mixing every role into one screen.',
    ],
    'StudentMove - Smart Transport Solution for Dhaka' => [
        'problem' => 'Campus transport was hard to monitor from one place: bus location, subscriptions, notifications, and admin oversight were split across tools and manual follow-up.',
        'approach' => 'On the team Laravel platform I worked on bus tracking, route management, subscription plans, notifications, and admin panels. The goal was one backend that operators and students could rely on for status and plans.',
        'impact' => 'Transport monitoring and subscriptions became easier to manage from a single system. My modules helped connect tracking data with user-facing alerts and admin workflows.',
    ],
    'CKD Multimodal Detection (FYDP)' => [
        'problem' => 'Early chronic kidney disease risk is hard to catch from one data source alone. Clinical teams also need explanations, not only a black-box score.',
        'approach' => 'Our thesis team built a Python pipeline using multiple data types and explainable AI so predictions are easier to review. We focused on careful evaluation and clear model outputs for research and education use.',
        'impact' => 'The project demonstrates multimodal ML thinking and XAI for clinical review contexts. It strengthened our ability to discuss leakage, evaluation, and why a model result should be interpretable.',
    ],
    'CICIDS2017 Intrusion & Insider Threat Detection' => [
        'problem' => 'Network logs are noisy and large. Without a clear preprocessing and evaluation pipeline, intrusion and insider-threat models are hard to trust.',
        'approach' => 'Our team built a Python workflow on CICIDS2017 covering cleaning, feature work, training, and evaluation for security analysis. We treated the dataset pipeline as part of the product, not an afterthought.',
        'impact' => 'The project shows how security ML needs disciplined data steps before accuracy claims. It became a practical base for discussing anomaly detection trade-offs.',
    ],
    'Retinal OCT Deep Learning Classification' => [
        'problem' => 'Manual review of retinal OCT scans is slow when screening volume grows. Early disease signals can be missed without consistent classification support.',
        'approach' => 'Our team trained deep learning models in Python (EfficientNet and MobileNet families) on OCT imagery for automated disease classification. We focused on a clear training and evaluation path for screening support.',
        'impact' => 'The work shows applied computer vision for medical imaging, with models aimed at faster first-pass screening support rather than replacing clinicians.',
    ],
    'AgroCulture - Farmer Marketplace' => [
        'problem' => 'Farmers and buyers lacked a simple shared web place to list produce, manage orders, and keep product updates without relying only on informal calls.',
        'approach' => 'Our team built a PHP and MySQL marketplace with listings, cart flow, reviews, and an agro blog. We kept the stack straightforward so core trading workflows stayed understandable and maintainable.',
        'impact' => 'Buyers and sellers can browse and order through one platform. The project highlights practical e-commerce flows for an agricultural use case.',
    ],
    'OpenGL Maritime Day/Night Simulation' => [
        'problem' => 'Graphics course work needed a real-time scene that proves lighting, animation, and rendering control, not only static shapes.',
        'approach' => 'Our team built a C++ OpenGL/GLUT maritime scene with day/night lighting, ocean rendering, a lighthouse, and animated ships. We structured the scene so lighting changes drive the mood of the simulation.',
        'impact' => 'The demo shows real-time graphics fundamentals: lighting cycles, animation, and scene composition in a readable academic project.',
    ],
    'Smart Cart IoT - Intelligent Shopping Trolley' => [
        'problem' => 'Checkout queues grow when every item must be scanned only at the counter. Demo stores need a clearer path from cart to bill.',
        'approach' => 'Our team used ESP32 and RFID so items scan as they enter the cart, with LCD feedback and PHP/MySQL inventory logging. Hardware events were tied to a simple backend so demos stay traceable.',
        'impact' => 'Cart scanning and live feedback reduced friction in lab demos. The project connects embedded sensing with a practical inventory path.',
    ],
    'CodeKotha - Bangla Programming Language' => [
        'problem' => 'Beginners who think in Bangla face an extra barrier when every language tool forces English keywords first. A toy rewriter is not enough to teach real compilation steps.',
        'approach' => 'Our team built a C++17 compiler with Qt, including lexer, parser, AST, and codegen, plus CLI and GUI paths. Bangla source can run or emit C, so learners see a real front-end pipeline.',
        'impact' => 'Students can write Bangla programs and inspect a compiler-style workflow. The project emphasizes language design decisions over UI-only demos.',
    ],
    'Why So Serious Mail' => [
        'problem' => 'OS lab concepts like files, processes, and permissions stay abstract if students only read theory and never operate a small system end to end.',
        'approach' => 'Our team built an offline mail client with Bash and Zenity. Messages are files, sending uses background processes, and permissions matter for how mail is stored and accessed.',
        'impact' => 'The tool makes OS ideas concrete through a familiar mail workflow, without needing a network server for the core demo.',
    ],
];
