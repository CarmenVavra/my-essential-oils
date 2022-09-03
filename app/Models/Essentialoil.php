<?php

namespace App\Models;

use App\Http\Controllers\MerchantController;
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

    public function attentions(){
        return $this->belongsToMany(Attention::class, 'attention_essentialoils', 'essentialoil_id', 'attention_id');
    }

    public function applicationscopes(){
        return $this->belongsToMany(Applicationscope::class, 'applicationscope_essentialoils', 'essentialoil_id', 'applicationscope_id');
    }

    public function incredients(){
        return $this->belongsToMany(Incredient::class, 'essentialoil_incredients', 'essentialoil_id', 'incredient_id');
    }

    public function plantparts(){
        return $this->belongsToMany(Plantpart::class, 'essentialoil_plantparts', 'essentialoil_id', 'plantpart_id');
    }

    public function fragrancenotes(){
        return $this->belongsToMany(Fragrancenote::class, 'essentialoil_fragrancenotes', 'essentialoil_id', 'fragrancenote_id');
    }

    public function physicaleffects(){
        return $this->belongsToMany(Physicaleffect::class, 'essentialoil_physicaleffects', 'essentialoil_id', 'physicaleffect_id');
    }

    public function mentaleffects(){
        return $this->belongsToMany(Mentaleffect::class, 'essentialoil_mentaleffects', 'essentialoil_id', 'mentaleffect_id');
    }

}
