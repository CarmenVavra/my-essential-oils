<?php

namespace App\Http\Controllers;

use App\Models\Basicoil;
use Illuminate\Http\Request;

class BasicoilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basicoils = Basicoil::all()->sortBy('name');
        return view('admin.basicoils.index', compact('basicoils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basicoils.create');
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
            'name' => '|min:2|max:255|'/* ,
            'skintype' => '|min:2|max:255|',
            'skinarea' => '|min:2|max:255|',
            'description' => '|min:2|max:255|', */
        ]);

        Basicoil::create($request->all());
        return redirect()->route('admin.basicoils.index')->with('success', 'Das Basisöl wurde erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basicoil  $basicoil
     * @return \Illuminate\Http\Response
     */
    public function show(Basicoil $basicoil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Basicoil  $basicoil
     * @return \Illuminate\Http\Response
     */
    public function edit(Basicoil $basicoil)
    {
        return view('admin.basicoils.edit', compact('basicoil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basicoil  $basicoil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basicoil $basicoil)
    {
        $request->validate([
            'name' => '|min:2|max:255|'/* ,
            'skintype' => '|min:2|max:255|',
            'skinarea' => '|min:2|max:255|',
            'description' => '|min:2|max:255|', */
        ]);

        $basicoil->update($request->all());
        return redirect()->route('admin.basicoils.index')->with('success', 'Das Basisöl wurde erfolgreich geändert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basicoil  $basicoil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basicoil $basicoil)
    {
        $basicoil->delete();
        return redirect()->route('admin.basicoils.index')->with('success', 'Das Basisöl wurde erfolgreich gelöscht!');
    }
}
