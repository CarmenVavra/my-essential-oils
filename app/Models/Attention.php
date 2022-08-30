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

    public function attentionEssentialoils(){
        return $this->belongsToMany(AttentionEssentialoil::class, 'attention_id', 'id');
    }
}
