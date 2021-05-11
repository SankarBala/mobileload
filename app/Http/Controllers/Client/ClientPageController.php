<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Recharge;
use App\Models\Profile;
use smasif\ShurjopayLaravelPackage\ShurjopayService;
use App\Services\Recharge as Topup;
use Illuminate\Support\Facades\Session;

class ClientPageController extends Controller
{


    public function __construct()
    {
    }

    public function home()
    {
        $user = Auth::user();

        return view('client.index')->withUser($user);
    }

    public function mobile_recharge()
    {

        $user = Auth::user();

        return view('client.mobile')->withUser($user);
    }

    public function recharge(Request $request)
    {

        $request->validate([
            'mobileNumber' => [
                'required',
                'regex: /(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/',

            ],
            'operator' => [
                'required',
                'string',
                Rule::in(['GP', 'BL', 'AT', 'RB', 'TT', 'GP ST']),

            ],
            'amount' => [
                'required',
                'int',
                'min:10',
                'max:1000'
            ]

        ]);


        $user = Auth::user();
        $user->load('profile');


        if ($user->profile->balance >= $request->amount) {


            $recharge = new Recharge();

            $recharge->mobile_number = $request->mobileNumber;
            $recharge->operator = $request->operator;
            $recharge->account_type = $request->accountType;
            $recharge->amount = $request->amount;
            $recharge->status = "Pending";
            $recharge->recharge_by = $user->id;

            $tx_id = new ShurjopayService();
            $recharge->tx_id =  $tx_id->generateTxId();

            $recharge->save();


            $result = Topup::operator($recharge->operator)
                ->mobile($recharge->mobile_number)
                ->amount($recharge->amount)
                ->order_number($recharge->id)
                ->account_type($recharge->account_type)
                ->recharge();

            if (isset($result['status'])) {
                if ($result['status'] == "true") {
                    $profile = Profile::where('user_id', Auth::id())->first();
                    $profile->balance = $profile->balance - $request->amount + $request->amount * 0.018;
                    $profile->save();
                    $recharge->status = 'Successful';
                    $recharge->order_id = $result['order_id'];
                    $recharge->save();
                    Session::flash('message', 'Recharge Successful');
                } else {
                    Session::flash('message', 'Recharge Failed');
                }
            } else {
                Session::flash('message', 'Recharge Failed');
            }
        } else {
            Session::flash('message', 'Insufficient balance');
        }
        return redirect(route('client.mobile_recharge'));
    }


    public function sms()
    {

        $user = Auth::user();

        return view('client.sms')->withUser($user);
    }
    public function profile()
    {

        $user = Auth::user();

        return view('client.profile')->withUser($user);
    }
    public function setting()
    {

        $user = Auth::user();

        return view('client.setting')->withUser($user);
    }
}
