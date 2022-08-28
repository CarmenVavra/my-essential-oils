<?php

namespace App\Http\Controllers;

use App\Models\Method;
use Illuminate\Http\Request;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods = Method::all();
        return view('admin.methods.index', compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.method.create');
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

        Method::create($request->all());
        return redirect()->route('admin.methods.index')->with('success', 'Das Verfahren wurde erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function show(Method $method)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function edit(Method $method)
    {
        return view('admin.methods.edit', compact('method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Method $method)
    {
        $request->validate([
            'name' => '|min:2|max:255|',
            'description' => '|min:2|max:255|',
        ]);

        $method->update($request->all());
        return redirect()->route('admin.methods.index')->with('success', 'Das Verfahren wurde erfolgreich geändert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function destroy(Method $method)
    {
        $method->delete();
        return redirect()->route('admin.methods.index')->with('success', 'Das Verfahren wurde erfolgreich gelöscht!');
    }
}
