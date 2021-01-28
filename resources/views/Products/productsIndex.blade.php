@extends('main')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
      <div class="card-header">
        <strong class="card-title">All Product List</strong>
       
      </div>
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-body">
            
            <!-- table -->
            <table class="table table-bordered datatables" id="dataTable-1">
              <a href="{{ route('products.create') }}"><button class="btn btn-primary float-right ml-3" style="margin-top: 12px" type="button">Add more +</button></a>
              <thead>    
                <tr>
                  <th>Id</th>
                  <th>product Name</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $key => $catView)
                <tr>      
                  <td>{{ $key++ }}</td>      
                  <td>{{ $catView->productName }}</td>
                  <td>{{ $catView->created_at }}</td>
                  <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="text-muted sr-only">Action</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                     <a class="dropdown-item"  href="{{ route('products.edit',$catView->id) }}">Edit</a>
          
                     <a  href="/product/delete/{{$catView->id}}" class="dropdown-item delete-confirm">Delete</a>
  
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