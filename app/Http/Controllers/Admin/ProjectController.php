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
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'image'       => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'tech_stack'  => 'required',
            'link'        => 'nullable|url',
        ]);

        // Upload gambar ke storage/app/public/projects
        $path = $request->file('image')->store('projects', 'public');

        // Mengubah string comma-separated (ex: "Laravel, Tailwind") menjadi array
        $techArray = array_map('trim', explode(',', $request->tech_stack));

        Project::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => 'storage/' . $path,
            'tech_stack'  => $techArray,
            'link'        => $request->link,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'tech_stack'  => 'required',
            'link'        => 'nullable|url',
        ]);

        $data = $request->only(['title', 'description', 'link']);
        $data['tech_stack'] = array_map('trim', explode(',', $request->tech_stack));

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $data['image'] = 'storage/' . $path;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil dihapus!');
    }
}