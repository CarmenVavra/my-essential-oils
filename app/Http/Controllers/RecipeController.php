<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Basicoil;
use App\Models\BasicoilRecipe;
use App\Models\Component;
use App\Models\ComponentRecipe;
use App\Models\Essentialoil;
use App\Models\EssentialoilRecipe;
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

        header('Content-Type: application/json; charset = utf-8');

        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){

            $data = [
                'name' => $request->recipeName,
                'description' => $request->recipeDescription,
                'annotation' => $request->recipeAnnotation,
            ];

            $recipe = Recipe::create($data);

            return response()->json([
                'recipe'=>$recipe,
                
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        //components, basicoils, essentialoils from pivottables
        $componentRecipes = ComponentRecipe::where('recipe_id', $recipe->id)->get();
        if(!is_null($componentRecipes)){
            $components = [];
            foreach($componentRecipes as $compRec){
                $components[] = Component::join('component_recipes', 'component_id', '=', 'components.id')
                                            ->where('component_id', $compRec->component_id)
                                            ->where('recipe_id', $recipe->id)
                                            ->select('components.*', 'amount', 'unit')->get();
                }
        }

        $basicoilRecipes = BasicoilRecipe::where('recipe_id', $recipe->id)->get();
        if(!is_null($basicoilRecipes)){
            $basicoils = [];
            foreach($basicoilRecipes as $boRec){
                $basicoils[] = Basicoil::join('basicoil_recipes', 'basicoil_id', '=', 'basicoils.id')
                                            ->where('basicoil_id', $boRec->basicoil_id)
                                            ->where('recipe_id', $recipe->id)
                                            ->select('basicoils.*', 'amount', 'unit')->get();
            }
        }

        $essentialoilRecipes = EssentialoilRecipe::where('recipe_id', $recipe->id)->get();
        if(!is_null($essentialoilRecipes)){
            $essentialoils = [];
            foreach($essentialoilRecipes as $eoRec){
                $essentialoils[] = Essentialoil::join('essentialoil_recipes', 'essentialoil_id', '=', 'essentialoils.id')
                                                ->where('essentialoil_id', $eoRec->essentialoil_id)
                                                ->where('recipe_id', $recipe->id)
                                                ->select('essentialoils.*', 'amount', 'unit')->get();
            }
        }

        return view('admin.recipes.show', compact('recipe', 'components', 'basicoils', 'essentialoils'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {   
        $componentsList = Component::all()->sortBy('name');
        $components = Component::select('components.*', 'amount', 'unit')
                                ->leftjoin('component_recipes', 'components.id', '=', 'component_id')
                                ->where('recipe_id', $recipe->id)
                                ->orderBy('name')->get();
        // dd($components);
        $basicoilsList = Basicoil::all()->sortBy('name');
        $basicoils = Basicoil::join('basicoil_recipes', 'basicoil_id', '=', 'basicoils.id')
                                ->where('recipe_id', $recipe->id)
                                ->select('basicoils.*', 'amount', 'unit')->orderBy('name')->get();

        $essentialoilsList = Essentialoil::all()->sortBy('name_english');
        $essentialoils = Essentialoil::join('essentialoil_recipes', 'essentialoil_id', '=', 'essentialoils.id')
                                ->where('recipe_id', $recipe->id)
                                ->select('essentialoils.*', 'amount', 'unit')->orderBy('name_english')->get();

        //$components = Component::all()->sortBy('name');

        return view('admin.recipes.edit', compact('recipe', 'essentialoils', 'basicoils', 'components', 'componentsList', 'basicoilsList', 'essentialoilsList'));
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

        header('Content-Type: application/json; charset = utf-8');

        if(strtolower($_SERVER['REQUEST_METHOD']) == 'put'){

            $data = [
                'name' => $request->recipeName,
                'description' => $request->recipeDescription,
                'annotation' => $request->recipeAnnotation,
            ];

            $recipe = Recipe::find($request->recipeId);
            $recipe->update($data);

            return response()->json([
                'recipe'=>$recipe,
                
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        ComponentRecipe::where('recipe_id', $recipe->id)->delete();
        BasicoilRecipe::where('recipe_id', $recipe->id)->delete();
        EssentialoilRecipe::where('recipe_id', $recipe->id)->delete();
        $recipe->delete();
        return redirect()->route('admin.recipes.index')->with('success', 'Das Rezept wurde erfolgreich gelöscht!');
    }
}
