<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use smasif\ShurjopayLaravelPackage\ShurjopayService;

class ProfileController extends Controller
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
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function changePhoto(Request $request)
    {

        // $request->validate([
        //     'photo' => 'required|image|max:2048',
        // ]);


        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();


        $path = $request->file('photo')->store('public/profiles');

        $profile->photo = $path;
        $profile->save();

        return back();
    }

    public function recharge(Request $request){
        
         
        $shurjopay_service = new ShurjopayService();
        $tx_id = $shurjopay_service->generateTxId();
        $success_route = route('clientRechargeResponse');
        $shurjopay_service->sendPayment($request->amount, $success_route);


    }

    public function rechargeResponse(Request $request){
        if ($request->status == 'Success') {
            $charge = new Charge();
            $charge->tx_id = $request->tx_id;
            $charge->msg = $request->msg;
            $charge->bank_tx_id = $request->bank_tx_id;
            $charge->amount = $request->amount;
            $charge->sp_code = $request->sp_code;
            $charge->sp_code_des = $request->sp_code_des;
            $charge->sp_payment_option = $request->sp_payment_option;
            $charge->user_agent =  $request->server('HTTP_USER_AGENT');
            $charge->ip_address =  $request->ip();
            $charge->paid_by =  Auth::id();
            $charge->save();

            $profile = Profile::where('user_id', '=', Auth::id())->first();
            $profile->balance += $request->amount;
            $profile->save();

            return redirect(route('client.profile'));

        
        } else {
            return "Payment Unsuccessful";
        }
    }
}
