<?php

namespace App\Http\Controllers;

use App\Models\Scentdirection;
use Illuminate\Http\Request;

class ScentdirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scentdirections = Scentdirection::all()->sortBy('name');
        return view('admin.scentdirections.index', compact('scentdirections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.scentdirections.create');
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
            'name' => 'min:2|max:255',
        ]);

        Scentdirection::create($request->all());
        return redirect()->route('admin.scentdirections.index')->with('success', 'Die Duftrichtung wurde erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scentdirection  $scentdirection
     * @return \Illuminate\Http\Response
     */
    public function show(Scentdirection $scentdirection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scentdirection  $scentdirection
     * @return \Illuminate\Http\Response
     */
    public function edit(Scentdirection $scentdirection)
    {
        return view('admin.scentdirections.edit', compact('scentdirection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scentdirection  $scentdirection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scentdirection $scentdirection)
    {
        $request->validate([
            'name',
        ]);

        $scentdirection->update($request->all());
        return redirect()->route('admin.scentdirections.index')->with('success', 'Die Duftrichtung wurde erfolgreich geändert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scentdirection  $scentdirection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scentdirection $scentdirection)
    {
        $scentdirection->delete();
        return redirect()->route('admin.scentdirections.index')->with('success', 'Die Duftrichtung wurde erfolgreich gelöscht!');
    }
}
