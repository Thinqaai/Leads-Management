<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'criteria', 'fields',
    ];

    protected $casts = [
        'criteria' => 'array',
        'fields' => 'array',
    ];
} 