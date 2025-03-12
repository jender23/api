<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', // 🔥 Agregar este campo permite la asignación masiva
        'name',
        'status',
        'species',
        'type',
        'gender',
        'origin',
        'image'
    ];
}