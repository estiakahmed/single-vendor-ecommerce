@extends('backend.master')
@section('content')
<div class="container mt-5">
    @if (Session::has('success'))
        <div class="alert alert-info" >{{Session::get('success')}}</div>
    @endif
    <h2 class="text-center mb-4">Manage Products</h2>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Sl No</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Product Category</th>
            <th>Product Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$product->name}}</td>
              <td><img src="{{asset('images/'.$product->image)}}" alt="Product 1" width="50px" height="50px" class="img-fluid"></td>
              <td>
                @if ($product->category)
                    {{ $product->category->name }}
                @else
                    No Category
                @endif
            </td>
            

              <td>{{$product->price}}</td>
              <td>
                <a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-sm btn-primary mr-2">Edit</a>
                <a href="{{url('product/delete/'.$product->id)}}" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>
  </div>
  

@endsection