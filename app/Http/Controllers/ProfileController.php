<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
// use RealRashid\SweetAlert\Facades\Alert;
// or
// use Alert;
// 
class ProfileController extends Controller
{
    // مسار تخزين الصور الشخصية 
    private $uploadPath = "uploads/users/";

    // عرض صفحة البروفايل
    public function profil()
    {
        $user = User::find(Auth::user()->id);
        return view('Profile.profile', compact('user'));
    }

    public function profile_store(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $this->validate($request, array(
            'name'        => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user)],
            'password'        => '',

        ));

        //Insert


        $user->name = $request->name;
        $user->email = $request->email;
        // هل تم ادخال كلمة مرور جديدة ام لا
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // حفظ الصورة الشخصية 
        $formFile = "photo";
        $fileFinalName = "";
        if ($request->$formFile != "") {
            // Delete file if there is a new one
            if ($user->$formFile != "") {
                File::delete($this->uploadPath . $user->$formFile);
            }
            $fileFinalName = time() . rand(
                1111,
                9999
            ) . '.' . $request->file($formFile)->getClientOriginalExtension();
            $path = $this->uploadPath;
            $request->file($formFile)->move($path, $fileFinalName);
        }


        if ($fileFinalName != "") {
            $user->photo = $fileFinalName;
        }

        $user->save();


        toast('تم تعديل البيانات بنجاح', 'success');

        return Redirect::back();
    }
}