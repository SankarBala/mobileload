<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\SMS\SMS;
use App\Mail\OTP as OTPMail;
use App\Models\Otp;
use App\Models\User;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\Auth;

class OTPController extends Controller
{

    public function generator(Request $request)
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
            $connection = "email";
        } else {


            $request->validate([
                'contact' => [
                    'required',
                    'numeric',
                    'regex: /(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/',

                ]
            ]);

            return response()->json(['message' => 'Mobile no is not acceptable yet'], 501);

            $phone = $request['contact'];
            if (strlen($phone) == 11) {
                $phone = '88' . $phone;
            }
            $phone = substr($phone, -13);

            $user_id = Profile::where('phone', $phone)->first();

            if ($user_id) {
                $user_id = Profile::where('phone', $phone)->first()->user_id;
                // $connection = "phone";
            } else {
                return response()->json(['message' => 'Phone number not found.'], 404);
            }
        }

        $otp = OTP::where('user_id', $user_id)->first() ?? new OTP;
        $otp->user_id = $user_id;
        $otp->otp = rand(1000, 9999);
        $otp->ip_address = $request->ip();
        $otp->otpToken = Str::random(40);
        $otp->valid_till = Carbon::now()->addMinutes(5);
        $otp->save();

        if ($connection == 'email') {
            Mail::to("sankarbala@gmail.com")->send(new OTPMail($otp));
        } else {
            SMS::to($request['contact'])->from(env('APP_NAME'))->send("$otp->otp");
        }

        return response()->json(['message' => 'OTP successfully sent to your contact', 'otpToken' => $otp->otpToken]);
    }







    public function verify(Request $request)
    {

        $request->validate([
            'otp' => [
                'required',
                'regex: /^(\d){4}$/',

            ]
        ]);

        $otp = OTP::where('otpToken', $request->otpToken)->where('otp', $request->otp)->where('ip_address', $request->ip())->first();

        if ($otp) {
            return response()->json(['user_id' => $otp->user_id, 'otpToken' => $otp->otpToken]);
        } else {
            return response()->json(['message' => 'The otp you entered is invalid.'], 403);
        }
    }






    public function changePassword(Request $request)
    {

        $request->validate([
            'password' => [
                'required',
                'string',
                'confirmed'

            ],
            'otp' => [
                'required',
                'numeric',
                'exists:otps,otp'
            ],
            'otpToken' => [
                'required',
                'string',
                'exists:otps,otpToken'
            ],

        ]);


        $otp = OTP::where('otpToken', $request->otpToken)->where('otp', $request->otp)->where('ip_address', $request->ip())->first();


        if ($otp) {
            $user_id = $otp->user_id;

            $user = User::find($user_id);
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json(['message' => $user->email]);
        } else {
            return response()->json(['message' => 'Something wrong in server'], 500);
        }
    }
}
