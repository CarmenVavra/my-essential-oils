<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssentialoilRecipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'essentialoil_id',
        'recipe_id',
        'amount',
        'unit',
    ];
    
    public function essentialoils(){
        return $this->belongsTo(Essentialoil::class, 'essentialoil_id', 'id');
    }

    public function recipes(){
        return $this->belongsTo(Recipe::class, 'recipe_id', 'id');
    }
}
