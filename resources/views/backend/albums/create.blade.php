@extends('backend.backend_template')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
			  <h6 class="m-0 font-weight-bold text-primary"> Album Registration  <a href="{{route('albums.index')}}" class="btn btn-outline-info float-right "><i class="fas fa-backward"></i></a></h6>
			</div>
			<div class="card-body">
				<form action="{{route('albums.store')}}" method="POST" enctype="multipart/form-data">
					@csrf

					<div class="form-group row">
					  	<div class="col-md-2">
					  		<label>Cover Photo:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<input type="file" name="photo" class="form-control-user @error('photo') is-invalid @enderror">
					  		@error('photo')
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
					  		<label>Start Date:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror">
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
					  			<option value="{{$artist->id}}">{{$artist->name}}</option>
					  			@endforeach
					  		</select>
					  		@error('start_date')
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
