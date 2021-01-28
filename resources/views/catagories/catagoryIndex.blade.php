@extends('main')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
      <div class="card-header">
        <strong class="card-title">All Catagory</strong>
      </div>
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-body">
            
            <!-- table -->
            <table class="table table-bordered datatables" id="dataTable-1">
              <a href="{{ route('catagories.create') }}"><button class="btn btn-primary float-right ml-3" style="margin-top: 12px" type="button">Add more +</button></a>
              <thead>    
                <tr>
                  <th>Id</th>
                  <th>catagory Name</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($catagories as $key => $catView)
                <tr>      
                  <td>{{ $key++ }}</td>      
                  <td>{{ $catView->catagoryName }}</td>
                  <td>{{ $catView->created_at }}</td>
                  <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="text-muted sr-only">Action</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                     <a class="dropdown-item"  href="{{ route('catagories.edit',$catView->id) }}">Edit</a>
          
                     <a  href="/catagory/delete/{{$catView->id}}" class="dropdown-item delete-confirm">Delete</a>
                     {{--  <form action="{{ route('catagories.destroy',$catView->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item" >remove</button>
                      <a class="dropdown-item sa-delete" href="javascript:;" data-form-id="catagorg-delete-{{ $catView->id }}">Remove</a> 
                      </form> --}}
                    </div>
                  </td>
                </tr>
              @endforeach 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- end section -->

        

@endsection