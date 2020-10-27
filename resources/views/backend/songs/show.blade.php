@extends('backend.backend_template')
@section('content')

<div class="row my-5 py-3">
  <div class="col-md-8 offset-md-2">
     <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="font-size: 20px;">Artist Information  Details<a href="{{route('songs.index')}}" class="btn btn-outline-info float-right "><i class="fas fa-backward"></i></a></h6>
      </div>
      <div class="card-body">
        <div class="row mt-2">
          <div class="col-md-3">
            <h5 class="text-right">Song Name : </h5>
          </div>
          <div class="col-md-7 offset-md-1">
            <h5>{{$song->name}}</h5>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-md-3">
            <h5 class="text-right">Music Type : </h5>
          </div>
          <div class="col-md-7 offset-md-1">
            <h5>{{$song->musictype->name}}</h5>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-md-3">
            <h5 class="text-right">Album Name : </h5>
          </div>
          <div class="col-md-7 offset-md-1">
            <h5>{{$song->album->name}}</h5>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-md-3">
            <h5 class="text-right">Artist Name : </h5>
          </div>
          <div class="col-md-7 offset-md-1" style="font-size: 17px;">
            @foreach($song->artists as $song_artist)
            {{$song_artist->name}}@if (!$loop->last),@endif @endforeach
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-3">
            <h5 class="text-right">Song File : </h5>
          </div>
          <div class="col-md-7 offset-md-1">
            <audio controls="">
              <source src="{{$song->file}}" type="audio/mp3">
            </audio>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 
@endsection
