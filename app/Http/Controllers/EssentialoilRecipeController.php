<?php

namespace App\Http\Controllers;

use App\Models\Essentialoil;
use App\Models\EssentialoilRecipe;
use Illuminate\Http\Request;

class EssentialoilRecipeController extends Controller
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
        header('Content-Type: application/json; charset = utf-8');

        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){

            $essentialoil = Essentialoil::where('name_english', $request->name)->first();
            $essentialoilRecipe = EssentialoilRecipe::where('recipe_id', $request->recipeId)
                                                    ->where('essentialoil_id', $essentialoil->id)->first();

            $data = [
                'recipe_id' => $request->recipeId,
                'essentialoil_id' => $essentialoil->id,
            ];

            if(is_null($essentialoilRecipe)){
                $recipe = EssentialoilRecipe::create($data);
                $recipe = $recipe->recipe_id;
            }else{
                $recipe = $essentialoilRecipe->recipe_id;
            }

            return response()->json([
                'recipeId'=>$essentialoil,  
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EssentialoilRecipe  $essentialoilRecipe
     * @return \Illuminate\Http\Response
     */
    public function show(EssentialoilRecipe $essentialoilRecipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EssentialoilRecipe  $essentialoilRecipe
     * @return \Illuminate\Http\Response
     */
    public function edit(EssentialoilRecipe $essentialoilRecipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EssentialoilRecipe  $essentialoilRecipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EssentialoilRecipe $essentialoilRecipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EssentialoilRecipe  $essentialoilRecipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(EssentialoilRecipe $essentialoilRecipe)
    {
        //
    }
}
