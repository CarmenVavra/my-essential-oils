<?php

namespace App\Http\Controllers;

use App\Models\Applicationscope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationscopeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicationscopes = Applicationscope::all()->sortBy('name');

        if(Auth::user()->id === 1){
            return view('admin.applicationscopes.index', compact('applicationscopes'));
        }
        return view('user.applicationscopes.index', compact('applicationscopes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.applicationscopes.create');
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
        $request['section_name'] = $request['radioApplicationSection'] ?? '';
        $request['section_short'] = isset($request['radioApplicationSection']) ? substr(strtoupper($request['radioApplicationSection']), 0, 1) : '';

        Applicationscope::create($request->all());
        return redirect()->route('admin.applicationscopes.index')->with('success', 'Der Anwendungsbereich wurde erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicationscope  $applicationscope
     * @return \Illuminate\Http\Response
     */
    public function show(Applicationscope $applicationscope)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicationscope  $applicationscope
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicationscope $applicationscope)
    {
        return view('admin.applicationscopes.edit', compact('applicationscope'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicationscope  $applicationscope
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicationscope $applicationscope)
    {
        $request->validate([
            'name' => '|min:2|max:255|',
        ]);
        $request['section_name'] = $request['radioApplicationSection'] ?? '';
        $request['section_short'] = isset($request['radioApplicationSection']) ? substr(strtoupper($request['radioApplicationSection']), 0, 1) : '';
        
        $applicationscope->update($request->all());
        return redirect()->route('admin.applicationscopes.index')->with('success', 'Der Anwendungsbereich wurde erfolgreich geändert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicationscope  $applicationscope
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicationscope $applicationscope)
    {
        $applicationscope->delete();
        return redirect()->route('admin.applicationscopes.index')->with('success', 'Der Anwendungsbereich wurde erfolgreich gelöscht!');
    }
}
