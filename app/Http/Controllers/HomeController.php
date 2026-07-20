<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $featuredProjects = Project::where('is_featured', true)
                ->where('is_active', true)
                ->orderBy('order')
                ->get();

            if ($featuredProjects->isEmpty()) {
                $featuredProjects = Project::where('is_active', true)
                    ->orderBy('order')
                    ->get();
            }

            $allProjects = Project::where('is_active', true)->orderBy('order')->get();
            $settings = $this->getSettings();
        } catch (\Exception $e) {
            $featuredProjects = collect([]);
            $allProjects = collect([]);
            $settings = $this->getSettings();
        }

        return view('pages.home', compact('featuredProjects', 'allProjects', 'settings'));
    }

    private function getSettings(): array
    {
        $defaults = [
            'name' => 'Md. Shadman Hasin',
            'role' => 'Software Developer & IT Professional',
            'bio' => 'CSE graduate from Daffodil International University. Thesis defended, certificate pending. I build StudentMove, PayKotha, CodeKotha, and clinical ML systems.',
            'profile_image' => 'assets/images/profile.jpg',
            'resume_file' => 'assets/Md._Shadman_Hasin_CV.pdf',
            'experience_years' => '2+',
            'clients_count' => '5+',
            'projects_count' => '12+',
        ];

        try {
            return [
                'name' => Setting::get('profile_name', $defaults['name']),
                'role' => Setting::get('profile_role', $defaults['role']),
                'bio' => Setting::get('profile_bio', $defaults['bio']),
                'profile_image' => Setting::get('profile_image', $defaults['profile_image']),
                'resume_file' => Setting::get('resume_file', $defaults['resume_file']),
                'experience_years' => Setting::get('experience_years', $defaults['experience_years']),
                'clients_count' => Setting::get('clients_count', $defaults['clients_count']),
                'projects_count' => Setting::get('projects_count', $defaults['projects_count']),
            ];
        } catch (\Exception $e) {
            return $defaults;
        }
    }
}
