<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AttentionEssentialoil extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'attention_id',
        'essentialoil_id',
    ];

    public function essentialoils(){
        return $this->belongsTo(Essentialoil::class, 'essentialoil_id', 'id');
    }

    public function attentions(){
        return $this->belongsTo(Attention::class, 'attention_id', 'id');
    }
}
