<?php

namespace App\Http\Controllers;

use App\Models\Physicaleffect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhysicaleffectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $physicaleffects = Physicaleffect::all()->sortBy('name');
        if(Auth::user()->id === 1){
            return view('admin.physicaleffects.index', compact('physicaleffects'));
        }
        return view('user.physicaleffects.index', compact('physicaleffects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.physicaleffects.create');
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
            'name' => '|min:2|max:255|'
        ]);

        Physicaleffect::create($request->all());
        return redirect()->route('admin.physicaleffects.index')->with('success', 'Körperliche Wirkung wurde erfolgreich erstellt!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Physicaleffect  $physicaleffect
     * @return \Illuminate\Http\Response
     */
    public function show(Physicaleffect $physicaleffect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Physicaleffect  $physicaleffect
     * @return \Illuminate\Http\Response
     */
    public function edit(Physicaleffect $physicaleffect)
    {
        return view('admin.physicaleffects.edit', compact('physicaleffect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Physicaleffect  $physicaleffect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Physicaleffect $physicaleffect)
    {
        $request->validate([
            'name' => '|min:2|max:255|'
        ]);

        $physicaleffect->update($request->all());
        return redirect()->route('admin.physicaleffects.index')->with('success', 'Körperliche Wirkung wurde erfolgreich geändert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Physicaleffect  $physicaleffect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Physicaleffect $physicaleffect)
    {
        $physicaleffect->delete();
        return redirect()->route('admin.physicaleffects.index')->with('success', 'Körperliche Wirkung wurde erfolgreich gelöscht!');
    }
}
