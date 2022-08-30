<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Essentialoil extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_german',
        'name_latin',
        'name_english',
        'description',
        'pur',
        'dilute',
        'sensitive',
        'internal',
        'merchant_id',
        'method_id',
    ];

    /**
     * foreignkey constraints
     * 
     * @return \Illuminate\Http\Response
     */    
    public function merchant(){
        return $this->belongsTo(Merchant::class, 'merchant_id', 'id');
    }

    /**
     * foreignkey constraints
     * 
     * @return \Illuminate\Http\Response
     */    
    public function method(){
        return $this->belongsTo(Method::class, 'method_id', 'id');
    }

    /**
     * foreignkey constraints
     * 
     * @return \Illuminate\Http\Response
     */ 
    public function attentionEssentialoils(){
        return $this->belongsToMany(AttentionEssentialoil::class, 'essentialoil_id', 'id');
    }

}
