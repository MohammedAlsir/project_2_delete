@extends('layouts.app')
{{-- @section('title','كل الاقســـــام') --}}
@section('order_open','menu-open')
@section('order','active')
@section('acceptable','active')



@section('content')
<!-- Main content -->
    <section class="content">
      <div class="">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">  الطلبات المقبولة</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>اسم الدواء </th>
                  <th>اسم المستخدم</th>
                  <th>البريد الالكتروني للمستخدم</th>
                  <th>الكمية المطلوية </th>
                  <th>الكمية المتوفرة حاليا</th>

                  <th>الحالة</th>
                  <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            <td>{{$index++}}</td>
                            <td>{{$item->medicine->name}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->user->email}}</td>

                            <td>{{$item->amount}}</td>
                            <td>{{$item->medicine->amount}}</td>
                             <td>
                                @switch($item->status)
                                    @case(1)
                                        معلق
                                        @break
                                    @case(2)
                                        تم قبول الطلب
                                        @break
                                    @default
                                        تم رفض الطلب
                                @endswitch
                            </td>
                            <td>
                                <div>
                                    {{-- <form  action="{{route('order.Acceptance',$item->id)}}" method="POST"> --}}
                                        {{-- {{ csrf_field()}}
                                        {{ method_field('delete') }} --}}
                                        {{-- <a href="{{route('order.reject',$item->id)}}" class="btn btn-primary"> قبول </a> --}}
                                        {{-- <a href="{{route('order.Acceptance',$item->id)}}" class="btn btn-primary"> قبول </a> --}}
                                        <a href="{{route('order.reject',$item->id)}}" class="btn btn-danger"> رفض </a>

                                        {{-- <a href="{{route('order.Acceptance',$item->id)}}" class="btn btn-danger"> رفض </a> --}}
                                    {{-- </form> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach



                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
