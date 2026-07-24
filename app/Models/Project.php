<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Otomatis ubah kolom tech_stack dari JSON ke Array
    protected $casts = [
        'tech_stack' => 'array',
    ];
}