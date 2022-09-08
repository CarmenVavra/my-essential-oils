<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssentialoilUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'essentialoil_id',
        'user_id',
        'favourite',
    ];

    public function essentialoils(){
        return $this->belongsTo(Essentialoil::class, 'essentialoil_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
