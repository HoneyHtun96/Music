@extends('backend.backend_template')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
			  <h6 class="m-0 font-weight-bold text-primary"> Song Registration  <a href="{{route('songs.index')}}" class="btn btn-outline-info float-right "><i class="fas fa-backward"></i></a></h6>
			</div>
			<div class="card-body">
				<form action="{{route('songs.update',$song->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group row">
					  	<div class="col-md-2">
					  		<label>Mp3 File:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<nav>
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
								    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Mp3 File</a>
								    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Mp3 file</a>
								</div>
							</nav>
							<div class="tab-content my-4" id="nav-tabContent">
							    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							    	<audio controls="">
						              <source src="{{$song->file}}" type="audio/mp3">
						            </audio>
							    	<input type="hidden" name="old_file" value="{{$song->file}}">
							    </div>
							    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							    	<input type="file" name="music_file" class="form-control-user @error('music_file') is-invalid @enderror">
							  		@error('music_file')
							  		<div class="text-danger">{{$message}}</div>
							  		@enderror
							  	</div>
							</div>
					  	</div>
					</div>
					
					<div class="form-group row">
					  	<div class="col-md-2">
					  		<label for="name">Name:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name ...." id="name" value="{{$song->name}}">

					  		@error('name')
					  		<div class="text-danger">{{$message}}</div>
					  		@enderror
					  	</div>
					</div>

					<div class="form-group row">
					  	<div class="col-md-2">
					  		<label>Artist:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<select  multiple="multiple" name="artists[]" class="form-control multiple_artist @error('artists') is-invalid @enderror">
					  			@foreach($artists as $artist)
					  			<option value="{{$artist->id}}" @foreach($song->artists as $song_artist) @if($artist->id == $song_artist->id) {{'selected'}} @endif @endforeach>{{$artist->name}}</option>
					  			@endforeach
					  		</select>
					  		@error('artists')
					  		<div class="text-danger">{{$message}}</div>
					  		@enderror
					  	</div>
					</div>

					<div class="form-group row">
					  	<div class="col-md-2">
					  		<label>Music Type:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<select name="music_type" class="form-control @error('music_type') is-invalid @enderror">
					  			
					  			@foreach($music_types as $music_type)
					  			<option value="{{$music_type->id}}" @if($music_type->id == $song->id) {{'selected'}} @endif>{{$music_type->name}}</option>
					  			@endforeach
					  		</select>
					  		@error('music_type')
					  		<div class="text-danger">{{$message}}</div>
					  		@enderror
					  	</div>
					</div>

					<div class="form-group row">
					  	<div class="col-md-2">
					  		<label>Album:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<select  name="album_id" class="form-control multiple_artist @error('album_id') is-invalid @enderror">
					  			
					  			@foreach($albums as $album)
					  			<option value="{{$album->id}}" @if($album->id == $song->album_id) {{'selected'}} @endif>{{$album->name}}</option>
					  			@endforeach
					  		</select>
					  		@error('album_id')
					  		<div class="text-danger">{{$message}}</div>
					  		@enderror
					  	</div>
					</div>

					<input type="submit" class="btn btn-secondary float-right" name="" value="Save Data">
				</form>
			
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function () {
		$('.multiple_artist').select2();
	})
</script>
@endsection
