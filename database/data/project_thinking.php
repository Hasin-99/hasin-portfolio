<?php

return [
    'Full Stack Dynamic Portfolio' => [
        'problem' => 'A GitHub profile is not a portfolio. Recruiters were hunting through repos while my CV, contact path, and project notes lived in three different places—and every typo meant opening the codebase again.',
        'approach' => 'I shipped this Laravel site with a small CMS so projects, skills, and messages update without a code dig. Docker on Render keeps one stable URL. The copy is forced to match my CV, not invent a second resume.',
        'impact' => 'One link now carries the live site, PDF, and GitHub. Content edits land without dressing up a full redeploy for a single line of text.',
    ],
    'PayKotha - Core Banking Wallet' => [
        'problem' => 'Most student wallets die the moment you ask where the money actually goes. Screens transfer; ledgers, limits, and audit trails do not.',
        'approach' => 'I built PayKotha in FastAPI and React around the unglamorous core: KYC tiers, OTP on serious amounts, double-entry rows, and audit logs. The API owns the rules. The UI only asks permission.',
        'impact' => 'A review can start with who may move money and how a transfer is traced—not which gradient sat on the send button.',
    ],
    'StudentMove Flutter App' => [
        'problem' => 'Dhaka campus buses lived in Facebook threads and hallway gossip. Leave the hostel guessing, and you still miss the bus after fifteen minutes on the curb.',
        'approach' => 'Our team shipped a Flutter + Firebase app with live schedules, announcements, chat, and separate spaces for students, drivers, and admins. Each role gets its own surface—not one crowded screen for everyone.',
        'impact' => 'You can check the route before you walk out. Alerts and admin tools grow later without collapsing every role into the same mess.',
    ],
    'StudentMove - Smart Transport Solution for Dhaka' => [
        'problem' => 'On the web side, tracking, subscriptions, and admin work were still scattered. Operators and students were not looking at the same truth.',
        'approach' => 'I worked the Laravel layer: bus tracking, routes, subscription plans, notifications, and admin panels. One backend, two audiences, fewer chat-thread updates.',
        'impact' => 'Plans and live status sit closer together. Tracking data can feed the alerts people actually open.',
    ],
    'CKD Multimodal Detection (FYDP)' => [
        'problem' => 'Kidney risk does not sit cleanly in one spreadsheet. A lone score with no explanation is hard for anyone serious to trust.',
        'approach' => 'For our thesis, the team built a Python pipeline that mixes modalities and uses explainable AI so a prediction can be inspected. Evaluation got the same attention as the model.',
        'impact' => 'We can defend why a result looks the way it does—and say plainly what it is not ready to claim in a clinic.',
    ],
    'CICIDS2017 Intrusion & Insider Threat Detection' => [
        'problem' => 'Network logs arrive huge and dirty. Chase accuracy before cleaning, and the number on the slide stops meaning anything.',
        'approach' => 'Our team built a full Python path on CICIDS2017: clean, feature, train, evaluate. The data work was the project, not a footnote before the model.',
        'impact' => 'We can talk anomaly detection without pretending the dataset shows up ready for a leaderboard.',
    ],
    'Retinal OCT Deep Learning Classification' => [
        'problem' => 'Hand-reading OCT scans does not scale. When volume rises, early signs get easier to miss if every frame needs a full manual pass.',
        'approach' => 'Our team trained Python deep-learning models—EfficientNet and MobileNet style—to classify OCT images, with a training and evaluation path you can actually replay.',
        'impact' => 'It is a first-pass screening aid, not a clinician. We keep that line sharp in every demo.',
    ],
    'AgroCulture - Farmer Marketplace' => [
        'problem' => 'Produce deals were still dying in phone calls. Listings, carts, and order updates needed one shared place that did not depend on who answered first.',
        'approach' => 'Our team built a plain PHP and MySQL marketplace: listings, cart, reviews, and a small agro blog. Boring stack on purpose—so the trading path stayed obvious to follow and keep alive.',
        'impact' => 'Buyers browse and order in one flow. Sellers stop chasing every order through chat.',
    ],
    'OpenGL Maritime Day/Night Simulation' => [
        'problem' => 'Static meshes were not enough for graphics class. The scene had to move—and light had to change with it.',
        'approach' => 'Our team built a C++ OpenGL maritime scene: ocean, ships, lighthouse, and a day-to-night cycle. Lighting carried the demo; geometry alone did not.',
        'impact' => 'The day/night shift and motion read together, which made the viva about light and animation instead of a frozen screenshot.',
    ],
    'Smart Cart IoT - Intelligent Shopping Trolley' => [
        'problem' => 'In the lab, the trolley stayed dumb until the cashier. Nothing interesting happened mid-aisle—so demos felt like waiting for a punchline.',
        'approach' => 'Our team put ESP32 and RFID on the cart so tagged items scan on the way in, hit an LCD, and land in a PHP/MySQL inventory log. If hardware fired and the backend stayed quiet, the build failed.',
        'impact' => 'Reviewers watched a running total climb while items dropped in. The cart stopped being a prop and started behaving like the product.',
    ],
    'CodeKotha - Bangla Programming Language' => [
        'problem' => 'If you think in Bangla, English keywords are a wall before loops even begin. A find-and-replace “translator” teaches costumes, not compilers.',
        'approach' => 'Our team built a real C++17 front end with Qt—lexer, parser, AST, codegen—plus CLI and GUI. Bangla source can run or lower to C so students see the full pipeline.',
        'impact' => 'You write Bangla and still argue about parsing and codegen like a language project, not an English program wearing a skin.',
    ],
    'Why So Serious Mail' => [
        'problem' => 'Files, processes, and permissions stay slide-ware until you run a small system that breaks when you get them wrong.',
        'approach' => 'Our team built an offline mail client in Bash and Zenity. Mail lives as files, sending rides background processes, and permissions are not optional decoration.',
        'impact' => 'A familiar mail UI made those OS ideas physical. No network server was required for the core proof.',
    ],
];
