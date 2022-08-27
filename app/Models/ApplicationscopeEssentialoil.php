<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationscopeEssentialoil extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicationscope_id',
        'essentialoil_id',
    ];
}
