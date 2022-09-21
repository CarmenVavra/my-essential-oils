<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationscopeController;
use App\Http\Controllers\AttentionController;
use App\Http\Controllers\BasicoilController;
use App\Http\Controllers\BasicoilRecipeController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ComponentRecipeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EssentialoilController;
use App\Http\Controllers\EssentialoilRecipeController;
use App\Http\Controllers\EssentialoilUserController;
use App\Http\Controllers\EssentialoilUserNoticeController;
use App\Http\Controllers\FragrancenoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncredientController;
use App\Http\Controllers\MentaleffectController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\PhysicaleffectController;
use App\Http\Controllers\PlantpartController;
use App\Http\Controllers\PlaygroundController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ScentdirectionController;
use App\Http\Controllers\UsagetypeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


/* Admin-Section */
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/applicationscopes', [ApplicationscopeController::class, 'index'])->name('admin.applicationscopes.index');
Route::get('/applicationscope/create', [ApplicationscopeController::class, 'create'])->name('admin.applicationscope.create');
Route::post('/applicationscope', [ApplicationscopeController::class, 'store'])->name('admin.applicationscope.store');
Route::get('/applicationscope/{applicationscope}/edit', [ApplicationscopeController::class, 'edit'])->name('admin.applicationscope.edit');
Route::put('/applicationscope/{applicationscope}', [ApplicationscopeController::class, 'update'])->name('admin.applicationscope.update');
Route::delete('/applicationscope/{applicationscope}', [ApplicationscopeController::class, 'destroy'])->name('admin.applicationscope.delete');

Route::get('/applications', [ApplicationController::class, 'index'])->name('admin.applications.index');
Route::get('/application/create', [ApplicationController::class, 'create'])->name('admin.application.create');
Route::post('/application', [ApplicationController::class, 'store'])->name('admin.application.store');
Route::get('/application/{application}/edit', [ApplicationController::class, 'edit'])->name('admin.application.edit');
Route::put('/application/{application}', [ApplicationController::class, 'update'])->name('admin.application.update');
Route::delete('/application/{application}', [ApplicationController::class, 'destroy'])->name('admin.application.delete');

Route::get('/attentions', [AttentionController::class, 'index'])->name('admin.attentions.index');
Route::get('/attention/create', [AttentionController::class, 'create'])->name('admin.attention.create');
Route::post('/attention', [AttentionController::class, 'store'])->name('admin.attention.store');
Route::get('/attention/{attention}/edit', [AttentionController::class, 'edit'])->name('admin.attention.edit');
Route::put('/attention/{attention}', [AttentionController::class, 'update'])->name('admin.attention.update');
Route::delete('/attention/{attention}', [AttentionController::class, 'destroy'])->name('admin.attention.delete');

Route::get('/basicoils', [BasicoilController::class, 'index'])->name('admin.basicoils.index');
Route::get('/basicoil/create', [BasicoilController::class, 'create'])->name('admin.basicoil.create');
Route::post('/basicoil', [BasicoilController::class, 'store'])->name('admin.basicoil.store');
Route::get('/basicoil/{basicoil}/edit', [BasicoilController::class, 'edit'])->name('admin.basicoil.edit');
Route::put('/basicoil/{basicoil}', [BasicoilController::class, 'update'])->name('admin.basicoil.update');
Route::delete('/basicoil/{basicoil}', [BasicoilController::class, 'destroy'])->name('admin.basicoil.delete');

Route::get('/essentialoils', [EssentialoilController::class, 'index'])->name('admin.essentialoils.index');
Route::get('/essentialoil/create', [EssentialoilController::class, 'create'])->name('admin.essentialoil.create');
Route::post('/essentialoil', [EssentialoilController::class, 'store'])->name('admin.essentialoil.store');
Route::get('/essentialoil/{essentialoil}', [EssentialoilController::class, 'show'])->name('admin.essentialoil.show');
Route::get('/essentialoil/{essentialoil}/edit', [EssentialoilController::class, 'edit'])->name('admin.essentialoil.edit');
Route::put('/essentialoil/{essentialoil}', [EssentialoilController::class, 'update'])->name('admin.essentialoil.update');
Route::delete('/essentialoil/{essentialoil}', [EssentialoilController::class, 'destroy'])->name('admin.essentialoil.delete');

Route::get('/fragrancenotes', [FragrancenoteController::class, 'index'])->name('admin.fragrancenotes.index');
Route::get('/fragrancenote/create', [FragrancenoteController::class, 'create'])->name('admin.fragrancenote.create');
Route::post('/fragrancenote', [FragrancenoteController::class, 'store'])->name('admin.fragrancenote.store');
Route::get('/fragrancenote/{fragrancenote}/edit', [FragrancenoteController::class, 'edit'])->name('admin.fragrancenote.edit');
Route::put('/fragrancenote/{fragrancenote}', [FragrancenoteController::class, 'update'])->name('admin.fragrancenote.update');
Route::delete('/fragrancenote/{fragrancenote}', [FragrancenoteController::class, 'destroy'])->name('admin.fragrancenote.delete');

Route::get('/scentdirections', [ScentdirectionController::class, 'index'])->name('admin.scentdirections.index');
Route::get('/scentdirection/create', [ScentdirectionController::class, 'create'])->name('admin.scentdirection.create');
Route::post('/scentdirection', [ScentdirectionController::class, 'store'])->name('admin.scentdirection.store');
Route::get('/scentdirection/{scentdirection}/edit', [ScentdirectionController::class, 'edit'])->name('admin.scentdirection.edit');
Route::put('/scentdirection/{scentdirection}', [ScentdirectionController::class, 'update'])->name('admin.scentdirection.update');
Route::delete('/scentdirection/{scentdirection}', [ScentdirectionController::class, 'destroy'])->name('admin.scentdirection.delete');

Route::get('/incredients', [IncredientController::class, 'index'])->name('admin.incredients.index');
Route::get('/incredient/create', [IncredientController::class, 'create'])->name('admin.incredient.create');
Route::post('/incredient', [IncredientController::class, 'store'])->name('admin.incredient.store');
Route::get('/incredient/{incredient}/edit', [IncredientController::class, 'edit'])->name('admin.incredient.edit');
Route::put('/incredient/{incredient}', [IncredientController::class, 'update'])->name('admin.incredient.update');
Route::delete('/incredient/{incredient}', [IncredientController::class, 'destroy'])->name('admin.incredient.delete');

Route::get('/mentaleffects', [MentaleffectController::class, 'index'])->name('admin.mentaleffects.index');
Route::get('/mentaleffect/create', [MentaleffectController::class, 'create'])->name('admin.mentaleffect.create');
Route::post('/mentaleffect', [MentaleffectController::class, 'store'])->name('admin.mentaleffect.store');
Route::get('/mentaleffect/{mentaleffect}/edit', [MentaleffectController::class, 'edit'])->name('admin.mentaleffect.edit');
Route::put('/mentaleffect/{mentaleffect}', [MentaleffectController::class, 'update'])->name('admin.mentaleffect.update');
Route::delete('/mentaleffect/{mentaleffect}', [MentaleffectController::class, 'destroy'])->name('admin.mentaleffect.delete');

Route::get('/merchants', [MerchantController::class, 'index'])->name('admin.merchants.index');
Route::get('/merchant/create', [MerchantController::class, 'create'])->name('admin.merchant.create');
Route::post('/merchant', [MerchantController::class, 'store'])->name('admin.merchant.store');
Route::get('/merchant/{merchant}/edit', [MerchantController::class, 'edit'])->name('admin.merchant.edit');
Route::put('/merchant/{merchant}', [MerchantController::class, 'update'])->name('admin.merchant.update');
Route::delete('/merchant/{merchant}', [MerchantController::class, 'destroy'])->name('admin.merchant.delete');

Route::get('/methods', [MethodController::class, 'index'])->name('admin.methods.index');
Route::get('/method/create', [MethodController::class, 'create'])->name('admin.method.create');
Route::post('/method', [MethodController::class, 'store'])->name('admin.method.store');
Route::get('/method/{method}/edit', [MethodController::class, 'edit'])->name('admin.method.edit');
Route::put('/method/{method}', [MethodController::class, 'update'])->name('admin.method.update');
Route::delete('/method/{method}', [MethodController::class, 'destroy'])->name('admin.method.delete');

Route::get('/physicaleffects', [PhysicaleffectController::class, 'index'])->name('admin.physicaleffects.index');
Route::get('/physicaleffect/create', [PhysicaleffectController::class, 'create'])->name('admin.physicaleffect.create');
Route::post('/physicaleffect', [PhysicaleffectController::class, 'store'])->name('admin.physicaleffect.store');
Route::get('/physicaleffect/{physicaleffect}/edit', [PhysicaleffectController::class, 'edit'])->name('admin.physicaleffect.edit');
Route::put('/physicaleffect/{physicaleffect}', [PhysicaleffectController::class, 'update'])->name('admin.physicaleffect.update');
Route::delete('/physicaleffect/{physicaleffect}', [PhysicaleffectController::class, 'destroy'])->name('admin.physicaleffect.delete');

Route::get('/plantparts', [PlantpartController::class, 'index'])->name('admin.plantparts.index');
Route::get('/plantpart/create', [PlantpartController::class, 'create'])->name('admin.plantpart.create');
Route::post('/plantpart', [PlantpartController::class, 'store'])->name('admin.plantpart.store');
Route::get('/plantpart/{plantpart}/edit', [PlantpartController::class, 'edit'])->name('admin.plantpart.edit');
Route::put('/plantpart/{plantpart}', [PlantpartController::class, 'update'])->name('admin.plantpart.update');
Route::delete('/plantpart/{plantpart}', [PlantpartController::class, 'destroy'])->name('admin.plantpart.delete');


/* Admin END-Section */
Route::post('/componentrecipe', [ComponentRecipeController::class, 'store'])->name('admin.component.recipe.store');
Route::put('/componentrecipe', [ComponentRecipeController::class, 'update'])->name('admin.component.recipe.update');

Route::post('/basicoilrecipe', [BasicoilRecipeController::class, 'store'])->name('admin.basicoil.recipe.store');
Route::put('/basicoilrecipe', [BasicoilRecipeController::class, 'update'])->name('admin.basicoil.recipe.update');

Route::post('/essentialoilrecipe', [EssentialoilRecipeController::class, 'store'])->name('admin.essentialoil.recipe.store');
Route::put('/essentialoilrecipe', [EssentialoilRecipeController::class, 'update'])->name('admin.essentialoil.recipe.update');
/* User Section */

Route::get('/user/essentialoils', [EssentialoilController::class, 'index'])->name('user.essentialoils.index');
Route::get('/user/essentialoil/create', [EssentialoilUserController::class, 'create'])->name('user.essentialoil.create');
Route::post('/user/essentialoil', [EssentialoilUserController::class, 'store'])->name('user.essentialoil.store');
Route::put('/user/essentialoil', [EssentialoilUserController::class, 'update'])->name('user.essentialoil.update');
Route::delete('/user/essentialoil/{essentialoil}', [EssentialoilUserController::class, 'destroy'])->name('user.essentialoil.delete');
Route::get('/user/essentialoil/{essentialoil}', [EssentialoilController::class, 'show'])->name('user.essentialoil.show');
/* Route::get('/user/essentialoil/{essentialoil}/edit', [EssentialoilController::class, 'edit'])->name('user.essentialoil.edit');
Route::put('/user/essentialoil/{essentialoil}', [EssentialoilController::class, 'update'])->name('user.essentialoil.update');
Route::delete('/user/essentialoil/{essentialoil}', [EssentialoilController::class, 'destroy'])->name('user.essentialoil.delete'); */

Route::put('/user/essentialoil/notice', [EssentialoilUserNoticeController::class, 'update'])->name('user.essentialoil.notice.update');

Route::get('/user/applicationscopes', [ApplicationscopeController::class, 'index'])->name('user.applicationscopes.index');
//Route::get('/user/applicationscope/{applicationscope}', [ApplicationscopeController::class, 'show'])->name('user.applicationscope.show');
/* Route::post('/user/applicationscope', [ApplicationscopeController::class, 'store'])->name('user.applicationscope.store');*/
Route::get('/user/applicationscope/{applicationscope}', [ApplicationscopeController::class, 'show'])->name('user.applicationscope.show');
/*Route::get('/user/applicationscope/{applicationscope}/edit', [ApplicationscopeController::class, 'edit'])->name('user.applicationscope.edit');
Route::put('/user/applicationscope/{applicationscope}', [ApplicationscopeController::class, 'update'])->name('user.applicationscope.update');
Route::delete('/user/applicationscope/{applicationscope}', [ApplicationscopeController::class, 'destroy'])->name('user.applicationscope.delete'); */

Route::get('/user/physicaleffects', [PhysicaleffectController::class, 'index'])->name('user.physicaleffects.index');
//Route::get('/user/physicaleffect/{physicaleffect}', [PhysicaleffectController::class, 'show'])->name('user.physicaleffect.show');
/* Route::post('/user/physicaleffect', [PhysicaleffectController::class, 'store'])->name('user.physicaleffect.store');*/
Route::get('/user/physicaleffect/{physicaleffect}', [PhysicaleffectController::class, 'show'])->name('user.physicaleffect.show');
/*Route::get('/user/physicaleffect/{physicaleffect}/edit', [PhysicaleffectController::class, 'edit'])->name('user.physicaleffect.edit');
Route::put('/user/physicaleffect/{physicaleffect}', [PhysicaleffectController::class, 'update'])->name('user.physicaleffect.update');
Route::delete('/user/physicaleffect/{physicaleffect}', [PhysicaleffectController::class, 'destroy'])->name('user.physicaleffect.delete');
 */

Route::get('/user/mentaleffects', [MentaleffectController::class, 'index'])->name('user.mentaleffects.index');
/* Route::get('/user/mentaleffect/create', [MentaleffectController::class, 'create'])->name('user.mentaleffect.create');
Route::post('/user/mentaleffect', [MentaleffectController::class, 'store'])->name('user.mentaleffect.store'); */
Route::get('/user/mentaleffect/{mentaleffect}', [MentaleffectController::class, 'show'])->name('user.mentaleffect.show');
/* Route::get('/user/mentaleffect/{mentaleffect}/edit', [MentaleffectController::class, 'edit'])->name('user.mentaleffect.edit');
Route::put('/user/mentaleffect/{mentaleffect}', [MentaleffectController::class, 'update'])->name('user.mentaleffect.update');
Route::delete('/user/mentaleffect/{mentaleffect}', [MentaleffectController::class, 'destroy'])->name('user.mentaleffect.delete'); */
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
});

Route::get('/user/recipes', [RecipeController::class, 'index'])->name('user.recipes.index');
Route::get('/user/recipe/{recipe}', [RecipeController::class, 'show'])->name('user.recipe.show');

Route::get('/admin/recipes', [RecipeController::class, 'index'])->name('admin.recipes.index');
Route::get('/admin/recipe/create', [RecipeController::class, 'create'])->name('admin.recipe.create');
Route::post('/admin/recipe', [RecipeController::class, 'store'])->name('admin.recipe.store');
Route::get('/admin/recipe/{recipe}/edit', [RecipeController::class, 'edit'])->name('admin.recipe.edit');
Route::put('/admin/recipe/{recipe}', [RecipeController::class, 'update'])->name('admin.recipe.update');
Route::delete('/admin/recipe/{recipe}', [RecipeController::class, 'destroy'])->name('admin.recipe.delete');

Route::get('/admin/components', [ComponentController::class, 'index'])->name('admin.components.index');
Route::get('/admin/component/create', [ComponentController::class, 'create'])->name('admin.component.create');
Route::post('/admin/component', [ComponentController::class, 'store'])->name('admin.component.store');
Route::get('/admin/component/{component}/edit', [ComponentController::class, 'edit'])->name('admin.component.edit');
Route::put('/admin/component/{component}', [ComponentController::class, 'update'])->name('admin.component.update');
Route::delete('/admin/component/{component}', [ComponentController::class, 'destroy'])->name('admin.component.delete');

Route::get('/user/components', [ComponentController::class, 'index'])->name('user.components.index');
Route::get('/user/component/{component}', [ComponentController::class, 'show'])->name('user.component.show');


Route::get('/user/playground', [PlaygroundController::class, 'index'])->name('user.playground.index');

Route::get('/playground/essentialoils', [EssentialoilController::class, 'index'])->name('playground.essentialoils.index');
Route::get('/playground/create', [EssentialoilController::class, 'create'])->name('playground.essentialoil.create');


Route::get('/user/back', function () {
    return back();
})->name('user.back');
/* User END-Section */