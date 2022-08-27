<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Essentialoil extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_german',
        'name_latin',
        'name_english',
        'description',
        'usagetype_id',
        'merchant_id',
        'method_id',
        'plantpart_id',
    ];
}
