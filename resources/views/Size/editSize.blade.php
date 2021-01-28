@extends('main')
@section('content')
<div class="row">
    <div class="col-md-auto">
      <div class="card shadow mb-4">
        <div class="card-header">
          <strong class="card-title">Edit Sizes</strong>
        </div>
        <div class="card-body">
          <form class="form-inline" action="{{ route('sizes.update',$sizes->id ) }}" method="POST" >
              @csrf
              @method('PUT')
            <label class="sr-only" for="inlineFormInputName2">Sizes</label>
            <input type="text" name="name" required value="{{ $sizes->sizeName }}" placeholder="Add sizes">      
            <button type="submit" style="margin-top: 5px; margin-left: 20px " class="btn btn-primary mb-2">Update Size Name</button>
          </form>
        </div>
      </div>
    </div>
  </div> <!-- end section -->
@endsection