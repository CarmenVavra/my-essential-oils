<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name'
    ];

    /**
     * 
     */
    public function essentialoils(){
        return $this->hasMany(Essentialoil::class, 'method_id', 'id');
    }
}
