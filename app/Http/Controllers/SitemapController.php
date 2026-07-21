<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $base = rtrim(config('app.url') ?: url('/'), '/');

        $urls = [
            ['loc' => $base.'/', 'changefreq' => 'weekly', 'priority' => '1.0'],
            ['loc' => $base.'/about', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => $base.'/works', 'changefreq' => 'weekly', 'priority' => '0.9'],
            ['loc' => $base.'/contact', 'changefreq' => 'monthly', 'priority' => '0.7'],
        ];

        $projects = Project::query()
            ->where('is_active', true)
            ->orderBy('order')
            ->orderBy('id')
            ->get(['id', 'updated_at']);

        foreach ($projects as $project) {
            $urls[] = [
                'loc' => $base.'/works/'.$project->id,
                'changefreq' => 'monthly',
                'priority' => '0.6',
                'lastmod' => optional($project->updated_at)->toAtomString(),
            ];
        }

        $xml = view('sitemap', ['urls' => $urls])->render();

        return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
