<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scentdirection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function essentialoils(){
        return $this->belongsToMany(Essentialoil::class, 'essentialoil_scentdirections', 'essentialoil_id', 'scentdirection_id');
    }
}
