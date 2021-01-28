@extends('main')
@section('content')
<div class="row">
    <div class="col-md-auto">
      <div class="card shadow mb-4">
        <div class="card-header">
          <strong class="card-title">Edit products</strong>
        </div>
        <div class="card-body">
          <form class="form-inline" action="{{ route('products.update',$products->id ) }}" method="POST" >
              @csrf
              @method('PUT')
            <label class="sr-only" for="inlineFormInputName2">products</label>
            <input type="text" name="name" required value="{{ $products->brandName }}" placeholder="Add products">      
            <button type="submit" style="margin-top: 5px; margin-left: 20px " class="btn btn-primary mb-2">Update brand Name</button>
          </form>
        </div>
      </div>
    </div>
  </div> <!-- end section -->
@endsection