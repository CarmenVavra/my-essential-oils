<?php

namespace App\Http\Controllers;

use App\Models\Basicoil;
use App\Models\BasicoilRecipe;
use Illuminate\Http\Request;

class BasicoilRecipeController extends Controller
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

            $basicoil = Basicoil::where('name', $request->name)->first();
            $basicoilRecipe = BasicoilRecipe::where('recipe_id', $request->recipeId)
                                            ->where('basicoil_id', $basicoil->id)->first();

            $data = [
                'basicoil_id' => $basicoil->id,
                'recipe_id' => $request->recipeId,
            ];

            if(is_null($basicoilRecipe)){
                $recipe = BasicoilRecipe::create($data);
                $recipe = $recipe->recipe_id;
            }else{
                $recipe = $basicoilRecipe->recipe_id;
            }

            return response()->json([
                'recipeId'=>$basicoil->id,  
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BasicoilRecipe  $basicoilRecipe
     * @return \Illuminate\Http\Response
     */
    public function show(BasicoilRecipe $basicoilRecipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BasicoilRecipe  $basicoilRecipe
     * @return \Illuminate\Http\Response
     */
    public function edit(BasicoilRecipe $basicoilRecipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BasicoilRecipe  $basicoilRecipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BasicoilRecipe $basicoilRecipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BasicoilRecipe  $basicoilRecipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(BasicoilRecipe $basicoilRecipe)
    {
        //
    }
}
