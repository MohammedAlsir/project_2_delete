<?php

namespace App\Http\Controllers;

use App\Http\Requests\PharmaRequest;
use App\Models\Pharma;
use App\Models\User;
use App\Traits\Oprations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PharmaController extends Controller
{
    use  Oprations;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->index_data(Pharma::class, 'Pharma.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->create_date('Pharma.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PharmaRequest $request)
    {


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = '2';
        $user->save();

        $pharma = new Pharma();
        $pharma->name = $request->name;
        $pharma->addres = $request->addres;
        $pharma->user_id = $user->id;
        $pharma->save();

        toast('تم الاضافة بنجاح', 'success');
        return redirect()->route('pharma.index');
        // return $this->store_data(Pharma::class, $request, 'pharma.index');
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
        return $this->edit_data(Pharma::class, $id, 'Pharma.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PharmaRequest $request, $id)
    {
        // return $this->update_data(Pharma::class, $request, $id, 'pharma.index');
        $pharma =  Pharma::find($id);
        $pharma->name = $request->name;
        $pharma->addres = $request->addres;
        // $pharma->user_id = $user->id;

        $user =  User::find($pharma->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->save();
        $pharma->save();




        toast('تم التعديل بنجاح', 'success');
        return redirect()->route('pharma.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pharma =  Pharma::find($id);
        $pharma->delete();

        $user =  User::find($pharma->user_id);
        $user->delete();

        toast('تم الحذف بنجاح', 'success');
        return redirect()->route('pharma.index');
        // return $this->delete_data(Pharma::class, $id, 'pharma.index');
    }
}
