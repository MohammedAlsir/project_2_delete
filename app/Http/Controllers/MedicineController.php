<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Pharma;
use App\Traits\Oprations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
    use  Oprations;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharma_id = Pharma::where('user_id', Auth::user()->id)->first();
        $collection = Medicine::where('pharma_id', $pharma_id->id)->orderBy('id', 'desc')->get();
        $index = 1;
        return view('medicine.index', compact('collection', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->create_date('medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pharma_id = Pharma::where('user_id', Auth::user()->id)->first();

        $medicine = new Medicine();
        $medicine->name = $request->name;
        $medicine->company = $request->company;
        $medicine->price = $request->price;
        $medicine->expaire_date = $request->expaire_date;
        $medicine->amount = $request->amount;

        $medicine->pharma_id = $pharma_id->id;
        $medicine->save();

        toast('تم الاضافة بنجاح', 'success');
        return redirect()->route('medicine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->edit_data(Medicine::class, $id, 'medicine.edit');
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
        $medicine =  Medicine::find($id);
        $medicine->name = $request->name;
        $medicine->company = $request->company;
        $medicine->price = $request->price;

        $medicine->expaire_date = $request->expaire_date;
        $medicine->amount = $request->amount;


        $medicine->save();

        toast('تم التعديل بنجاح', 'success');
        return redirect()->route('medicine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicine =  Medicine::find($id);
        $medicine->delete();
        toast('تم الحذف بنجاح', 'success');
        return redirect()->route('medicine.index');
    }
}