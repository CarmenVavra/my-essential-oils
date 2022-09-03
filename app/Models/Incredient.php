<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'physical_effect',
        'mental_effect',
    ];
}
