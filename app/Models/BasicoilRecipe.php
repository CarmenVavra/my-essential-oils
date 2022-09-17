<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicoilRecipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'basicoil',
        'recipe_id',
        'amount',
    ];
    
    public function basicoils(){
        return $this->belongsTo(Basicoil::class, 'basicoil_id', 'id');
    }

    public function recipes(){
        return $this->belongsTo(Recipe::class, 'recipe_id', 'id');
    }
}
