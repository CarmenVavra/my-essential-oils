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
        $essentialoils = Essentialoil::all();

        // TODO: hope it works ... check this
        // it seems that this does not work 
        foreach($essentialoils as $essentialoil){
            $mentalEffects[] = EssentialoilMentaleffect::where('essentialoil_id', $essentialoil->id)->get();
            $physicalEffects[] = EssentialoilPhysicaleffect::where('essentialoil_id', $essentialoil->id)->get();
            $fragranceNotes[] = EssentialoilFragrancenote::where('essentialoil_id', $essentialoil->id)->get();
            $attentions[] = AttentionEssentialoil::where('essentialoil_id', $essentialoil->id)->get();
            $incredients[] = EssentialoilIncredient::where('essentialoil_id', $essentialoil->id)->get();
            $applicationScope[] = ApplicationscopeEssentialoil::where('essentialoil_id', $essentialoil->id)->get();
            $plantParts[] = EssentialoilPlantpart::where('essentialoil_id', $essentialoil->id)->get();
        }

        return view('admin.essentialoils.index', compact('essentialoils'/* , 'mentalEffects', 'physicalEffects' */));
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
    public function store(Request $request)
    {

        $usageTypes = $this->getUsageTypes($request);
 
        $request['pur'] = $usageTypes['pur'];
        $request['dilute'] = $usageTypes['dilute'];
        $request['sensitive'] = $usageTypes['sensitive'];
        $request['internal'] = $usageTypes['internal'];

/*         $essentialoilData = [
            'pur' => $usageTypes['pur'],
            'dilute' => $usageTypes['dilute'],
            'sensitive' => $usageTypes['sensitive'],
            'internal' => $usageTypes['internal'],
        ];
 */  
        $request->validate([

        ]);

        Essentialoil::create($request->all());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Essentialoil  $essentialoil
     * @return \Illuminate\Http\Response
     */
    public function edit(Essentialoil $essentialoil)
    {
        return view('admin.essentialoils.edit', compact('essentialoil'));
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
        $usageTypes = $this->getUsageTypes($request);
 
        $request['pur'] = $usageTypes['pur'];
        $request['dilute'] = $usageTypes['dilute'];
        $request['sensitive'] = $usageTypes['sensitive'];
        $request['internal'] = $usageTypes['internal'];

        $request->validate([

        ]);

        $essentialoil->update($request->all());
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

    /**
     * @param Request $request
     * 
     * @return array
     */
    private function getUsageTypes(Request $request){
        return [
            'pur' => $request->pur ? true : false,
            'dilute' => $request->dilute ? true : false,
            'sensitive' => $request->sensitive ? true : false,
            'internal' => $request->internal ? true : false,
        ];
    }
}
