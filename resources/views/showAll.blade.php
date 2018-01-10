@extends('layout')
@section('content')


<div class="container">

    <div class="page-header">
        <h1>Dragonballz</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <ul class="list-group">

                @foreach ($characters as $character)
              <li style="list-style-type: none">
                <a href="{{route('edit', $character->id)}}" class="btn btn-success btn-xs">e</a>
                <a href="{{route('destroy', $character->id)}}" class="btn btn-danger btn-xs">x</a>
                {{$character->name}} </li>
                @endforeach

            </ul>
        </div><!-- /.col-sm-4 -->
    </div>
      <div class="row">
        <div class="col-sm-12">

        </div>
      </div>
      <a href="{{route('create')}}" class="btn btn-primary">Create</a>
</div> <!-- /container -->
@endsection
