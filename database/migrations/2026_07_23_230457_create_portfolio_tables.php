<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel Proyek / Portfolio
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image'); // path gambar (contoh: images/proyek1.jpg)
            $table->json('tech_stack'); // array tag (contoh: ["Laravel", "Tailwind CSS"])
            $table->string('link')->nullable();
            $table->integer('order')->default(0); // urutan tampil
            $table->timestamps();
        });

        // Tabel Keahlian / Skills
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama skill (contoh: Laravel)
            $table->string('icon'); // Nama icon Lucide (contoh: code, layout, database)
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Tabel Pesan Kontak
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('subject')->nullable();
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('projects');
    }
};