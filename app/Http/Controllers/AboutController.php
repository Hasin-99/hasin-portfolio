<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Setting;
use App\Models\Skill;

class AboutController extends Controller
{
    public function index()
    {
        try {
            $skills = Skill::orderBy('order')->get();
            $experiences = Experience::orderBy('order')->get();
        } catch (\Exception $e) {
            $skills = collect([]);
            $experiences = collect([]);
        }

        $defaults = [
            'about_text_1' => 'I am Md. Shadman Hasin, a Computer Science and Engineering graduate from Daffodil International University. My thesis is defended and I am awaiting the final certificate. I am seeking an entry to mid-level full-time software role in Dhaka, and Faridpur is also fine if the team is right.',
            'about_text_2' => 'I work across mobile and web apps, machine learning, and information security fundamentals. I am comfortable with Python, Flutter, JavaScript, SQL, and modern tooling. Projects on this site include StudentMove (Flutter and Laravel for student transport), PayKotha (FastAPI wallet with KYC and audit), CodeKotha (Bangla compiler in C++ and Qt), CKD multimodal detection with explainable AI, CICIDS2017 intrusion work, retinal OCT, AgroCulture, Smart Cart IoT, OpenGL maritime simulation, and Why So Serious Mail. I also designed at Nexaaverse and completed an Accenture Forage UI/UX simulation.',
            'about_text_3' => 'My strengths include OOP, data structures, database management, Great Learning Information Security training, CITI biomedical research basics, and collaborative delivery. I learn quickly when a problem needs late-night focus. Bangla is high in reading, writing, and speaking. English is high in reading and writing, and medium in speaking. Permanent home is Faridpur. Current base is Daffodil Smart City, Savar, Dhaka.',
            'profile_image' => 'assets/images/profile.jpg',
        ];

        try {
            $settings = [
                'about_text_1' => Setting::get('about_text_1', $defaults['about_text_1']),
                'about_text_2' => Setting::get('about_text_2', $defaults['about_text_2']),
                'about_text_3' => Setting::get('about_text_3', $defaults['about_text_3']),
                'profile_image' => Setting::get('profile_image', $defaults['profile_image']),
            ];
        } catch (\Exception $e) {
            $settings = $defaults;
        }

        return view('pages.about', compact('skills', 'experiences', 'settings'));
    }
}
