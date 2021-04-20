<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SMS\OTP as SMSOTP;
use App\Models\Otp;
use App\Models\User;

class OTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $result = SMSOTP::to("sankar bala")->from("me")->send("Welcome");

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "api create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (filter_var($request['contact'], FILTER_VALIDATE_EMAIL)) {

            $request->validate([
                'contact' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'exists:users,email'
                ]

            ]);
            $user_id = User::where('email', $request['contact'])->first()->id;
        } else {
            $request->validate([
                'contact' => [
                    'required',
                    'string',
                    'numeric',
                    'regex: /(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/',
                ]
            ]);
            // $user_id = User::where('phone', $request['contact'])->first()->id;
        }


        $otp = new OTP;
        $otp->user_id = $user_id ?? 0;
        $otp->otp = rand(1000, 9999);
        $otp->ip_address = $request->ip();
        $otp->save();


        return response()->json(['message' => 'OTP successfully sent to your contact']);
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
