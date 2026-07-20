<?php

namespace App\Http\Controllers;

use App\Models\Project;

class WorksController extends Controller
{
    public function index()
    {
        try {
            $projects = Project::where('is_active', true)
                ->orderBy('order')
                ->get();
        } catch (\Exception $e) {
            $projects = collect([]);
        }

        return view('pages.works', compact('projects'));
    }

    public function show(Project $project)
    {
        abort_unless($project->is_active, 404);

        $prev = Project::where('is_active', true)
            ->where('order', '<', $project->order)
            ->orderByDesc('order')
            ->first();

        $next = Project::where('is_active', true)
            ->where('order', '>', $project->order)
            ->orderBy('order')
            ->first();

        // Wrap around if at ends
        if (!$prev) {
            $prev = Project::where('is_active', true)->orderByDesc('order')->first();
            if ($prev && $prev->id === $project->id) {
                $prev = null;
            }
        }
        if (!$next) {
            $next = Project::where('is_active', true)->orderBy('order')->first();
            if ($next && $next->id === $project->id) {
                $next = null;
            }
        }

        return view('pages.work-show', compact('project', 'prev', 'next'));
    }
}
