@extends('backend.master')

@section('content')



<div class="container mt-5">


  <div class="row justify-content-center">
    <div class="col-md-6">
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    
    @if(session()->has('success'))
      <div class="alert alert-success">{{session()->get('success')}}</div>
    @endif
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h4>Add Category</h4>
        </div>
        <div class="card-body">
          <form action="{{url('/category/store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="category_name">Category Name</label>
              <input type="text" id="category_name" class="form-control" name="name" placeholder="Enter category name">
          </div>
          <div class="form-group">
              <label for="image">Image</label>
              <input type="file" id="image" name="image" class="form-control">
          </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  input#image {
    border: none;
    margin: 0;
    padding: 2px;
}
</style>

@endsection