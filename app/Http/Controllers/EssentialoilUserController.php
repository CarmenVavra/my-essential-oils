<?php

namespace App\Http\Controllers;

use App\Models\Applicationscope;
use App\Models\Attention;
use App\Models\Essentialoil;
use App\Models\EssentialoilUser;
use App\Models\Fragrancenote;
use App\Models\Incredient;
use App\Models\Mentaleffect;
use App\Models\Merchant;
use App\Models\Method;
use App\Models\Physicaleffect;
use App\Models\Plantpart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            if(isset($request->essentialoil_name) && isset($request->essentialoil_merchant)){
                $merchant = Merchant::where('name', $request->essentialoil_merchant)->first();
                $essentialoil = Essentialoil::where('name_english', $request->essentialoil_name)
                                            ->where('merchant_id', $merchant->id)->first();
                $data = [
                    'essentialoil_id' => $essentialoil->id,
                    'user_id' => Auth::user()->id,
                    'count' => $request->saveCount,
                ];
                $error = '';
                $essentialoilUser = EssentialoilUser::where('essentialoil_id', $essentialoil->id)
                                                    ->where('user_id', Auth::user()->id)->first();
                if(null === $essentialoilUser){
                    EssentialoilUser::create($data);
                }else{
                    $count = $essentialoilUser->count + $request->saveCount;
                    $essentialoilUser->update(['count' => $count]);
                }
            }



            return response()->json([
                'respone'=>$request->saveCount,
                'essname' => $request->essentialoil_name,
                'essmerchant' => $request->essentialoil_merchant,
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
        header('Content-Type: application/json; charset = utf-8');

        if(strtolower($_SERVER['REQUEST_METHOD']) == 'put'){

            $merchant = Merchant::where('name', $request->essentialoil_merchant)->first();
            $essentialoil = Essentialoil::where('name_english', $request->essentialoil_name)
                                        ->where('merchant_id', $merchant->id)->first();

            $essentialoilUser = EssentialoilUser::where('essentialoil_id', $essentialoil->id)
                                                ->where('user_id', Auth::user()->id)->first();

            $favourite = $essentialoilUser->favourite ? false : true; 
            $essentialoilUser->update(['favourite' => $favourite]);


            return response()->json([
                'response'=>$favourite,
                
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EssentialoilUser  $essentialoilUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Essentialoil $essentialoil)
    {
        //dd($essentialoil);
        $essentialoilUser = EssentialoilUser::where('essentialoil_id', $essentialoil->id)
                                            ->where('user_id', Auth::user()->id)->first();
        // dd($essentialoilUser);  
        if(null !== $essentialoilUser){
            $essentialoilUser->delete();
        }                                  
        return redirect()->route('user.playground.index')->with('success', 'Die Verbindung wurde erfolgreich gelöscht!');
    }
}
