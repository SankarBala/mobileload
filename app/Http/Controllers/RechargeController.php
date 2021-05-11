<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Recharge;
use smasif\ShurjopayLaravelPackage\ShurjopayService;

class RechargeController extends Controller
{

    public function __construct()
    {
        //
    }

    public function topUp(Request $request)
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

        
        $recharge = new Recharge();

        $recharge->mobile_number=$request->mobileNumber;
        $recharge->operator=$request->operator;
        $recharge->account_type=$request->accountType;
        $recharge->amount=$request->amount;
        $recharge->status="Pending";

        $shurjopay_service = new ShurjopayService();
        $tx_id = $shurjopay_service->generateTxId();

        $recharge->tx_id=$tx_id;
        $recharge->save();

        $success_route = route('payment');
        $shurjopay_service->sendPayment($recharge->amount, $success_route);
    
      

        // Recharge::balanceCheck();

        // Recharge::checkStatus();


    }
}
