@extends('backend.backend_template')
@section('content')

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Artist Information  <a href="{{route('songs.create')}}" class="btn btn-outline-info float-right "><i class="fas fa-plus"></i></a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-secondary text-white">
            <tr>
              <th>NO</th>
              <th>Name</th>
              <th>Music Type</th>
              <th>Album Name</th>            
              <th>Action</th>
            </tr>
          </thead>
          <tfoot class="bg-secondary text-white">
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Music Type</th>
              <th>Album Name</th>            
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @php 
              $i = 1;
            @endphp
            @foreach($songs as $song)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$song->name}}
              </td>              
              <td>{{$song->musictype->name}}</td>
              <td>{{$song->album->name}}</td>
              <td>
                <a href="{{route('songs.show',$song->id)}}" class="btn"><i class="fas fa-info-circle text-info" style="font-size: 30px;"></i></a>
                <a href="{{route('songs.edit',$song->id)}}" class="btn"><i class="fas fa-edit text-warning" style="font-size: 30px;"></i></a> 
                <form action="{{route('songs.destroy',$song->id)}}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure to delete?')"> 
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
