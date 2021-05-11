<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charge;
use App\Models\Recharge;
use App\Services\Recharge as Topup;

class PaymentController extends Controller
{
    public function __construct()
    {
        // 
    }

    public function spresponse(Request $request)
    {

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
            $charge->save();

            $recharge = Recharge::where('tx_id', '=', $request->tx_id)->first();

            $result = Topup::operator($recharge->operator)
                ->mobile($recharge->mobile_number)
                ->amount($recharge->amount)
                ->order_number($recharge->id)
                ->account_type($recharge->account_type)
                ->recharge();

            if (isset($result['status'])) {
                if ($result['status'] == "true") {
                    $recharge->status = 'Successful';
                    $recharge->order_id = $result['order_id'];
                    $recharge->save();
                    echo "Recharge Successful";
                } else {
                    echo "Recharge Failed";
                }
            } else {
                echo "Recharge Failed";
            }
        } else {
            return redirect(route('home'));
        }
    }
}
