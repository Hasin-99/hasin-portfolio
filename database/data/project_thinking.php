<?php

return [
    'Full Stack Dynamic Portfolio' => [
        'problem' => 'I was tired of sending recruiters a GitHub link and hoping they found the right repos. My CV, projects, and contact details lived in different places, and every small text change meant digging through code again.',
        'approach' => 'I built this site in Laravel with a small admin panel so I can edit projects, skills, and messages myself. It runs on Docker on Render, so the link stays the same. I kept the pages light and made sure the copy matches my CV.',
        'impact' => 'Now one link covers the live site, resume, and GitHub. When something on the CV changes, I update it here without shipping a whole new deploy for a typo.',
    ],
    'PayKotha - Core Banking Wallet' => [
        'problem' => 'A lot of student wallet apps look finished until you ask where the money record goes. Pretty transfer screens are easy. Trust, limits, and a ledger you can audit are not.',
        'approach' => 'I built PayKotha with FastAPI and React around those harder pieces: KYC tiers, OTP when amounts get serious, double-entry ledger rows, and audit logs. The API owns the rules; the UI just talks to it.',
        'impact' => 'When someone reviews the project, we can talk about who can move money and how a transfer is traced, not only which buttons I drew.',
    ],
    'StudentMove Flutter App' => [
        'problem' => 'On campus in Dhaka, bus times often lived in Facebook groups or word of mouth. You leave hostel, wait too long, and still miss the bus.',
        'approach' => 'Our team made a Flutter app with Firebase for live schedules, announcements, chat, and separate spaces for students, drivers, and admins. Each role sees what it needs, not one messy screen for everyone.',
        'impact' => 'Students can check the route before they walk out. Adding alerts or admin tools later was simpler because the roles were already split cleanly.',
    ],
    'StudentMove - Smart Transport Solution for Dhaka' => [
        'problem' => 'The web side of StudentMove had the same pain: tracking, subscriptions, and admin work were scattered, so nobody had one place to see what the buses were doing.',
        'approach' => 'I worked on the Laravel side for bus tracking, routes, subscription plans, notifications, and admin panels. We wanted operators and students pulling from the same backend instead of chasing updates in chats.',
        'impact' => 'Plans and live status sat closer together. My pieces helped tie tracking data to the alerts people actually receive.',
    ],
    'CKD Multimodal Detection (FYDP)' => [
        'problem' => 'Kidney disease risk does not show up cleanly in one spreadsheet. A single score without an explanation also does not help anyone review the result.',
        'approach' => 'For our thesis, the team built a Python pipeline that mixes different data types and uses explainable AI so a prediction is easier to inspect. We spent as much care on evaluation as on the model itself.',
        'impact' => 'We can walk through why a result looks the way it does, and talk honestly about limits, leakage, and what the system is not ready to claim clinically.',
    ],
    'CICIDS2017 Intrusion & Insider Threat Detection' => [
        'problem' => 'Network logs are huge and messy. If you skip cleaning and just chase a high accuracy number, the model is hard to trust.',
        'approach' => 'Our team built a Python pipeline on CICIDS2017 for cleaning, features, training, and evaluation. We treated the data steps as part of the work, not a boring preface.',
        'impact' => 'The project gave us a solid way to discuss anomaly detection without pretending the dataset arrives ready-made.',
    ],
    'Retinal OCT Deep Learning Classification' => [
        'problem' => 'Reading OCT scans by hand takes time. When volume goes up, early signs are easier to miss if every image needs a full manual pass.',
        'approach' => 'Our team trained Python deep learning models, including EfficientNet and MobileNet styles, to classify OCT images. We kept the training and evaluation path clear so the result is reviewable.',
        'impact' => 'It is a first-pass helper for screening practice, not a replacement for a clinician, and we present it that way.',
    ],
    'AgroCulture - Farmer Marketplace' => [
        'problem' => 'Farmers and buyers were still doing too much over phone calls. Listing produce, carts, and updates needed a simple shared web place.',
        'approach' => 'Our team built a PHP and MySQL marketplace with listings, cart, reviews, and a small agro blog. We kept the stack plain so the trading flow stayed easy to follow and maintain.',
        'impact' => 'Buyers can browse and order in one spot. Sellers get a clearer path than chasing every order in chat.',
    ],
    'OpenGL Maritime Day/Night Simulation' => [
        'problem' => 'For graphics class, static shapes were not enough. We needed a scene that actually moves and reacts to light.',
        'approach' => 'Our team made a C++ OpenGL scene with ocean, ships, a lighthouse, and a day-to-night lighting cycle. Lighting was the main story of the demo, not an afterthought.',
        'impact' => 'You can see the day/night shift and animation working together, which made the graphics concepts easier to explain in a viva.',
    ],
    'Smart Cart IoT - Intelligent Shopping Trolley' => [
        'problem' => 'In our lab demos, everything waited for the checkout counter. The cart itself did not help until the very end.',
        'approach' => 'Our team used ESP32 and RFID so items scan as they go in, with LCD feedback and a PHP/MySQL inventory log behind it. Hardware events had to land in a backend we could show.',
        'impact' => 'Demos felt closer to a real store trip. People could see the bill grow as items entered the cart.',
    ],
    'CodeKotha - Bangla Programming Language' => [
        'problem' => 'If you think in Bangla, English-only keywords are an extra wall before you even learn loops. A keyword find-and-replace toy does not teach how compilers work.',
        'approach' => 'Our team built a real C++17 front end with Qt: lexer, parser, AST, and codegen, plus CLI and GUI. Bangla source can run or turn into C so students see the pipeline.',
        'impact' => 'You can write Bangla code and still talk about parsing and codegen like a proper language project, not a costume on top of English.',
    ],
    'Why So Serious Mail' => [
        'problem' => 'OS lab topics like files, processes, and permissions stay abstract if you only read slides and never run a small system.',
        'approach' => 'Our team made an offline mail client with Bash and Zenity. Mail is stored as files, sending uses background processes, and permissions actually matter.',
        'impact' => 'The familiar mail UI made those OS ideas easier to feel. No network server was required for the core demo.',
    ],
];
