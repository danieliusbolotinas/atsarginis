@extends('layout')
@section('content')

  <h2>Enter Character form</h2>
  <form class="form-horizontal" action="{{route('store')}}" method="POST">
    {!!csrf_field()!!}
    @include('form',[
      'name'=>'',
      'race'=>'',
      'power_level'=>'',
      'description'=>'',
    ])
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
  <a href="{{route('index')}}" class="btn btn-primary">Back to main page</a>
@endsection
