@extends('layout')
@section('content')

  <div class="row">
         <div class="col-sm-12">
           <div class="thumbnail">
             @if ($character->featured_photo != NULL)
               <img src="{{$character->featured_photo->url}}" alt="">
             @endif
             <div class="caption">
               <h3>{{ $character->name }}</h3>
               <p>{{$character->description}}</p>
               <p>Power level: {{$character->power_level}}</p>

               <p><a href="{{ route('edit', $character->id) }}" class="btn btn-primary" role="button">Edit</a>
                 <a href="{{ route('destroy', $character->id) }}" class="btn btn-default" role="button">Delete</a>
                 <a href="{{ route('create-photo', $character->id) }}" class="btn btn-default" role="button">Add photo</a>
                 <a href="{{ route('index') }}" class="btn btn-default" role="button">Back</a></p>
             </div>
           </div>
         </div>
     </div>
     <div class="row">
       @foreach($character->photos as photo)
         <div class="col-xs-3">
           <img class="img-responsive" src="{{$phoyo->url}}">
           <a href="{{route('destroy-photo', $photo->id)}}" class="btn btn-danger">Delete</a>
         </div>
       @endforeach
 @endsection
