@extends('layout')
@section('content')
<div class="page-header">
  <h1>Dragon ball characters</h1>
</div>
<div class="row">
     @foreach ($characters as $character)
       <div class="col-sm-6 col-md-4">
         <div class="thumbnail">
           @if ($character->featured_photo != NULL)
            <a href="{{route('show', $character->id)}}"><img src="{{$character->featured_photo->url}}" alt="..."></a>
           @endif
           <div class="caption">
             <h3>{{ $character->name }}</h3>
             <p></p>
             <p><a href="{{ route('edit', $character->id) }}" class="btn btn-primary" role="button">Edit</a>
               <a href="{{ route('destroy', $character->id) }}" class="btn btn-default" role="button">Delete</a>
               <a href="{{ route('create-photo', $character->id) }}" class="btn btn-default" role="button">Add photo</a></p>
           </div>
         </div>
       </div>
     @endforeach
   </div>
  <div class="row">
    <div class="col-sm-12">
    </div>
  </div>
  <a href="{{route('create')}}" class="btn btn-danger">Back to create</a>
</div> <!-- /container -->
@endsection
