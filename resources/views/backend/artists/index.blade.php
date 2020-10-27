@extends('backend.backend_template')
@section('content')

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Artist Information  <a href="{{route('artists.create')}}" class="btn btn-outline-info float-right "><i class="fas fa-plus"></i></a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-secondary text-white">
            <tr>
              <th>Name</th>
              <th>Photo</th>
              <th>Gender</th>
              <th>Biography</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot class="bg-secondary text-white">
            <tr>
              <th>Name</th>
              <th>Photo</th>
              <th>Gender</th>
              <th>Biography</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($artists as $artist)
            <tr>
              <td>{{$artist->name}}</td>
              <td class="w-25"><img src="{{$artist->photo}}" class="img-fluid"></td>
              <td>{{$artist->gender}}</td>
              <td>{{$artist->biography}}</td>
              <td>
                <a href="{{route('artists.edit',$artist->id)}}" class="btn"><i class="fas fa-edit text-warning" style="font-size: 30px;"></i></a> 
                <form action="{{route('artists.destroy',$artist->id)}}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure to delete?')"> 
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn"><i class="fas fa-trash-restore-alt text-danger" style="font-size: 30px;"></i></button>
                </form>
                
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
