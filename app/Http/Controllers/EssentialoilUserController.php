<?php

namespace App\Http\Controllers;

use App\Models\Applicationscope;
use App\Models\Attention;
use App\Models\EssentialoilUser;
use App\Models\Fragrancenote;
use App\Models\Incredient;
use App\Models\Mentaleffect;
use App\Models\Merchant;
use App\Models\Method;
use App\Models\Physicaleffect;
use App\Models\Plantpart;
use Illuminate\Http\Request;

class EssentialoilUserController extends Controller
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
        $data = [
            'merchants' => Merchant::all(),
            'methods' => Method::all(),
            'plantparts' => Plantpart::all(),
            'attentions' => Attention::all(),
            'incredients' => Incredient::all(),
            'fragrancenotes' => Fragrancenote::all(),
            'applicationscopes' => Applicationscope::all(),
            'physicaleffects' => Physicaleffect::all(),
            'mentaleffects' => Mentaleffect::all(),
        ];

        return view('user.essentialoils.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // anzahl gehört noch hinzugefügt und zwar überall db, view, model, controller
        header('Content-Type: application/json; charset = utf-8');

        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
            



            return response()->json([
                'respone'=>'success',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EssentialoilUser  $essentialoilUser
     * @return \Illuminate\Http\Response
     */
    public function show(EssentialoilUser $essentialoilUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EssentialoilUser  $essentialoilUser
     * @return \Illuminate\Http\Response
     */
    public function edit(EssentialoilUser $essentialoilUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EssentialoilUser  $essentialoilUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EssentialoilUser $essentialoilUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EssentialoilUser  $essentialoilUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(EssentialoilUser $essentialoilUser)
    {
        //
    }
}
