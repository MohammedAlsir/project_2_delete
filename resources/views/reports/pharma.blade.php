@extends('layouts.app')
{{-- @section('title','كل الاقســـــام') --}}
@section('report_open','menu-open')
@section('report','active')
@section('report_pharma','active')



@section('content')
<!-- Main content -->
    <section class="content">
      <div class="">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">تقارير عن الصيدليات</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>اسم الصيدلية </th>
                  <th> الموقع </th>
                  <th>عدد الادوية</th>

                  {{-- <th>العمليات</th> --}}
                </tr>
                </thead>
                <tbody>

                    @php
                        $counter = 0;
                    @endphp
                    @foreach ($pharmas as $item)
                        <tr>
                            <td>{{$index++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->addres}}</td>

                            <td>{{$item->medicines->count()}}</td>

                            @php
                                $counter += $item->medicines->count();
                            @endphp
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="3"> عدد الادوية الكلي</td>
                        <td>{{$counter}}</td>
                    </tr>



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
