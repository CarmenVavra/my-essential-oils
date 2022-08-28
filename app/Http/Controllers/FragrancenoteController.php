<?php

namespace App\Http\Controllers;

use App\Models\Fragrancenote;
use Illuminate\Http\Request;

class FragrancenoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fragrancenotes = Fragrancenote::all();
        return view('admin.fragrancenotes.index', compact('fragrancenotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fragrancenotes.create');
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
        ]);

        Fragrancenote::create($request->all());
        return redirect()->route('admin.fragrancenotes.index')->with('success', 'Die Duftnote wurde erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fragrancenote  $fragrancenote
     * @return \Illuminate\Http\Response
     */
    public function show(Fragrancenote $fragrancenote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fragrancenote  $fragrancenote
     * @return \Illuminate\Http\Response
     */
    public function edit(Fragrancenote $fragrancenote)
    {
        return view('admin.fragrancenotes.edit', compact('fragrancenote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fragrancenote  $fragrancenote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fragrancenote $fragrancenote)
    {
        $request->validate([
            'name' => '|min:2|max:255|',
        ]);

        $fragrancenote->update($request->all());
        return redirect()->route('admin.fragrancenotes.index')->with('success', 'Die Duftnote wurde erfolgreich geändert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fragrancenote  $fragrancenote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fragrancenote $fragrancenote)
    {
        $fragrancenote->delete();
        return redirect()->route('admin.fragrancenotes.index')->with('success', 'Die Duftnote wurde erfolgreich gelöscht!');
    }
}
