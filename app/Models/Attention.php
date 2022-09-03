<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function essentialoils(){
        return $this->belongsToMany(Essentialoil::class, 'attention_essentialoils', 'attention_id', 'essentialoil_id');
    }
}
