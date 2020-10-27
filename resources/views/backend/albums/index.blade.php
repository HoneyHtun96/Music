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
              <th>Start Date</th>
              <th>Artist</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot class="bg-secondary text-white">
            <tr>
              <th>Name</th>
              <th>Photo</th>
              <th>Start Date</th>
              <th>Artist</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($albums as $album)
            <tr>
              <td>{{$album->name}}</td>
              <td class="w-25"><img src="{{$album->photo}}" class="img-fluid"></td>
              
              <td>{{$album->start_date}}</td>
              <td>@foreach($album->artists as $album_artist){{$album_artist->name}} @if (!$loop->last),@endif @endforeach</td>
              <td>
                <a href="{{route('albums.edit',$album->id)}}" class="btn"><i class="fas fa-edit text-warning" style="font-size: 30px;"></i></a> 
                <form action="{{route('albums.destroy',$album->id)}}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure to delete?')"> 
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
