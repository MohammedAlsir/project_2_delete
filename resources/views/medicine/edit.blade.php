@extends('layouts.app')
{{-- @section('title','بيانات القسم') --}}
@section('medicine_open','menu-open')
@section('medicine','active')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <!-- left column -->
            <div class="col-md-8">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"> تعديل بيانات الدواء </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('medicine.update',$item->id)}}" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">الاسم  </label>
                                <div class="col-sm-10">
                                    <input required type="text" value="{{$item->name}}" class="form-control" name="name">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label">  الشركة </label>
                                <div class="col-sm-10">
                                    <input required type="text" value="{{$item->company}}" class="form-control" name="company">
                                </div>
                            </div>


                             <div class="form-group row">
                                <label class="col-sm-2 control-label">تاريخ الانتهاء</label>
                                <div class="col-sm-10">
                                    <input required type="date" value="{{$item->expaire_date}}" class="form-control" name="expaire_date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">سعر الحبة</label>
                                <div class="col-sm-10">
                                    <input required type="number" value="{{$item->price}}" class="form-control" name="price">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label">الكمية</label>
                                <div class="col-sm-10">
                                    <input required type="number" value="{{$item->amount}}" class="form-control" name="amount">
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


