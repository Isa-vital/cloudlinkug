<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.portfolio.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:projects,slug',
            'description' => 'nullable|string',
            'client'      => 'nullable|string|max:255',
            'category'    => 'nullable|string|max:100',
            'image'       => 'nullable|image|max:5120',
            'is_active'   => 'nullable',
        ]);

        $validated['slug']      = $validated['slug'] ?: Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('projects', 'public');
        }
        unset($validated['image']);

        Project::create($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $portfolio)
    {
        $project = $portfolio;
        return view('admin.portfolio.edit', compact('project'));
    }

    public function update(Request $request, Project $portfolio)
    {
        $project = $portfolio;

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:projects,slug,' . $project->id,
            'description' => 'nullable|string',
            'client'      => 'nullable|string|max:255',
            'category'    => 'nullable|string|max:100',
            'image'       => 'nullable|image|max:5120',
            'is_active'   => 'nullable',
        ]);

        $validated['slug']      = $validated['slug'] ?: Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($project->image_path) {
                Storage::disk('public')->delete($project->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('projects', 'public');
        }
        unset($validated['image']);

        $project->update($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $portfolio)
    {
        if ($portfolio->image_path) {
            Storage::disk('public')->delete($portfolio->image_path);
        }
        $portfolio->delete();
        return redirect()->route('admin.portfolio.index')->with('success', 'Project deleted successfully.');
    }
}
