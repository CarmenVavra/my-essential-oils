<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Basicoil;
use App\Models\Component;
use App\Models\Essentialoil;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all()->sortBy('name');
        return view('admin.recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $essentialoils = Essentialoil::all()->sortBy('name_english');
        $basicoils = Basicoil::all()->sortBy('name');
        $components = Component::all()->sortBy('name');
        $applications = Application::all()->sortBy('name');

        return view('admin.recipes.create', compact('essentialoils', 'basicoils', 'components', 'applications'));
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

        dd($request);
        Recipe::create($request->all());
        return redirect()->route('admin.recipes.index')->with('success', 'Das Rezept wurde erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view('admin.recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'name' => 'min:2|max:255',
        ]);

        $recipe->update($request->all());
        return redirect()->route('admin.recipes.index')->with('success', 'Das Rezept wurde erfolgreich geändert!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('admin.recipes.index')->with('success', 'Das Rezept wurde erfolgreich gelöscht!');
    }
}
