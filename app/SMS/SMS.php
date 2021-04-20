<?php

namespace App\SMS;

class SMS
{

    private static $to;
    private static $from;
    private static $message;

    public static function to($value)
    {
        self::$to = $value;
        return new static();
    }

    public static function from($value = "")
    {
        self::$from = $value;
        return new static();
    }

    public static function send($value)
    {
        self::$message = $value;
        return "SMS " . self::$message . " sent to " . self::$to . " Successfully from " . self::$from;
    }
}
