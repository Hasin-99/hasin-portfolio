<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (!$this->app->runningInConsole()) {
            $root = request()->getSchemeAndHttpHost();
            if ($root) {
                URL::forceRootUrl($root);
            }
            if (request()->isSecure() || str_starts_with((string) config('app.url'), 'https://')) {
                URL::forceScheme('https');
            }
        }

        View::composer('*', function ($view) {
            static $layoutSettings = null;

            if ($layoutSettings === null) {
                $defaults = [
                    'name' => 'Md. Shadman Hasin',
                    'role' => 'Software Developer',
                    'resume_file' => 'assets/Md._Shadman_Hasin_CV.pdf',
                    'github_url' => 'https://github.com/Hasin-99',
                    'linkedin_url' => 'https://www.linkedin.com/in/md-shadman-hasin-648587333',
                    'facebook_url' => 'https://www.facebook.com/share/1DXDNhmRdW/',
                    'instagram_url' => 'https://www.instagram.com/shadman_hasin_99/',
                    'twitter_url' => 'https://x.com/shadman_hasin99',
                    'threads_url' => 'https://www.threads.com/@shadman_hasin_99',
                    'telegram_url' => 'https://t.me/Hasin_999',
                    'whatsapp_url' => 'https://wa.me/8801764851551',
                    'contact_email' => 'md.shadmanhasin520k82@gmail.com',
                    'contact_phone' => '+880 1764-851551 · +880 1719-639794',
                ];

                try {
                    $layoutSettings = [
                        'name' => Setting::get('profile_name', $defaults['name']),
                        'role' => Setting::get('profile_role', $defaults['role']),
                        'resume_file' => Setting::get('resume_file', $defaults['resume_file']),
                        'contact_email' => Setting::get('contact_email', $defaults['contact_email']),
                        'contact_phone' => Setting::get('contact_phone', $defaults['contact_phone']),
                        'github_url' => Setting::get('github_url', $defaults['github_url']),
                        'linkedin_url' => Setting::get('linkedin_url', $defaults['linkedin_url']),
                        'facebook_url' => Setting::get('facebook_url', $defaults['facebook_url']),
                        'instagram_url' => Setting::get('instagram_url', $defaults['instagram_url']),
                        'twitter_url' => Setting::get('twitter_url', $defaults['twitter_url']),
                        'threads_url' => Setting::get('threads_url', $defaults['threads_url']),
                        'telegram_url' => Setting::get('telegram_url', $defaults['telegram_url']),
                        'whatsapp_url' => Setting::get('whatsapp_url', $defaults['whatsapp_url']),
                    ];
                } catch (\Throwable $e) {
                    $layoutSettings = $defaults;
                }
            }

            $view->with('layoutSettings', $layoutSettings);
        });
    }
}
