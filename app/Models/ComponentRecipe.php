<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentRecipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'component_id',
        'recipe_id',
        'amount',
        'unit',
    ];

    public function components(){
        return $this->belongsToMany(Component::class, 'components', 'component_id', 'id');
    }

    public function recipes(){
        return $this->belongsToMany(Recipe::class, 'recipes', 'recipe_id', 'id');
    }

}
