@extends('backend.backend_template')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
			  <h6 class="m-0 font-weight-bold text-primary"> Artist Registration  <a href="{{route('musictypes.index')}}" class="btn btn-outline-info float-right "><i class="fas fa-backward"></i></a></h6>
			</div>
			<div class="card-body">
				<form action="{{route('musictypes.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
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

					<input type="submit" class="btn btn-secondary float-right" name="" value="Save Data">
				</form>
			
			</div>
		</div>
	</div>
</div>
@endsection
