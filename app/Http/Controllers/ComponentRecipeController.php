<?php

namespace App\Http\Controllers;

use App\Models\Component;
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
        header('Content-Type: application/json; charset = utf-8');

        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){

            $component = Component::where('name', $request->name)->first();
            $componentRecipe = ComponentRecipe::where('recipe_id', $request->recipeId)
                                                ->where('component_id', $component->id)->first();

            $data = [
                'recipe_id' => $request->recipeId,
                'component_id' => $component->id,
            ];

            if(is_null($componentRecipe)){
                $recipe = ComponentRecipe::create($data);
                $recipe = $recipe->recipe_id;
            }else{
                $recipe = $componentRecipe->recipe_id;
            }

            return response()->json([
                'recipeId'=>$recipe,
                'componentName' => $component->name,
            ]);
        }
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
    public function update(Request $request)
    {
        header('Content-Type: application/json; charset = utf-8');

        if(strtolower($_SERVER['REQUEST_METHOD']) == 'put'){
            if(isset($request->dataArray[0])){
                $componentName = $request->dataArray[0];
                $componentName = str_replace('_', ' ', $componentName);
                $component = Component::where('name', $componentName)->first();
                $componentRecipe = ComponentRecipe::where('component_id', $component->id)
                                                    ->where('recipe_id', $request->recipeId)->first();

                if(!is_null($componentRecipe)){
                    $componentRecipe->update([
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
     * @param  \App\Models\ComponentRecipe  $componentRecipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        header('Content-Type: application/json; charset = utf-8');

        if(strtolower($_SERVER['REQUEST_METHOD']) == 'delete'){
/*              if(isset($request->data)){
                $componentName = $request->data;
                $componentName = str_replace('_', ' ', $componentName);
                $component = Component::where('name', $componentName)->first();
                $componentRecipe = ComponentRecipe::where('component_id', $component->id)
                                                    ->where('recipe_id', $request->recipeId)->first();

                if(!is_null($componentRecipe)){
                    $componentRecipe->delete();
                }
            } */

            return response()->json([
                'response' => $request->data,
            ]);
        }
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
