<?php

namespace App\Http\Controllers;

use App\Models\Essentialoil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaygroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $essentialOils = Essentialoil::join('merchants as merch', 'merchant_id', '=', 'merch.id')
                                        ->join('methods as meth', 'method_id', '=', 'meth.id')
                                        ->join('essentialoil_users as essuser', 'essuser.essentialoil_id', '=', 'essentialoils.id')
                                        ->select('essentialoils.*', 'merch.name as merchant_name', 'meth.short_name as method_short_name', 'essuser.count', 'essuser.favourite')
                                        ->where('essuser.user_id', Auth::user()->id)->orderBy('name_english')->get();

        return view('user.playground.index', compact('essentialOils'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
