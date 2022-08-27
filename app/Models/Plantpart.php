<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantpart extends Model
{
    use HasFactory;

    protected $fillable = [
        'part',
    ];
}
