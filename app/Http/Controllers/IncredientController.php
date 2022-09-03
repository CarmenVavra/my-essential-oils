<?php

namespace App\Http\Controllers;

use App\Models\Incredient;
use Illuminate\Http\Request;

class IncredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incredients = Incredient::all();
        return view('admin.incredients.index', compact('incredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.incredients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => '|min:2|max:255|',
        ]);

        Incredient::create($request->all());
        return redirect()->route('admin.incredients.index')->with('success', 'Der Inhaltsstoff wurde erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incredient  $incredient
     * @return \Illuminate\Http\Response
     */
    public function show(Incredient $incredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incredient  $incredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Incredient $incredient)
    {
        return view('admin.incredients.edit', compact('incredient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incredient  $incredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incredient $incredient)
    {
        //dd($request);
        $request->validate([
            'name' => '|min:2|max:255|',
        ]);

        $incredient->update($request->all());        
        return redirect()->route('admin.incredients.index')->with('success', 'Der Inhaltsstoff wurde erfolgreich geändert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incredient  $incredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incredient $incredient)
    {
        $incredient->delete();
        return redirect()->route('admin.incredients.index')->with('success', 'Der Inhaltsstoff wurde erfolgreich gelöscht!');
    }
}
