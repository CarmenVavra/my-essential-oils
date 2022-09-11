<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssentialoilScentdirection extends Model
{
    use HasFactory;

    protected $fillable = [
        'essentialoil_id',
        'scentdirection_id',
    ];

    public function essentialoil(){
        return $this->belongsTo(Essentialoil::class, 'essentialoil_id', 'id');
    }

    public function scentdirection(){
        return $this->belongsTo(Scentdirection::class, 'scentdirection_id', 'id');
    }
}
