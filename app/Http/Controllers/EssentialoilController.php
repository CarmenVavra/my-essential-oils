<?php

namespace App\Http\Controllers;

use App\Models\Applicationscope;
use App\Models\ApplicationscopeEssentialoil;
use App\Models\Attention;
use App\Models\AttentionEssentialoil;
use App\Models\Essentialoil;
use App\Models\EssentialoilFragrancenote;
use App\Models\EssentialoilIncredient;
use App\Models\EssentialoilMentaleffect;
use App\Models\EssentialoilPhysicaleffect;
use App\Models\EssentialoilPlantpart;
use App\Models\Fragrancenote;
use App\Models\Incredient;
use App\Models\Mentaleffect;
use App\Models\Merchant;
use App\Models\Method;
use App\Models\Physicaleffect;
use App\Models\Plantpart;
use Illuminate\Http\Request;

class EssentialoilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $essentialOils = Essentialoil::join('merchants as merch', 'merchant_id', '=', 'merch.id')
                                        ->join('methods as meth', 'method_id', '=', 'meth.id')
                                        ->select('essentialoils.*', 'merch.name as merchant_name', 'meth.name as method_name')->get();

        // TODO: hope it works ... check this
        // it seems that this does not work 
/*         foreach($essentialoils as $essentialoil){
            $data = [];
            $data['mentalEffects'] =  EssentialoilMentaleffect::where('essentialoil_id', $essentialoil->id)->get();
            $data['physicalEffects'] = EssentialoilPhysicaleffect::where('essentialoil_id', $essentialoil->id)->get();
            $fragranceNotes[] = EssentialoilFragrancenote::where('essentialoil_id', $essentialoil->id)->get();
            $attentions[] = AttentionEssentialoil::where('essentialoil_id', $essentialoil->id)->get();
            $incredients[] = EssentialoilIncredient::where('essentialoil_id', $essentialoil->id)->get();
            $applicationScope[] = ApplicationscopeEssentialoil::where('essentialoil_id', $essentialoil->id)->get();
            $plantParts[] = EssentialoilPlantpart::where('essentialoil_id', $essentialoil->id)->get();
        } */

        return view('admin.essentialoils.index', compact('essentialOils'/* , 'mentalEffects', 'physicalEffects' */));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'merchants' => Merchant::all(),
            'methods' => Method::all(),
            'plantparts' => Plantpart::all(),
            'attentions' => Attention::all(),
            'incredients' => Incredient::all(),
            'fragrancenotes' => Fragrancenote::all(),
            'applicationscopes' => Applicationscope::all(),
            'physicaleffects' => Physicaleffect::all(),
            'mentaleffects' => Mentaleffect::all(),
        ];
   
        return view('admin.essentialoils.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $essentialOils['name_german'] = $request['name_german'] ?? '';
        $essentialOils['name_latin'] = $request['name_latin'] ?? '';
        $essentialOils['name_english'] = $request['name_english'] ?? '';
        $essentialOils['description'] = $request['description'] ?? '';
        $essentialOils['pur'] = isset($request['pur']) ? true : false;
        $essentialOils['dilute'] = isset($request['dilute']) ? true : false;
        $essentialOils['sensitive'] = isset($request['sensitive']) ? true : false;
        $essentialOils['internal'] = isset($request['internal']) ? true : false;
        $essentialOils['merchant_id'] = $request['merchantSelect'] ?? '';
        $essentialOils['method_id'] = $request['methodSelect'] ?? '';
        
        $essentialOil = Essentialoil::create($essentialOils);
        $essentialOilId = $essentialOil['id'];
        
        
        
        
        if(isset($request['plantpartSelect'])){
            foreach($request['plantpartSelect'] as $plantpartId){
                $plantpart = EssentialoilPlantpart::create(['essentialoil_id' => $essentialOilId, 'plantpart_id' => $plantpartId]);
            }
        }
        
        if(isset($request['incredientSelect'])){
            foreach($request['incredientSelect'] as $incredientId){
                $incredient = EssentialoilIncredient::create(['essentialoil_id' => $essentialOilId, 'incredient_id' => $incredientId]);
            }
        }
        
        if(isset($request['applicationscopeSelect'])){
            foreach($request['applicationscopeSelect'] as $applicationscopeId){
                ApplicationscopeEssentialoil::create(['essentialoil_id' => $essentialOilId, 'applicationscope_id' => $applicationscopeId]);
            }
        }
        
        if(isset($request['attentionSelect'])){
            foreach($request['attentionSelect'] as $attentionId){
                $attention = AttentionEssentialoil::create(['essentialoil_id' => $essentialOilId, 'attentiont_id' => $attentionId]);
            }
        }
        
        dd($attention);
        if(isset($request['physicaleffectSelect'])){
            foreach($request['physicaleffectSelect'] as $physicaleffectId){
                EssentialoilPhysicaleffect::create(['essentialoil_id' => $essentialOilId, 'physicaleffect_id' => $physicaleffectId]);
            }
        }
        
        if(isset($request['mentaleffectSelect'])){
            foreach($request['mentaleffectSelect'] as $mentaleffectId){
                EssentialoilMentaleffect::create(['essentialoil_id' => $essentialOilId, 'mentaleffect_id' => $mentaleffectId]);
            }
        }
        
        if(isset($request['fragrancenoteSelect'])){
            foreach($request['fragrancenoteSelect'] as $fragrancenoteId){
                EssentialoilFragrancenote::create(['essentialoil_id' => $essentialOilId, 'fragrancenote_id' => $fragrancenoteId]);
            }
        }

        return redirect()->route('admin.essentialoils.index')->with('success', 'Das ätherische Öl wurde erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Essentialoil  $essentialoil
     * @return \Illuminate\Http\Response
     */
    public function show(Essentialoil $essentialoil)
    {
        $data = [
            'merchant' => $essentialoil->merchant()->first(),
            'method' => $essentialoil->method()->first(),
            'attentions' => $essentialoil->attentions,
            'applicationscopes' => $essentialoil->applicationscopes,
            'plantparts' => $essentialoil->plantparts,
            'incredients' => $essentialoil->incredients,
            'fragrancenotes' => $essentialoil->fragrancenotes,
            'physicaleffects' => $essentialoil->physicaleffects,
            'mentaleffects' => $essentialoil->mentaleffects,
        ];

        return view('admin.essentialoils.show', compact('essentialoil', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Essentialoil  $essentialoil
     * @return \Illuminate\Http\Response
     */
    public function edit(Essentialoil $essentialoil)
    {

        
        $data = [
            'merchants' => Merchant::all(),
            'methods' => Method::all(),
            'plantparts' => Plantpart::all(),
            'attentions' => Attention::all(),
            'incredients' => Incredient::all(),
            'fragrancenotes' => Fragrancenote::all(),
            'applicationscopes' => Applicationscope::all(),
            'physicaleffects' => Physicaleffect::all(),
            'mentaleffects' => Mentaleffect::all(),
        ];

        return view('admin.essentialoils.edit', compact('essentialoil', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Essentialoil  $essentialoil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Essentialoil $essentialoil)
    {


        //dd($request);
        $essentialOils['name_german'] = $request['name_german'] ?? '';
        $essentialOils['name_latin'] = $request['name_latin'] ?? '';
        $essentialOils['name_english'] = $request['name_english'] ?? '';
        $essentialOils['description'] = $request['description'] ?? '';
        $essentialOils['pur'] = isset($request['pur']) ? true : false;
        $essentialOils['dilute'] = isset($request['dilute']) ? true : false;
        $essentialOils['sensitive'] = isset($request['sensitive']) ? true : false;
        $essentialOils['internal'] = isset($request['internal']) ? true : false;
        $essentialOils['merchant_id'] = $request['merchantSelect'] ?? '';
        $essentialOils['method_id'] = (isset($request['methodSelect'])) ? $request['methodSelect'] : 0; 


        //$essentialoil->update($essentialOils);

/*         $merchant = $essentialoil->merchant;
        $merchant->update($request['merchantSelect']);
        $method = $essentialoil->method;
        $method->update($request['methodSelect']); */
        $attentions = $essentialoil->attentions;
        foreach($attentions as $attention){
            $attention->update($request['attentionSelect']);
        }
        $plantparts = $essentialoil->plantparts;
        //dd($plantparts);
        foreach($plantparts as $plantpart){
            // die Felder im plantpartSelect müssen noch in die DB-Spaltennamen umbenannt werden
            $plantpart->update($request['plantpartSelect']);
        }
/*        $incredients = $essentialoil->incredients;
        $incredients->update($request['incredientSelect']);
        $fragrancenotes = $essentialoil->fragrancenotes;
        $fragrancenotes->update($request['fragrancenoteSelect']);
        $applicationscope = $essentialoil->applicationscopes;
        $applicationscope->update($request['applicationscopeSelect']);
        $physicaleffects = $essentialoil->physicaleffects;
        $physicaleffects->update($request['physicaleffectSelect']);
        $mentaleffects = $essentialoil->mentaleffects;
        $mentaleffects->update($request['mentaleffectSelect']); */

        //$essentialoil->update($request->all());
        return redirect()->route('admin.essentialoils.index')->with('success', 'Das ätherische Öl wurde erfolgreich geändert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Essentialoil  $essentialoil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Essentialoil $essentialoil)
    {
        $essentialoil->delete();
        return redirect()->route('admin.essentialoils.index')->with('success', 'Das ätherische Öl wurde erfolgreich gelöscht!');
    }

}
