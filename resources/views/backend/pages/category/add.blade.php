@extends('backend.master')

@section('content')

<div class="container">
  @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4 mb-4">Add Category</h2>
            
            <div class="form">
                <form action="{{url('/category/store')}}" method="POST" enctype="multipart/form-data">
                  @csrf  
                  <div class="form-group">
                      <label for="">Category Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter email">
                      
                    </div>
                    <div class="form-group">
                      <label for="">Image</label>
                      <input type="file" name="image" class="form-control" >
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>

@endsection