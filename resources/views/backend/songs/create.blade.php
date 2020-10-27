@extends('backend.backend_template')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
			  <h6 class="m-0 font-weight-bold text-primary"> Song Registration  <a href="{{route('songs.index')}}" class="btn btn-outline-info float-right "><i class="fas fa-backward"></i></a></h6>
			</div>
			<div class="card-body">
				<form action="{{route('songs.store')}}" method="POST" enctype="multipart/form-data">
					@csrf

					<div class="form-group row">
					  	<div class="col-md-2">
					  		<label>Mp3 File:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<input type="file" name="music_file" class="form-control-user @error('music_file') is-invalid @enderror">
					  		@error('music_file')
					  		<div class="text-danger">{{$message}}</div>
					  		@enderror
					  	</div>
					</div>
					
					<div class="form-group row">
					  	<div class="col-md-2">
					  		<label for="name">Name:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name ...." id="name">

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
					  			<option>Choose Artists</option>
					  			@foreach($artists as $artist)
					  			<option value="{{$artist->id}}">{{$artist->name}}</option>
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
					  			<option value="{{$music_type->id}}">{{$music_type->name}}</option>
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
					  			<option value="{{$album->id}}">{{$album->name}}</option>
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
