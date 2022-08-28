<?php

namespace App\Http\Controllers;

use App\Models\Mentaleffect;
use Illuminate\Http\Request;

class MentaleffectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentaleffects = Mentaleffect::all();
        return view('admin.mentaleffects.index', compact('mentaleffects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mentaleffects.create');
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
            'name' => '|min:2|max:255|',
            'description' => '|min:2|max:255|',
        ]);

        Mentaleffect::create($request->all());
        return redirect()->route('admin.mentaleffects.index')->with('success', 'Körperliche Wirkung wurde erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mentaleffect  $mentaleffect
     * @return \Illuminate\Http\Response
     */
    public function show(Mentaleffect $mentaleffect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mentaleffect  $mentaleffect
     * @return \Illuminate\Http\Response
     */
    public function edit(Mentaleffect $mentaleffect)
    {
        return view('admin.mentaleffects.edit', compact('mentaleffect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mentaleffect  $mentaleffect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mentaleffect $mentaleffect)
    {
        $request->validate([
            'name' => '|min:2|max:255|',
            'description' => '|min:2|max:255|',
        ]);

        $mentaleffect->update($request->all());
        return redirect()->route('admin.mentaleffects.index')->with('success', 'Körperliche Wirkung wurde erfolgreich geändert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mentaleffect  $mentaleffect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mentaleffect $mentaleffect)
    {
        $mentaleffect->delete();
        return redirect()->route('admin.mentaleffects.index')->with('success', 'Körperliche Wirkung wurde erfolgreich gelöscht!');
    }
}
