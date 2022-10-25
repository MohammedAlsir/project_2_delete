<?php

namespace App\Http\Controllers;

use App\Models\Pharma;
use App\Models\Pharmacy;
use App\Models\User;
use App\Traits\Oprations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PharmacyController extends Controller
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
        $collection = Pharmacy::where('pharma_id', $pharma_id->id)->orderBy('id', 'desc')->get();
        $index = 1;
        return view('pharmacy.index', compact('collection', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->create_date('Pharmacy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = '3';
        $user->save();


        $pharma_id = Pharma::where('user_id', Auth::user()->id)->first();
        $pharma = new Pharmacy();
        $pharma->name = $request->name;
        $pharma->code = $request->code;
        $pharma->user_id = $user->id;
        $pharma->pharma_id = $pharma_id->id;
        $pharma->save();

        toast('تم الاضافة بنجاح', 'success');
        return redirect()->route('pharmacy.index');
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
        return $this->edit_data(Pharmacy::class, $id, 'Pharmacy.edit');
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
        $pharmacy =  Pharmacy::find($id);
        $pharmacy->name = $request->name;
        $pharmacy->code = $request->code;
        // $pharma->user_id = $user->id;

        $user =  User::find($pharmacy->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->save();
        $pharmacy->save();

        toast('تم التعديل بنجاح', 'success');
        return redirect()->route('pharmacy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pharmacy =  Pharmacy::find($id);
        $pharmacy->delete();

        $user =  User::find($pharmacy->user_id);
        $user->delete();

        toast('تم الحذف بنجاح', 'success');
        return redirect()->route('pharmacy.index');
    }
}
