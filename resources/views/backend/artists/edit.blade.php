@extends('backend.backend_template')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
			  <h6 class="m-0 font-weight-bold text-primary"> Artist Registration Update
			  	 <a href="{{route('artists.index')}}" class="btn btn-outline-info float-right "><i class="fas fa-backward"></i></a>
			  </h6>
			 
			</div>
			<div class="card-body">
				<form action="{{route('artists.update',$artist->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group row">
					  	<div class="col-md-2">
					  		<label for="name">Name:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name ...." id="name" value="{{$artist->name}}">

					  		@error('name')
					  		<div class=" text-danger">{{$message}}</div>
					  		@enderror
					  	</div>
					</div>

					<div class="form-group row">
					  	<div class="col-md-2">
					  		<label>Photo:</label>
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
							    	<img src="{{$artist->photo}}" class="img-fluid">
							    	<input type="hidden" name="old_photo" value="{{$artist->photo}}">
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
					  		<label>Gender:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<input type="radio" name="gender" value="Male" id="male" class="@error('gender') is-invalid @enderror" {{ $artist->gender == 'Male' ? 'checked' : '' }} >&nbsp;&nbsp;<label for="male">Male</label> &nbsp;&nbsp;&nbsp;
					  		<input type="radio" name="gender" value="Female" id="female" {{ $artist->gender == 'Female' ? 'checked' : '' }}>&nbsp;&nbsp;<label for="female">Female</label>
					  		@error('gender')
					  		<div class=" text-danger">{{$message}}</div>
					  		@enderror
					  	</div>
					</div>

					<div class="form-group row">
					  	<div class="col-md-2">
					  		<label>Biography:</label>
					  	</div>
					  	<div class="col-md-10">
					  		<textarea class="form-control @error('biography') is-invalid @enderror" name="biography" placeholder="Enter Artist's Biography ....">{{$artist->biography}}</textarea>
					  		@error('biography')
					  		<div class=" text-danger">{{$message}}</div>
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
