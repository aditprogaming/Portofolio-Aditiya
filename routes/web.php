<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\About;
use App\Models\Skill;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SkillController;

// 1. HALAMAN DEPAN (PUBLIC)
Route::get('/', function () {
    $projects = Project::all();
    $about = About::first();
    $skills = Skill::all();

    return view('welcome', compact('projects', 'about', 'skills'));
});

// 2. ROUTE DASHBOARD (Akses Bawaan Laravel Breeze)
Route::get('/dashboard', function () {
    return redirect()->route('admin.projects.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. CRUD ADMIN PANEL
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    // CRUD Projects
    Route::resource('projects', ProjectController::class);

    // Edit About / Profil
    Route::get('about', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');

    // CRUD Skills
    Route::resource('skills', SkillController::class);
});

// 4. ROUTE PROFILE USER
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';