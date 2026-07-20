<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'profile_name'     => Setting::get('profile_name', 'Md. Shadman Hasin'),
            'profile_role'     => Setting::get('profile_role', 'Software Developer & IT Professional'),
            'profile_bio'      => Setting::get('profile_bio', 'CSE graduate from Daffodil International University. Thesis defended, certificate pending. Builder of StudentMove, PayKotha, CodeKotha, and CKD multimodal detection.'),
            'profile_image'    => Setting::get('profile_image', 'assets/images/profile.jpg'),
            'resume_file'      => Setting::get('resume_file', 'assets/Md._Shadman_Hasin_CV.pdf'),
            'experience_years' => Setting::get('experience_years', '2+'),
            'clients_count'    => Setting::get('clients_count', '5+'),
            'projects_count'   => Setting::get('projects_count', '12+'),
            'about_text_1'     => Setting::get('about_text_1', 'I am Md. Shadman Hasin, a Computer Science and Engineering graduate from Daffodil International University. My thesis is defended and I am awaiting the final certificate. I am seeking an entry to mid-level full-time software role in Dhaka.'),
            'about_text_2'     => Setting::get('about_text_2', 'I work across StudentMove, PayKotha, CodeKotha, CKD multimodal detection, security, IoT, and design work at Nexaaverse and Accenture.'),
            'about_text_3'     => Setting::get('about_text_3', 'OOP, data structures, databases, Information Security (Great Learning), CITI biomedical research basics. Bangla high. English high in reading and writing, medium in speaking. Faridpur permanent. Dhaka current.'),
            'contact_email'    => Setting::get('contact_email', 'md.shadmanhasin520k82@gmail.com'),
            'contact_phone'    => Setting::get('contact_phone', '+880 1764-851551 · +880 1719-639794'),
            'contact_location' => Setting::get('contact_location', 'YKSG-1, Daffodil Smart City, Savar, Dhaka'),
            'facebook_url'     => Setting::get('facebook_url', 'https://www.facebook.com/share/1DXDNhmRdW/'),
            'instagram_url'    => Setting::get('instagram_url', 'https://www.instagram.com/shadman_hasin_99/'),
            'linkedin_url'     => Setting::get('linkedin_url', 'https://www.linkedin.com/in/md-shadman-hasin-648587333'),
            'github_url'       => Setting::get('github_url', 'https://github.com/Hasin-99'),
            'twitter_url'      => Setting::get('twitter_url', 'https://x.com/shadman_hasin99'),
            'threads_url'      => Setting::get('threads_url', 'https://www.threads.com/@shadman_hasin_99'),
            'telegram_url'     => Setting::get('telegram_url', 'https://t.me/Hasin_999'),
            'whatsapp_url'     => Setting::get('whatsapp_url', 'https://wa.me/8801764851551'),
            'behance_url'      => Setting::get('behance_url', ''),
            'dribbble_url'     => Setting::get('dribbble_url', ''),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $fields = [
            'profile_name', 'profile_role', 'profile_bio', 'experience_years',
            'clients_count', 'projects_count', 'about_text_1', 'about_text_2',
            'about_text_3', 'contact_email', 'contact_phone', 'contact_location',
            'facebook_url', 'instagram_url', 'linkedin_url', 'github_url',
            'twitter_url', 'threads_url', 'telegram_url', 'whatsapp_url',
            'behance_url', 'dribbble_url',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                Setting::set($field, $request->input($field));
            }
        }

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile', 'public');
            Setting::set('profile_image', $path);
        }

        if ($request->hasFile('resume_file')) {
            $path = $request->file('resume_file')->store('resume', 'public');
            Setting::set('resume_file', $path);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
    }
}
