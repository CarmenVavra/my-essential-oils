<?php

namespace App\Http\Controllers;

use App\Models\Essentialoil;
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
        return view('admin.essentialoils.index', compact('essentialoils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.essentialoils.create');
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
