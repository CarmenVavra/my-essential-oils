<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicationscope extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_latin', 
    ];
}
