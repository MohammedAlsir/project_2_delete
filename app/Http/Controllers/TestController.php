<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function order_Acceptance($id)
    {
        $orders = Order::find($id);
        $orders->status = 2;
        $orders->save();
        return redirect()->route('acceptable');
    }
}