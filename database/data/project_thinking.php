<?php

/**
 * Editorial case notes — not a Problem/Approach/Impact worksheet.
 * problem  = opening pressure (one hard line)
 * approach = how the build actually ran
 * impact   = proof that held in the room / review
 */
return [
    'Full Stack Dynamic Portfolio' => [
        'problem' => 'A GitHub profile is not a portfolio—it is a junk drawer with a green graph.',
        'approach' => 'Recruiters were digging through repos while my CV, contact path, and project notes lived in three tabs. I built this Laravel site with a small CMS so I can change projects and messages without opening the codebase for a typo. Docker on Render holds one URL. The copy is chained to my CV on purpose; there is no second resume living in the markup.',
        'impact' => 'One link now carries the live site, the PDF, and GitHub—and a text fix does not demand a ceremonial redeploy.',
    ],
    'PayKotha - Core Banking Wallet' => [
        'problem' => 'Pretty transfer screens are cheap. A ledger you can defend is not.',
        'approach' => 'Most student wallets collapse the second you ask where the money went. I built PayKotha in FastAPI and React around KYC tiers, OTP on serious amounts, double-entry rows, and audit logs. The API owns the rules. The UI asks; it does not invent money.',
        'impact' => 'A review can open on who may move funds and how a transfer is traced—before anyone mentions the send button.',
    ],
    'StudentMove Flutter App' => [
        'problem' => 'Campus buses in Dhaka ran on Facebook threads and curb-side hope.',
        'approach' => 'You could leave the hostel, wait fifteen minutes, and still miss the bus. Our team shipped a Flutter + Firebase app with live schedules, announcements, chat, and separate surfaces for students, drivers, and admins—so each role stops fighting for the same screen.',
        'impact' => 'Check the route before you walk out. Later alerts do not have to smash every role back into one crowded UI.',
    ],
    'StudentMove - Smart Transport Solution for Dhaka' => [
        'problem' => 'Operators and students were not looking at the same bus.',
        'approach' => 'Tracking, subscriptions, and admin work were still scattered across chats and half-built panels. I worked the Laravel side—routes, live tracking, plans, notifications, admin—so both audiences pull from one backend instead of arguing from screenshots.',
        'impact' => 'Plans and live status sit in the same system. Tracking can feed the alert someone actually opens.',
    ],
    'CKD Multimodal Detection (FYDP)' => [
        'problem' => 'A kidney-risk score with no explanation is a number wearing a lab coat.',
        'approach' => 'Risk does not live in one tidy spreadsheet. For our thesis, the team built a Python multimodal pipeline with explainable AI so a prediction can be inspected, not worshipped. Evaluation got the same hours as the model.',
        'impact' => 'We can walk a result apart—and say, without theater, what it is not ready to claim clinically.',
    ],
    'CICIDS2017 Intrusion & Insider Threat Detection' => [
        'problem' => 'Accuracy before cleaning is a costume for a messy log file.',
        'approach' => 'CICIDS2017 does not arrive polite. Our team built the unglamorous path first—clean, feature, train, evaluate—in Python, and treated the data work as the product, not a preface before a leaderboard slide.',
        'impact' => 'We can talk anomaly detection without pretending the dataset showed up already washed.',
    ],
    'Retinal OCT Deep Learning Classification' => [
        'problem' => 'Hand-reading every OCT frame does not survive real volume.',
        'approach' => 'When the stack of scans grows, early signs get easier to miss. Our team trained Python deep-learning models—EfficientNet and MobileNet style—with a training and evaluation path you can replay, not a one-off notebook miracle.',
        'impact' => 'It is a first-pass screening aid. We keep that line sharp so nobody mistakes it for a clinician.',
    ],
    'AgroCulture - Farmer Marketplace' => [
        'problem' => 'Produce deals were dying inside phone calls that never became a record.',
        'approach' => 'Listings, carts, and order updates needed one shared place that did not depend on who answered first. Our team built a plain PHP and MySQL marketplace—listings, cart, reviews, a small agro blog—boring on purpose, so the trading path stayed obvious to run and keep alive.',
        'impact' => 'Buyers finish the order in one flow. Sellers stop hunting receipts in chat history.',
    ],
    'OpenGL Maritime Day/Night Simulation' => [
        'problem' => 'A frozen mesh is not a graphics demo. Light has to move.',
        'approach' => 'Class scenes that never change teach screenshots, not rendering. Our team built a C++ OpenGL maritime world—ocean, ships, lighthouse—with a day-to-night cycle carrying the story. Geometry alone was not allowed to pass for the work.',
        'impact' => 'The viva could aim at light and motion together, instead of a pretty still frame.',
    ],
    'Smart Cart IoT - Intelligent Shopping Trolley' => [
        'problem' => 'Until checkout, the trolley was a prop on wheels.',
        'approach' => 'Lab demos had the same dead stretch—nothing earned attention mid-aisle. We mounted ESP32 and RFID so each tagged drop-in hit an LCD and wrote a PHP/MySQL inventory row. If hardware fired and the backend stayed quiet, the build failed in the room, not on a slide.',
        'impact' => 'Reviewers watched the total climb while items went in. The cart finally behaved like the product.',
    ],
    'CodeKotha - Bangla Programming Language' => [
        'problem' => 'English keywords should not be the toll booth before you learn a loop.',
        'approach' => 'A find-and-replace “Bangla mode” teaches costumes, not compilers. Our team built a real C++17 front end with Qt—lexer, parser, AST, codegen—plus CLI and GUI, so Bangla source can run or lower to C and students see the pipeline intact.',
        'impact' => 'You write Bangla and still argue about parsing and codegen like a language—not an English program wearing a skin.',
    ],
    'Why So Serious Mail' => [
        'problem' => 'Permissions stay slide-ware until a small system breaks when you get them wrong.',
        'approach' => 'Files and processes mean little on a lecture slide. Our team built an offline mail client in Bash and Zenity: mail as files, sending on background processes, permissions that actually gate the demo. No network server for the core proof.',
        'impact' => 'A familiar mail UI made those OS ideas physical—you felt the failure mode, not just the definition.',
    ],
];
