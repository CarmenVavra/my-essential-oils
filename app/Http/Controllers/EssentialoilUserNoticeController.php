<?php

namespace App\Http\Controllers;

use App\Models\Essentialoil;
use App\Models\EssentialoilUserNotice;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EssentialoilUserNoticeController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EssentialoilUserNotice  $essentialoilUserNotice
     * @return \Illuminate\Http\Response
     */
    public function show(EssentialoilUserNotice $essentialoilUserNotice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EssentialoilUserNotice  $essentialoilUserNotice
     * @return \Illuminate\Http\Response
     */
    public function edit(EssentialoilUserNotice $essentialoilUserNotice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EssentialoilUserNotice  $essentialoilUserNotice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EssentialoilUserNotice $essentialoilUserNotice)
    {
        header('Content-Type: application/json; charset = utf-8');

        if(strtolower($_SERVER['REQUEST_METHOD']) == 'put'){
            
            $merchant = Merchant::where('name', $request->essentialoil_merchant)->first();
            $essentialoil = Essentialoil::where('name_english', $request->essentialoil_name)
                                        ->where('merchant_id', $merchant->id)->first();

            $essentialoilUserNotice = EssentialoilUserNotice::where('essentialoil_id', $essentialoil->id)
                                                            ->where('user_id', Auth::user()->id)->first();

            if(null === $essentialoilUserNotice){
                $essentialoilUserNotice = EssentialoilUserNotice::create([
                                                                    'essentialoil_id' => $essentialoil->id,
                                                                    'user_id' => Auth::user()->id,
                                                                    'notice' => 1,
                                                                ]);
            }else{
                $notice = $essentialoilUserNotice->notice ? 0 : 1; 
                $essentialoilUserNotice->update(['notice' => $notice]);
            }

            return response()->json([
                'essentialoilUserNotice'=>$essentialoilUserNotice,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EssentialoilUserNotice  $essentialoilUserNotice
     * @return \Illuminate\Http\Response
     */
    public function destroy(EssentialoilUserNotice $essentialoilUserNotice)
    {
        //
    }
}
