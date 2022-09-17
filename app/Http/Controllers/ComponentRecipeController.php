<?php

namespace App\Http\Controllers;

use App\Models\ComponentRecipe;
use App\Models\Recipe;
use Illuminate\Http\Request;

class ComponentRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ComponentRecipe  $componentRecipe
     * @return \Illuminate\Http\Response
     */
    public function show(ComponentRecipe $componentRecipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ComponentRecipe  $componentRecipe
     * @return \Illuminate\Http\Response
     */
    public function edit(ComponentRecipe $componentRecipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ComponentRecipe  $componentRecipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComponentRecipe $componentRecipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComponentRecipe  $componentRecipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComponentRecipe $componentRecipe)
    {
        //
    }

    public function createOrUpdate(Request $request){
        header('Content-Type: application/json; charset = utf-8');

        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){


/*             $selectedRecipe = ComponentRecipe::where('recipe_id', $request->recipeId)
                                            ->where('component_id', $request->componentId)->first();

            if(is_null($selectedRecipe)){
                ComponentRecipe::create([
                    'component_id' => $request->componentId,
                    'recipe_id' => $request->recipeId,
                ]);
            }else{
                $selectedRecipe->update([
                    'component_id' => $request->componentId,
                    'recipe_id' => $request->recipeId,
                ]);
            } */






            return response()->json([
                'response'=>$request->componentId,
                
            ]);
        }
    }
}
