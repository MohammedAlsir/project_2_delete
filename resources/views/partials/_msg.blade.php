<style>
    .alert{
        z-index: 999999;
        margin-top: 60px;
        position: absolute;
        width: 60%;
        margin-top: 0px;
            top: 25px;
        left: 0;
        right: 0;
        margin-left: auto;
        margin-right: auto;
    }
</style>
@if(Session::has('SUCCESS'))

<div class="alert alert-success" role="alert">
    <strong></strong>   {{Session::get('SUCCESS')}}
  </div>
@endif

@if(Session::has('error'))

<div class="alert alert-danger" role="alert">
    <strong></strong>   {{Session::get('error')}}
  </div>
@endif


@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <strong></strong>
    <ul>
        @foreach($errors->all() as $error)

        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
  </div>
@endif

