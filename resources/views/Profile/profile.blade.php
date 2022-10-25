@extends('layouts.app')
@section('title','الملف الشخصي')

@section('content')

<style>
    
 input{
  padding: 0.25rem 0.5rem;
  font-size: 0.875rem;
  line-height: 1.5;
  border-radius: 0.2rem;
}
</style>
  <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-md-center">
          <!-- left column -->
         <div class="col-md-11">
           
           
          
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">البيانات الشخصية</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('profile.store')}}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="form-group row">
                    <label class="col-sm-2 control-label">الاسم </label>
                    <div class="col-sm-10">
                      <input type="text" value="{{Auth::user()->name}}" class="form-control" name="name" placeholder="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 control-label">اسم المستخدم</label>
                    <div class="col-sm-10">
                      <input type="text"  value="{{Auth::user()->email}}" class="form-control" name="email" placeholder="">
                      <span class="small" style="color: red">هذا الحقل خاص  بعملية تسجيل الدخول </span>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 control-label">كلمة المرور</label>
                    
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="*********">
                            <span class="small" style="color: red">هذا الحقل خاص  بعملية تسجيل الدخول </span>

                    </div>
                  </div>

                    <div class="form-group row">
                        <label class="col-md-2 control-label"></label>
                        <div class="col-md-10">
                            <img style="width: 150px; height: 150px; object-fit: cover;"  src="{{asset('uploads/users/'.Auth::user()->photo)}}" alt="لا يوجد صورة شخصية " srcset="">
                        </div>
                    </div>
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 control-label">الصورة الشخصية</label>
                    
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="photo" >
                            

                    </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-info">تعديل</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
