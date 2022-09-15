<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationRecipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'recipe_id',
        'how_to',
    ];

    public function applications(){
        return $this->belongsToMany(Application::class, 'application', 'application_id', 'id');
    }

    public function recipes(){
        return $this->belongsToMany(Recipe::class, 'recipes', 'recipe_id', 'id');
    }

}
