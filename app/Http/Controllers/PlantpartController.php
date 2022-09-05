<?php

namespace App\Http\Controllers;

use App\Models\Plantpart;
use Illuminate\Http\Request;

class PlantpartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantparts = Plantpart::all()->sortBy('part');
        return view('admin.plantparts.index', compact('plantparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plantparts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'part' => '|min:2|max:255|',
        ]);

        Plantpart::create($request->all());
        return redirect()->route('admin.plantparts.index')->with('success', 'Das Pflanzenteil wurde erfolgreich angelegt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plantpart  $plantpart
     * @return \Illuminate\Http\Response
     */
    public function show(Plantpart $plantpart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plantpart  $plantpart
     * @return \Illuminate\Http\Response
     */
    public function edit(Plantpart $plantpart)
    {
        return view('admin.plantparts.edit', compact('plantpart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plantpart  $plantpart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plantpart $plantpart)
    {
        $request->validate([
            'part' => '|min:2|max:255|',
        ]);

        $plantpart->update($request->all());
        return redirect()->route('admin.plantparts.index')->with('success', 'Das Pflanzenteil wurde erfolgreich geändert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plantpart  $plantpart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plantpart $plantpart)
    {
        $plantpart->delete();
        return redirect()->route('admin.plantparts.index')->with('success', 'Das Pflanzenteil wurde erfolgreich gelöscht!');
    }
}
