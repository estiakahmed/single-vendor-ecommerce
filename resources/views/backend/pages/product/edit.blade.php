@extends('backend.master')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-info">{{Session::get('success')}}</div>
        @endif
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h4>Edit Product</h4>
          </div>
          <div class="card-body">
            <form action="{{url('/product/update/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="productName">Product Name:</label>
                  <input type="text" value="{{$product->name}}" name="name" class="form-control" id="productName" placeholder="Enter product name">
                </div>
                <div class="form-group">
                  <label for="productCategory">Product Category:</label>
                      
                  <select class="form-control" name="category_id" id="productCategory">
                  @foreach ($categories as $category)
                   
                      <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                 
                </div>
                <div class="form-group">
                  <label for="productPrice">Price:</label>
                  <input type="number" value="{{$product->price}}" name="price" class="form-control" id="productPrice" placeholder="Enter product price">
                </div>
                <div class="form-group">
                  <label for="productImage">Product Image:</label>
                  <input type="file" value="{{asset('images/'.$product->image)}}" name="image" class="form-control-file" id="productImage">
                  <img src="{{asset('images/'.$product->image)}}" width="50px" height="50px" alt="">
                </div>
                <div class="form-group">
                  <label for="productShortDescription">Short Description:</label>
                  <input type="text" value="{{$product->short_description}}" name="short_description" class="form-control" id="productShortDescription" placeholder="Enter short description">
                </div>
                <div class="form-group">
                  <label for="productLongDescription">Long Description:</label>
                  <textarea class="ckeditor form-control" value="{{$product->long_description}}" name="long_description" id="productLongDescription" placeholder="Enter long description"></textarea>
                </div>
                <div class="form-group">
                  <label for="productType" class="form-label">Product Type</label>
                  <select class="form-select"  name="type" id="productType">
                      <option value="" disabled selected>Select an option</option>
                      <option value="Hot">Hot</option>
                      <option value="Top">Top</option>
                      <option value="New">New</option>
                  </select>
              </div>
              
              
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection