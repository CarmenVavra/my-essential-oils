<?php

use App\Http\Controllers\ApplicationscopeController;
use App\Http\Controllers\AttentionController;
use App\Http\Controllers\BasicoilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EssentialoilController;
use App\Http\Controllers\FragrancenoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncredientController;
use App\Http\Controllers\MentaleffectController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\PhysicaleffectController;
use App\Http\Controllers\PlantpartController;
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
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/applicationscopes', [ApplicationscopeController::class, 'index'])->name('admin.applicationscopes.index');
Route::get('/applicationscope/create', [ApplicationscopeController::class, 'create'])->name('admin.applicationscope.create');
Route::post('/applicationscope', [ApplicationscopeController::class, 'store'])->name('admin.applicationscope.store');
Route::get('/applicationscope/{applicationscope}/edit', [ApplicationscopeController::class, 'edit'])->name('admin.applicationscope.edit');
Route::put('/applicationscope/{applicationscope}', [ApplicationscopeController::class, 'update'])->name('admin.applicationscope.update');
Route::delete('/applicationscope/{applicationscope}', [ApplicationscopeController::class, 'destroy'])->name('admin.applicationscope.delete');

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

/* User Section */
Route::get('/user/essentialoils', [EssentialoilController::class, 'index'])->name('user.essentialoils.index');
/* Route::get('/user/essentialoil/create', [EssentialoilController::class, 'create'])->name('user.essentialoil.create');
Route::post('/user/essentialoil', [EssentialoilController::class, 'store'])->name('user.essentialoil.store'); */
Route::get('/user/essentialoil/{essentialoil}', [EssentialoilController::class, 'show'])->name('user.essentialoil.show');
/* Route::get('/user/essentialoil/{essentialoil}/edit', [EssentialoilController::class, 'edit'])->name('user.essentialoil.edit');
Route::put('/user/essentialoil/{essentialoil}', [EssentialoilController::class, 'update'])->name('user.essentialoil.update');
Route::delete('/user/essentialoil/{essentialoil}', [EssentialoilController::class, 'destroy'])->name('user.essentialoil.delete'); */

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
Route::get('/mentaleffect/{mentaleffect}', [MentaleffectController::class, 'show'])->name('user.mentaleffect.show');
/* Route::get('/user/mentaleffect/{mentaleffect}/edit', [MentaleffectController::class, 'edit'])->name('user.mentaleffect.edit');
Route::put('/user/mentaleffect/{mentaleffect}', [MentaleffectController::class, 'update'])->name('user.mentaleffect.update');
Route::delete('/user/mentaleffect/{mentaleffect}', [MentaleffectController::class, 'destroy'])->name('user.mentaleffect.delete'); */


/* User END-Section */