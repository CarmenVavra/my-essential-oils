<?php

namespace App\Http\Controllers;

use App\Models\Attention;
use Illuminate\Http\Request;

class AttentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attentions = Attention::all();
        return view('admin.attentions.index', compact('attentions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attentions.create');
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

        Attention::create($request->all());
        return redirect()->route('admin.attentions.index')->with('success', 'Der Gefahrenhinweis wurde erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function show(Attention $attention)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function edit(Attention $attention)
    {
        return view('admin.attentions.edit', compact('attention'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attention $attention)
    {
        $request->validate([
            'name' => '|min:2|max:255|',
            'description' => '|min:2|max:255|',
        ]);

        $attention->update($request->all());
        return redirect()->route('admin.attentions.index')->with('success', 'Der Gefahrenhinweis wurde erfolgreich geändert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attention $attention)
    {
        $attention->delete();
        return redirect()->route('admin.attentions.index')->with('success', 'Der Gefahrenhinweis wurde erfolgreich gelöscht!');
    }
}
