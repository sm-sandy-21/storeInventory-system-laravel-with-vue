@extends('main')
@section('content')
<div class="row">
    <div class="col-md-auto">
      <div class="card shadow mb-auto">
        <div class="card-header">
          <strong class="card-title">Edit Catagory</strong>
        </div>
        <div class="card-body">
          <form class="form-inline" action="{{ route('catagories.update',$Catagories->id ) }}" method="POST" >
              @csrf
              @method('PUT')
            <label class="sr-only" for="inlineFormInputName2">Catagory</label>
            <input type="text" name="name" required value="{{ $Catagories->catagoryName }}">      
            <button type="submit" style="margin-top: 5px; margin-left: 20px " class="btn btn-primary mb-2">Update Catagory Name</button>
          </form>
        </div>
      </div>
    </div>
  </div> <!-- end section -->
@endsection