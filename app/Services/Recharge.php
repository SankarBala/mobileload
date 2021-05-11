<?php

namespace App\Services;

use Illuminate\Support\Facades\Request;

class Recharge

{

    private static $mobile;
    private static $amount;
    private static $account_type;
    private static $order_number;
    private static $operator;



    public function __construct()
    {
        //
    }


    public static function mobile($value)
    {
        self::$mobile = $value;
        return new static();
    }
    public static function amount($value)
    {
        self::$amount = $value;
        return new static();
    }
    public static function account_type($value)
    {
        self::$account_type = $value;
        return new static();
    }
    public static function order_number($value)
    {
        self::$order_number = $value;
        return new static();
    }
    public static function operator($value)
    {
        self::$operator = $value;
        return new static();
    }


    public static function recharge()
    {

        $data = array(
            'username' =>  env('TOP_UP_USERNAME'),
            'password' =>  env('TOP_UP_PASSWORD'),
            'pin' => env('TOP_UP_PIN'),
            'operator' => self::$operator,
            'mobile' => self::$mobile,
            'account_type' => self::$account_type,
            'amount' => self::$amount,
            'order_number' => self::$order_number
        );

        $url = 'http://bdsmartpay.com/sms/topupapi.php';

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $result = (array)json_decode(base64_decode($response));

        return $result;
        
    }


    public static function balanceCheck()
    {

        $data = array(
            'username' =>  env('TOP_UP_USERNAME'),
            'password' =>  env('TOP_UP_PASSWORD'),
            'pin' => env('TOP_UP_PIN'),
            'order_number' => '25412525'
        );


        $url = 'http://bdsmartpay.com/sms/topupbalanceapi.php';
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $result = (array)json_decode(base64_decode($response));


        // $response = array(
        //     "balance" => "$balance",
        //     "error_code" => 116,
        //     "description" => "Balance Check Successful "
        // );

        print_r($result);
    }



    public static function checkStatus()
    {

        $data = array(
            'username' =>  env('TOP_UP_USERNAME'),
            'password' =>  env('TOP_UP_PASSWORD'),
            'pin' => env('TOP_UP_PIN'),
            'order_number' => self::$order_number
        );

        $url = 'http://bdsmartpay.com/sms/topupstatusapi.php';

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $result = (array)json_decode(base64_decode($response));


        // $response = array(
        //     "status" => "true",
        //     "error_code" => 109,
        //     "description" => " Topup Successful",
        //     "order_number" => "$order_number",
        //     "order_id" => "$order_id"
        // );


        print_r($result);
    }
}



/*
Operator Name Operator Code 

Grameenphone GP
Grameenphone Skitto GP ST
Banglalink BL
Robi RB
Airtel AT
Teletalk TT
*/

/*
Code Description

109 Topup Successful
101 Topup Failed
102 Insufficient Balance
103 Authentication Failed
115 Your Input Parameter is Incorrect
116 Balance Check Successful
*/
