<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssentialoilPhysicaleffect extends Model
{
    use HasFactory;

    protected $fillable = [
        'essentialoil_id',
        'physicaleffect_id',
    ];
}
