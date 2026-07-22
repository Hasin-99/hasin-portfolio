<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;

class BuildSitemap extends Command
{
    protected $signature = 'portfolio:build-sitemap';

    protected $description = 'Write public/sitemap.xml including all active project pages';

    public function handle(): int
    {
        $base = rtrim(config('app.url') ?: 'https://hasin-portfolio.onrender.com', '/');

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
                'lastmod' => optional($project->updated_at)->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ];
        }

        $xml = view('sitemap', ['urls' => $urls])->render();
        $path = public_path('sitemap.xml');
        file_put_contents($path, $xml);

        $this->info('Wrote '.$path.' ('.count($urls).' urls)');

        return self::SUCCESS;
    }
}
