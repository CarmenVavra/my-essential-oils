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
use Exception;
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
                                        ->select('essentialoils.*', 'merch.name as merchant_name', 'meth.short_name as method_short_name')->get();

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
                AttentionEssentialoil::create(['essentialoil_id' => $essentialOilId, 'attentiont_id' => $attentionId]);
            }
        }
        
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
        //dd($essentialoil->plantparts);
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
        

        // TODO check this ... i am confused 
        //dd(EssentialoilPlantpart::where('essentialoil_id', $essentialoil->id)->get());

        $constraintsIds = [
            'essentialoil_plantparts' => EssentialoilPlantpart::where('essentialoil_id', $essentialoil->id)->select('plantpart_id')->get(), 
            'essentialoil_incredients' => EssentialoilIncredient::where('essentialoil_id', $essentialoil->id)->select('incredient_id')->get(),
            'essentialoil_fragrancenotes' => EssentialoilFragrancenote::where('essentialoil_id', $essentialoil->id)->select('fragrancenote_id')->get(),
            'attention_essentialoils' => AttentionEssentialoil::where('essentialoil_id', $essentialoil->id)->select('attention_id')->get(),
            'applicationscope_essentialoils' => ApplicationscopeEssentialoil::where('essentialoil_id', $essentialoil->id)->select('applicationscope_id')->get(),
            'essentialoil_physicaleffects' => EssentialoilPhysicaleffect::where('essentialoil_id', $essentialoil->id)->select('physicaleffect_id')->get(),
            'essentialoil_mentaleffects' => EssentialoilMentaleffect::where('essentialoil_id', $essentialoil->id)->select('mentaleffect_id')->get(),
        ];

        $pivotIds = [];
        $plantPartsIds = [];
        foreach($essentialoil->plantparts as $essPlantPart){
           $plantPartsIds[] = $essPlantPart['id'];
        }
        $pivotIds['essentialoil_plantparts'] = $plantPartsIds;

        $incredientsIds = [];
        foreach($essentialoil->incredients as $essIncredient){
           $incredientsIds[] = $essIncredient['id'];
        }
        $pivotIds['essentialoil_incredients'] = $incredientsIds;
        
        $fragranceNotesIds = [];
        foreach($essentialoil->fragrancenotes as $essFragranceNote){
           $fragranceNotesIds[] = $essFragranceNote['id'];
        }
        $pivotIds['essentialoil_fragrancenotes'] = $fragranceNotesIds;

        $attentionsIds = [];
        foreach($essentialoil->attentions as $essAttention){
            $attentionsIds[] = $essAttention['id'];
        }
        $pivotIds['attention_essentialoils'] = $attentionsIds;
        
        $applicationScopesIds = [];
        foreach($essentialoil->applicationscopes as $essApplicationScope){
           $applicationScopesIds[] = $essApplicationScope['id'];
        }
        $pivotIds['applicationscope_essentialoils'] = $applicationScopesIds;

        $physicalEffectIds = [];
        foreach($essentialoil->physicaleffects as $essPhysicalEffect){
           $physicalEffectIds[] = $essPhysicalEffect['id'];
        }
        $pivotIds['essentialoil_physicaleffects'] = $physicalEffectIds;

        $mentalEffectIds = [];
        foreach($essentialoil->mentaleffects as $essMentalEffect){
           $mentalEffectIds[] = $essMentalEffect['id'];
        }
        $pivotIds['essentialoil_mentaleffects'] = $mentalEffectIds;

        //dd($pivotIds);
        return view('admin.essentialoils.edit', compact('essentialoil', 'data' , 'pivotIds'));
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


        $essentialoil->update($essentialOils);

/*         $merchant = $essentialoil->merchant;
        $merchant->update($request['merchantSelect']);
        $method = $essentialoil->method;
        $method->update($request['methodSelect']); */

        $this->updateEssentialOilPlantParts($request, $essentialoil);
        $this->updateEssentialOilIncredients($request, $essentialoil);
        $this->updateEssentialOilFragranceNotes($request, $essentialoil);
        $this->updateAttentionEssentialOils($request, $essentialoil);
        $this->updateApplicationScopeEssentialOils($request, $essentialoil);
        $this->updateEssentialOilPhysicalEffects($request, $essentialoil);
        $this->updateEssentialOilMentalEffects($request, $essentialoil);

        return redirect()->route('admin.essentialoils.index')->with('success', 'Das ätherische Öl wurde erfolgreich geändert!');
    }

    /**
     * 
     */
    private function updateEssentialOilPlantParts(Request $request, EssentialOil $essentialoil){
        $pivotPlantParts = [];
        $pivotPlantPartsIds = [];
        foreach($plantpartsRequest = $request['plantpartSelect'] as $plantpartId){
            $pivotPlantParts[] = $essentialoil->plantparts;
            foreach($pivotPlantParts as $pivotPlantPart){
                foreach($pivotPlantPart as $pivPlantPart){
                    $pivotPlantPartsIds[] = $pivPlantPart['id'];
                }
            }

            if(!in_array($plantpartId, $pivotPlantPartsIds)){
                EssentialoilPlantpart::create([
                    'essentialoil_id' => $essentialoil->id,
                    'plantpart_id' => $plantpartId,
                ])->session_commit;
            }            
        }

        foreach($essentialoil->plantparts as $essPlantPart){
            if(!in_array($essPlantPart->id, $plantpartsRequest)){
                $essPlantPart = EssentialoilPlantpart::where('essentialoil_id', $essentialoil->id)
                                                        ->where('plantpart_id', $essPlantPart->id)->first();
                $essPlantPart->delete();
            }
        }
    }
    
    /**
     * 
     */
    private function updateEssentialOilIncredients(Request $request, EssentialOil $essentialoil){
        $pivotIncredients = [];
        $pivotIncredientsIds = [];
        foreach($incredientsRequest = $request['incredientSelect'] as $incredientId){
            $pivotIncredients[] = $essentialoil->incredients;
            foreach($pivotIncredients as $pivotIncredient){
                foreach($pivotIncredient as $pivInc){
                    $pivotIncredientsIds[] = $pivInc['id'];
                }
            }

            if(!in_array($incredientId, $pivotIncredientsIds)){
                EssentialoilIncredient::create([
                    'essentialoil_id' => $essentialoil->id,
                    'incredient_id' => $incredientId,
                ])->session_commit;
            }            
        }

        foreach($essentialoil->incredients as $essInc){
            if(!in_array($essInc->id, $incredientsRequest)){
                $essIncredient = EssentialoilIncredient::where('essentialoil_id', $essentialoil->id)
                                                        ->where('incredient_id', $essInc->id)->first();
                $essInc->delete();
            }
        }
    }

    private function updateEssentialOilFragranceNotes(Request $request, EssentialOil $essentialoil){
        $pivotFragranceNotes = [];
        $pivotFragranceNotesIds = [];
        foreach($fragranceNotesRequest = $request['fragrancenoteSelect'] as $fragranceNoteId){
            $pivotFragranceNotes[] = $essentialoil->fragrancenotes;
            foreach($pivotFragranceNotes as $pivotFragranceNote){
                foreach($pivotFragranceNote as $pivFragNote){
                    $pivotFragranceNotesIds[] = $pivFragNote['id'];
                }
            }

            if(!in_array($fragranceNoteId, $pivotFragranceNotesIds)){
                EssentialoilFragrancenote::create([
                    'essentialoil_id' => $essentialoil->id,
                    'fragrancenote_id' => $fragranceNoteId,
                ])->session_commit;
            }            
        }

        foreach($essentialoil->fragrancenotes as $essFragNote){
            if(!in_array($essFragNote->id, $fragranceNotesRequest)){
                $essFragNote = EssentialoilFragrancenote::where('essentialoil_id', $essentialoil->id)
                                                        ->where('fragrancenote_id', $essFragNote->id)->first();
                $essFragNote->delete();
            }
        }

    }
    
    /**
     * 
     */
    private function updateAttentionEssentialOils(Request $request, EssentialOil $essentialoil){
        $pivotAttentions = [];
        $pivotAttentionsIds = [];
        foreach($attentionsRequest = $request['attentionSelect'] as $attentionId){
            $pivotAttentions[] = $essentialoil->attentions;
            foreach($pivotAttentions as $pivotAttention){
                foreach($pivotAttention as $pivAtt){
                    $pivotAttentionsIds[] = $pivAtt['id'];
                }
            }

            if(!in_array($attentionId, $pivotAttentionsIds)){
                EssentialoilIncredient::create([
                    'essentialoil_id' => $essentialoil->id,
                    'attention_id' => $attentionId,
                ])->session_commit;
            }            
        }

        foreach($essentialoil->attentions as $essAtt){
            if(!in_array($essAtt->id, $attentionsRequest)){
                $attEss = AttentionEssentialoil::where('essentialoil_id', $essentialoil->id)
                                                ->where('attention_id', $essAtt->id)->first();
                $attEss->delete();
            }
        }
    } 

    private function updateApplicationScopeEssentialOils(Request $request, EssentialOil $essentialoil){

        if(is_null($request['applicationScopeRequest'])){
            return '';
        }
        $pivotApplicationScopes = [];
        $pivotApplicationScopesIds = [];
        foreach($applicationScopesRequest = $request['applicationScopeSelect'] as $applicationScopeId){
            $pivotApplicationScopes[] = $essentialoil->applicationScopes;
            foreach($pivotApplicationScopes as $pivotApplicationScope){
                foreach($pivotApplicationScope as $pivApp){
                    $pivotApplicationScopesIds[] = $pivApp['id'];
                }
            }

            if(!in_array($applicationScopeId, $pivotApplicationScopesIds)){
                ApplicationScopeEssentialoil::create([
                    'essentialoil_id' => $essentialoil->id,
                    'applicationScope_id' => $applicationScopeId,
                ])->session_commit;
            }            
        }

        foreach($essentialoil->applicationScopes as $essApp){
            if(!in_array($essApp->id, $applicationScopesRequest)){
                $appEss = ApplicationScopeEssentialoil::where('essentialoil_id', $essentialoil->id)
                                                        ->where('applicationScope_id', $essApp->id)->first();
                $appEss->delete();
            }
        }
    }
    
    /**
     * 
     */
    private function updateEssentialOilPhysicalEffects(Request $request, EssentialOil $essentialoil){
        if(is_null($request['PhysicalEffectRequest'])){

            return $essentialoil->physicaleffects()->delete();
        }
        $pivotPhysicalEffects = [];
        $pivotPhysicalEffectsIds = [];
        foreach($physicalEffectsRequest = $request['physicaleffectSelect'] as $physicalEffectId){
            $pivotPhysicalEffects[] = $essentialoil->physicalEffects;
            foreach($pivotPhysicalEffects as $pivotPhysicalEffect){
                foreach($pivotPhysicalEffect as $pivPhysEff){
                    $pivotPhysicalEffectsIds[] = $pivPhysEff['id'];
                }
            }

            if(!in_array($physicalEffectId, $pivotPhysicalEffectsIds)){
                EssentialoilPhysicalEffect::create([
                    'essentialoil_id' => $essentialoil->id,
                    'physicalEffect_id' => $physicalEffectId,
                ])->session_commit;
            }            
        }

        foreach($essentialoil->physicalEffects as $essPhysEff){
            if(!in_array($essPhysEff->id, $physicalEffectsRequest)){
                $essPhysEff = EssentialoilPhysicalEffect::where('essentialoil_id', $essentialoil->id)
                                                        ->where('physicalEffect_id', $essPhysEff->id)->first();
                $essPhysEff->delete();
            }
        }
    }

    private function updateEssentialOilMentalEffects(Request $request, EssentialOil $essentialoil){
        if(is_null($request['MentalEffectRequest'])){
            return '';
        }
        $pivotMentalEffects = [];
        $pivotMentalEffectsIds = [];
        foreach($mentalEffectsRequest = $request['mentaleffectSelect'] as $mentalEffectId){
            $pivotMentalEffects[] = $essentialoil->mentalEffects;
            foreach($pivotMentalEffects as $pivotMentalEffect){
                foreach($pivotMentalEffect as $pivMentEff){
                    $pivotMentalEffectsIds[] = $pivMentEff['id'];
                }
            }

            if(!in_array($mentalEffectId, $pivotMentalEffectsIds)){
                EssentialoilMentalEffect::create([
                    'essentialoil_id' => $essentialoil->id,
                    'mentalEffect_id' => $mentalEffectId,
                ])->session_commit;
            }            
        }

        foreach($essentialoil->mentalEffects as $essMentEff){
            if(!in_array($essMentEff->id, $mentalEffectsRequest)){
                $essMentEff = EssentialoilMentalEffect::where('essentialoil_id', $essentialoil->id)
                                                        ->where('mentalEffect_id', $essMentEff->id)->first();
                $essMentEff->delete();
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Essentialoil  $essentialoil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Essentialoil $essentialoil)
    {
        $essentialoil->attentions()->delete();
        $essentialoil->applicationscopes()->delete();
        $essentialoil->incredients()->delete();
        $essentialoil->plantparts()->delete();
        $essentialoil->fragrancenotes()->delete();
        $essentialoil->physicaleffects()->delete();
        $essentialoil->mentaleffects()->delete();
        $essentialoil->delete();
        return redirect()->route('admin.essentialoils.index')->with('success', 'Das ätherische Öl wurde erfolgreich gelöscht!');
    }

}
