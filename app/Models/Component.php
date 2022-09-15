<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'good_for',
        'reason_good_for',
        'bad_for',
        'reason_bad_for',
    ];

    
}
