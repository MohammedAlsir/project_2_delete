<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Order;
use App\Models\Pharma;
use Faker\Provider\Medical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = 1;
        $pharma = Pharma::where('user_id', Auth::user()->id)->first();
        $orders = Order::where('pharma_id', $pharma->id)->where('status', '1')->get();
        return view('order.index', compact('orders', 'index'));
    }

    public function acceptable()
    {
        $index = 1;
        $pharma = Pharma::where('user_id', Auth::user()->id)->first();
        $orders = Order::where('pharma_id', $pharma->id)->where('status', '2')->get();
        return view('order.acceptable', compact('orders', 'index'));
    }

    public function rejected()
    {
        $index = 1;
        $pharma = Pharma::where('user_id', Auth::user()->id)->first();
        $orders = Order::where('pharma_id', $pharma->id)->where('status', '3')->get();
        return view('order.rejected', compact('orders', 'index'));
    }

    public function order_Acceptance($id)
    {

        $orders = Order::find($id);
        $medicine = Medicine::find($orders->medicine_id);

        $medicine->amount -= $orders->amount;
        $medicine->save();
        $orders->status = 2;
        $orders->save();
        return redirect()->route('acceptable');
    }

    public function order_reject($id)
    {
        $orders = Order::find($id);
        if ($orders->status != 1) {
            $medicine = Medicine::find($orders->medicine_id);
            $medicine->amount += $orders->amount;
            $medicine->save();
        }
        $orders->status = 3;
        $orders->save();
        return redirect()->route('rejected');
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