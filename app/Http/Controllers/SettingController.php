<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    // مسار تخزين الشعار 
    private $uploadPath = "uploads/setting/";

    public function setting()
    {
        $setting = Setting::find(1);
        return view('setting.setting', compact('setting'));
    }

    public function setting_store(Request $request)
    {
        $setting = Setting::find(1);
        //Insert
        $setting->name = $request->name;
        $setting->email = $request->email;
        $setting->phone = $request->phone;

        // حفظ الشعار 
        $formFile = "photo";
        $fileFinalName = "";
        if ($request->$formFile != "") {
            // Delete file if there is a new one
            if ($setting->$formFile != "") {
                File::delete($this->uploadPath . $setting->$formFile);
            }
            $fileFinalName = time() . rand(
                1111,
                9999
            ) . '.' . $request->file($formFile)->getClientOriginalExtension();
            $path = $this->uploadPath;
            $request->file($formFile)->move($path, $fileFinalName);
        }


        if ($fileFinalName != "") {
            $setting->photo = $fileFinalName;
        }


        $setting->save();

        toast('تم تعديل البيانات بنجاح', 'success');



        return Redirect::back();
    }
}