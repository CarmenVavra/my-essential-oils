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
                'amount' => $request->amount,
                'unit' => $request->unit,
            ];

            if(is_null($essentialoilRecipe)){
                $recipe = EssentialoilRecipe::create($data);
                $recipe = $recipe->recipe_id;
            }else{
                $recipe = $essentialoilRecipe->recipe_id;
            }

            return response()->json([
                'recipeId'=>$recipe,
                'essentialoilName' => $essentialoil->name_english,  
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
        header('Content-Type: application/json; charset = utf-8');

        if(strtolower($_SERVER['REQUEST_METHOD']) == 'put'){
            
            if(isset($request->dataArray)){
                $essentialoilName = $request->dataArray[0];
                $essentialoilName = str_replace('_', ' ', $essentialoilName);
                $essentialoil = Essentialoil::where('name_english', $essentialoilName)->first();
                $essentialoilRecipe = EssentialoilRecipe::where('recipe_id', $request->recipeId)
                                                        ->where('essentialoil_id', $essentialoil->id)->first();
            
                if(!is_null($essentialoilRecipe)){
                    $essentialoilRecipe->update([
                        'recipe_id' => $request->recipeId,
                        'essentialoil_id' => $essentialoil->id,
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
     * @param  \App\Models\EssentialoilRecipe  $essentialoilRecipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        header('Content-Type: application/json; charset = utf-8');

        if(strtolower($_SERVER['REQUEST_METHOD']) == 'delete'){
             if(isset($request->data)){
                $essentialoilName = $request->data;
                $essentialoilName = str_replace('_', ' ', $essentialoilName);
                $essentialoil = Essentialoil::where('name_english', $essentialoilName)->first();
                $essentialoilRecipe = EssentialoilRecipe::where('essentialoil_id', $essentialoil->id)
                                                       ->where('recipe_id', $request->recipeId)->first();

                if(!is_null($essentialoilRecipe)){
                    $essentialoilRecipe->delete();
                }
            }

            return response()->json([
                'response' => $request->data,
            ]);
        }
    }
}
