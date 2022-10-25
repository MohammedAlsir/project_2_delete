@extends('layouts.app')
{{-- @section('title','بيانات القسم') --}}
@section('pharmacy_open','menu-open')
@section('pharmacy','active')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <!-- left column -->
            <div class="col-md-8">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"> تعديل بيانات الصيدلي </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('pharmacy.update',$item->id)}}" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">اسم الصيدلي </label>
                                <div class="col-sm-10">
                                    <input required type="text" value="{{$item->name}}" class="form-control" name="name">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label"> البريد الالكتروني </label>
                                <div class="col-sm-10">
                                    <input required type="email" value="{{$item->email}}" class="form-control" name="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label"> كلمة المرور  </label>
                                <div class="col-sm-10">
                                    <input  type="password" class="form-control" name="password">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label">الكود</label>
                                <div class="col-sm-10">
                                    <input required type="text" value="{{$item->code}}" class="form-control" name="code">
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn  btn-info">تعديل</button>
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


