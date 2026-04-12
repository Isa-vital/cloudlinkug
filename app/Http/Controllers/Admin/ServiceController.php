<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::ordered()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'slug'          => 'nullable|string|max:255|unique:services,slug',
            'excerpt'       => 'nullable|string|max:500',
            'description'   => 'nullable|string',
            'icon_class'    => 'nullable|string|max:100',
            'image'         => 'nullable|image|max:5120',
            'display_order' => 'integer|min:0',
            'is_active'     => 'nullable',
        ]);

        $validated['slug']      = $validated['slug'] ?: Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('services', 'public');
        }

        // unset the raw 'image' key before mass-assigning
        unset($validated['image']);

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'slug'          => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'excerpt'       => 'nullable|string|max:500',
            'description'   => 'nullable|string',
            'icon_class'    => 'nullable|string|max:100',
            'image'         => 'nullable|image|max:5120',
            'display_order' => 'integer|min:0',
            'is_active'     => 'nullable',
        ]);

        $validated['slug']      = $validated['slug'] ?: Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($service->image_path) {
                Storage::disk('public')->delete($service->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('services', 'public');
        }

        unset($validated['image']);

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->image_path) {
            Storage::disk('public')->delete($service->image_path);
        }
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
