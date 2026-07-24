<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Proyek 1: Sistem Manajemen Toko
        Project::create([
            'title' => 'Sistem Manajemen Toko',
            'description' => 'Aplikasi POS dan inventaris barang berbasis web dengan sistem analitik transaksi realtime.',
            'image' => 'images/proyek1.jpg', // Gambar Proyek 1
            'tech_stack' => ['Laravel', 'Tailwind CSS'],
            'link' => '#',
            'order' => 1
        ]);

        // Proyek 2: Website Landing Page SaaS
        Project::create([
            'title' => 'Website Landing Page SaaS',
            'description' => 'Landing page interaktif dan responsif yang dioptimalkan untuk performa tinggi dan konversi pengguna.',
            'image' => 'images/proyek2.jpg', // Gambar Proyek 2
            'tech_stack' => ['PHP', 'MySQL'],
            'link' => '#',
            'order' => 2
        ]);

        // Data Keahlian (Skills)
        $skills = [
            ['name' => 'Laravel', 'icon' => 'code', 'order' => 1],
            ['name' => 'Tailwind CSS', 'icon' => 'layout', 'order' => 2],
            ['name' => 'MySQL', 'icon' => 'database', 'order' => 3],
            ['name' => 'PHP', 'icon' => 'terminal', 'order' => 4],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}