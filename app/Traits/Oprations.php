<?php

namespace App\Traits;

trait Oprations
{

    /**
     * دالة عرض  العناصر
     *
     * $model      =>  المودل
     * $pagePath   =>  مسار الصفحة المطلوب الذهاب اليها
     * $orderBy    => طريقة ترتيب العناصر (افتراضي DESC)
     * $index      =>   الرقم المتسلسل في جدول عرض العناصر افتراضي يبدا من 1
     *
     */
    public function index_data($model, $pagePath, $orderBy = 'DESC', $index = 1)
    {
        $collection = $model::orderBy('id', $orderBy)->get();
        return view($pagePath, compact('collection', 'index'));
    }

    /**
     * دالة فتح صفحة
     *
     * $pagePath   =>  مسار الصفحة المطلوب الذهاب اليها
     *
     */
    public function create_date($pagePath)
    {
        return view($pagePath);
    }


    /**
     * دالة فتح صفحة مع جلب بيانات مودل واحد
     *
     * $pagePath   =>  مسار الصفحة المطلوب الذهاب اليها
     * $model      =>  المودل
     *
     */
    public function create_date_with_model($pagePath, $model)
    {
        $collection = $model::orderBy('id', 'DESC')->get();
        return view($pagePath, compact('collection'));
    }


    /**
     * دالة إضافة عنصر جديد
     *
     * $model       =>  المودل
     * $request     =>  البيانات المرسلة
     * $route       => الراوت الذي سيرجع اليه بعد الحذف
     * $toastMsg    =>   الرسالة الراجعة
     * $typeMsg     =>   نوع الرسالة الراجعة  (افتراضي success)
     *
     */
    public function store_data($model, $request, $route, $toastMsg = 'تم الاضافة بنجاح', $typeMsg = 'success')
    {
        if ($model::create($request->all())) {
            toast($toastMsg, $typeMsg);
            return redirect()->route($route);
        }
    }

    /**
     * دالة فتح صفحة التعديل للعنصر المطلوب
     *
     * $model       =>  المودل
     * $id          => رقم العنصر
     * $pagePath    => مسار الصفحة المطلوب الذهاب اليها
     *
     */
    public function edit_data($model, $id, $pagePath)
    {
        $item = $model::find($id);
        return view($pagePath, compact('item'));
    }


    /**
     * دالة فتح صفحة التعديل للعنصر المطلوب مع جلب بيانات مودل واحد
     *
     * $model           =>  المودل
     * $id              => رقم العنصر
     * $pagePath        => مسار الصفحة المطلوب الذهاب اليها
     * $model_select    => المودل الاضافي --- غالبا يستخدم للستة
     *
     */
    public function edit_data_with_model($model, $id, $model_select, $pagePath)
    {
        $item = $model::find($id);
        $collection = $model_select::orderBy('id', 'DESC')->get();
        return view($pagePath, compact('item', 'collection'));
    }

    /**
     * دالة تعديل بيانات العنصر المطلوب
     *
     * $model       =>  المودل
     * $request     =>  البيانات المرسلة
     * $id          => رقم العنصر
     * $route       => الراوت الذي سيرجع اليه بعد الحذف
     * $toastMsg    =>   الرسالة الراجعة
     * $typeMsg     =>   نوع الرسالة الراجعة  (افتراضي success)
     *
     */
    public function update_data($model, $request, $id, $route, $toastMsg = 'تم التعديل بنجاح', $typeMsg = 'success')
    {
        $item = $model::find($id);
        if ($item) {
            if ($request->password == null) {
                $item->update($request->except('password'));
            } elseif ($request->password != null) {
                $item->update($request->all());
            }

            toast($toastMsg, $typeMsg);
            return redirect()->route($route);
        }
    }



    /**
     * دالة لحذف العنصر المطلوب
     *
     * $model       =>  المودل
     * $id          => رقم العنصر
     * $route       => الراوت الذي سيرجع اليه بعد الحذف
     * $toastMsg    =>   الرسالة الراجعة
     * $typeMsg     =>   نوع الرسالة الراجعة  (افتراضي success)
     *
     */
    public function delete_data($model, $id, $route, $toastMsg = 'تم الحذف بنجاح', $typeMsg = 'success')
    {
        $item = $model::find($id);
        if ($item) {
            $item->delete();
            toast($toastMsg, $typeMsg);
            return redirect()->route($route);
        }
    }
}
