@extends('main')
@section('content')
<div class="row">
    <div class="col-md-auto">
      <div class="card shadow mb-4">
        <div class="card-header">
          <strong class="card-title">Edit brands</strong>
        </div>
        <div class="card-body">
          <form class="form-inline" action="{{ route('brands.update',$brands->id ) }}" method="POST" >
              @csrf
              @method('PUT')
            <label class="sr-only" for="inlineFormInputName2">brands</label>
            <input type="text" name="name" required value="{{ $brands->brandName }}" placeholder="Add brands">      
            <button type="submit" style="margin-top: 5px; margin-left: 20px " class="btn btn-primary mb-2">Update brand Name</button>
          </form>
        </div>
      </div>
    </div>
  </div> <!-- end section -->
@endsection