<?php

namespace App\Traits;

trait ApiMessage
{
    /**
        == دالة إرجاع رسالة
        ==
        == $status        =>    الحالة (true Or false)
        == $message       =>    الرسالة
        == $status_code   =>    رقم حالة الخطأ
        ==
     */
    public function returnMessage($status, $message, $status_code)
    {
        return response()->json([
            'status'      => $status,
            'message'     => $message,
        ], $status_code);
    }


    /**
        == دالة إرجاع البيانات
        ==
        == $status        =>    الحالة (true Or false)
        == $message       =>    الرسالة
        == $status_code   =>    رقم حالة الخطأ
        ==
     */
    public function returnData($key, $value, $token = "", $message = "", $status_code = "200")
    {
        return response()->json([
            'status'    => true,
            'message'   => $message,
            'token'     => $token,
            $key        => $value,
        ], $status_code);
    }
}
