@extends('layout')
@section('content')

  <h2>Upload photos</h2>
  <form class="form-horizontal" action="{{route('upload', $id)}}" method="POST" enctype="multipart/form-data">
    {!!csrf_field()!!}

    Select image to upload for {{$character->name}}:<br>
    <input type="file" name="upload
    @if($errors->has('upload')) has-error @endif"><br>
    <input type="submit" value="Upload image" name="Submit"><br>
  </form><br>
  <a href="{{route('index')}}" class="btn btn-primary">Back to main page</a>
@endsection
