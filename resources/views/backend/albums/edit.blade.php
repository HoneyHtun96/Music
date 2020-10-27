@extends('backend.backend_template')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
			  <h6 class="m-0 font-weight-bold text-primary"> Album Registration  <a href="{{route('albums.index')}}" class="btn btn-outline-info float-right "><i class="fas fa-backward"></i></a></h6>
			</div>
			<div class="card-body">
				<form action="{{route('albums.update',$album->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group row">
					  	<div class="col-md-2">
					  		<label>Covor Photo:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<nav>
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
								    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Image</a>
								    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Image</a>
								</div>
							</nav>
							<div class="tab-content my-4" id="nav-tabContent">
							    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							    	<img src="{{$album->photo}}" class="img-fluid">
							    	<input type="hidden" name="old_photo" value="{{$album->photo}}">
							    </div>
							    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							    	<input type="file" name="photo" class="form-control-user @error('photo') is-invalid @enderror">
							  		@error('photo')
							  		<div class=" text-danger">{{$message}}</div>
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
					  		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name ...." id="name" value="{{$album->name}}">

					  		@error('name')
					  		<div class="text-danger">{{$message}}</div>
					  		@enderror
					  	</div>
					</div>

					<div class="form-group row">
					  	<div class="col-md-2">
					  		<label>Start Date:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{$album->start_date}}">
					  		@error('start_date')
					  		<div class="text-danger">{{$message}}</div>
					  		@enderror
					  	</div>
					</div>

					<div class="form-group row">
					  	<div class="col-md-2">
					  		<label>Artist:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<select  multiple="multiple" name="artists[]" class="form-control multiple_artist">
					  			@foreach($artists as $artist)
					  			
					  			<option value="{{$artist->id}}" @foreach($album->artists as $album_artist) @if($artist->id == $album_artist->id) {{'selected'}} @endif @endforeach>{{$artist->name}}</option>

					  			
					  			@endforeach
					  		</select>
					  		@error('start_date')
					  		<div class="text-danger">{{$message}}</div>
					  		@enderror
					  	</div>
					</div>

					<input type="submit" class="btn btn-secondary float-right" name="" value="Update Data">
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
