<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        // Mengambil data dari database
        $projects = Project::orderBy('order', 'asc')->get();
        $skills = Skill::orderBy('order', 'asc')->get();

        // Mengirim data ke tampilan Blade (Portofolio.blade.php)
        return view('welcome', compact('projects', 'skills'));
    }
}