@extends('backend.backend_template')
@section('content')

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">musictype Information  <a href="{{route('musictypes.create')}}" class="btn btn-outline-info float-right "><i class="fas fa-plus"></i></a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-secondary text-white text-center">
            <tr>
              <th>Name</th>
             
              <th>Action</th>
            </tr>
          </thead>
          <tfoot class="bg-secondary text-white text-center">
            <tr>
              <th>Name</th>
            
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($musictypes as $musictype)
            <tr>
              <td>{{$musictype->name}}</td>
             
              <td>
                <a href="{{route('musictypes.edit',$musictype->id)}}" class="btn"><i class="fas fa-edit text-warning" style="font-size: 30px;"></i></a> &nbsp;&nbsp;&nbsp;
                <form action="{{route('musictypes.destroy',$musictype->id)}}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure to delete?')"> 
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
