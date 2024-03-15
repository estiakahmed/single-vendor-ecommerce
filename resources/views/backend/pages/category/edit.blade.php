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

            @if(session()->has('success'))
              <div class="alert alert-success">{{session()->get('success')}}</div>
            @endif
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4 mb-4">Edit Category</h2>
            
            <div class="form">
                <form action="{{url('/category/update/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf  
                  <div class="form-group">
                      <label for="">Category Name</label>
                      <input type="text" class="form-control" value="{{$category->name}}" name="name" placeholder="Enter email">
                      
                    </div>
                    <div class="form-group">
                      <label for="">Image</label>
                      <input type="file" name="image" class="form-control" >
                      <img src="{{asset('images/'.$category->image)}}" width="50px" height="50px" alt="">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>

@endsection