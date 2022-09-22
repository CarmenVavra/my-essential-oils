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
                'recipeId'=>$recipe,
                'basicoilName' => $basicoil->name,  
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
        header('Content-Type: application/json; charset = utf-8');

        if(strtolower($_SERVER['REQUEST_METHOD']) == 'put'){
            if(isset($request->dataArray[0])){
                $basicoilName = $request->dataArray[0];
                $basicoilName = str_replace('_', ' ', $basicoilName);
                $basicoil = Basicoil::where('name', $basicoilName)->first();
                $basicoilRecipe = BasicoilRecipe::where('basicoil_id', $basicoil->id)
                                                    ->where('recipe_id', $request->recipeId)->first();

                if(!is_null($basicoilRecipe)){
                    $basicoilRecipe->update([
                        'amount' => $request->dataArray[1],
                        'unit' => $request->dataArray[2],
                    ]);
                }
            }

            return response()->json([
                'response' => 'success',
            ]);
        }
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
