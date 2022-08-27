<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usagetype extends Model
{
    use HasFactory;

    protected $fillable = [
        'pur',
        'sensitive',
        'dilute',
        'internal',
    ];
}
