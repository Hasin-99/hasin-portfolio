<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'tech_tags' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'project_url' => 'nullable|url',
            'order' => 'nullable|integer',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        // Store tech_tags as a proper array (JSON cast on the model)
        if ($request->filled('tech_tags')) {
            $validated['tech_tags'] = array_values(array_filter(array_map('trim', explode(',', $request->tech_tags))));
        } else {
            $validated['tech_tags'] = [];
        }

        // Default for booleans
        $validated['is_featured'] = $request->filled('is_featured') ? 1 : 0;
        $validated['is_active'] = $request->filled('is_active') ? 1 : 0;

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'tech_tags' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'project_url' => 'nullable|url',
            'order' => 'nullable|integer',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        // Store tech_tags as a proper array (JSON cast on the model)
        if ($request->filled('tech_tags')) {
            $validated['tech_tags'] = array_values(array_filter(array_map('trim', explode(',', $request->tech_tags))));
        } else {
            $validated['tech_tags'] = [];
        }

        // Default for booleans
        $validated['is_featured'] = $request->filled('is_featured') ? 1 : 0;
        $validated['is_active'] = $request->filled('is_active') ? 1 : 0;

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }
}