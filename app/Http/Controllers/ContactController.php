<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $defaults = [
            'email' => 'md.shadmanhasin520k82@gmail.com',
            'phone' => '+880 1764-851551 · +880 1719-639794',
            'location' => 'YKSG-1, Daffodil Smart City (DSC), Birulia, Savar, Dhaka 1340',
            'facebook_url' => 'https://www.facebook.com/share/1DXDNhmRdW/',
            'instagram_url' => 'https://www.instagram.com/shadman_hasin_99/',
            'linkedin_url' => 'https://www.linkedin.com/in/md-shadman-hasin-648587333',
            'github_url' => 'https://github.com/Hasin-99',
            'twitter_url' => 'https://x.com/shadman_hasin99',
            'threads_url' => 'https://www.threads.com/@shadman_hasin_99',
            'telegram_url' => 'https://t.me/Hasin_999',
            'whatsapp_url' => 'https://wa.me/8801764851551',
        ];

        try {
            $settings = [
                'email' => Setting::get('contact_email', $defaults['email']),
                'phone' => Setting::get('contact_phone', $defaults['phone']),
                'location' => Setting::get('contact_location', $defaults['location']),
                'facebook_url' => Setting::get('facebook_url', $defaults['facebook_url']),
                'instagram_url' => Setting::get('instagram_url', $defaults['instagram_url']),
                'linkedin_url' => Setting::get('linkedin_url', $defaults['linkedin_url']),
                'github_url' => Setting::get('github_url', $defaults['github_url']),
                'twitter_url' => Setting::get('twitter_url', $defaults['twitter_url']),
                'threads_url' => Setting::get('threads_url', $defaults['threads_url']),
                'telegram_url' => Setting::get('telegram_url', $defaults['telegram_url']),
                'whatsapp_url' => Setting::get('whatsapp_url', $defaults['whatsapp_url']),
            ];
        } catch (\Exception $e) {
            $settings = $defaults;
        }

        return view('pages.contact', compact('settings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        try {
            ContactMessage::create($validated);

            return redirect()->route('contact')->with('success', 'Message sent successfully. I will get back to you soon.');
        } catch (\Exception $e) {
            return redirect()->route('contact')->with('error', 'Unable to save your message right now. Please email me directly.');
        }
    }
}
