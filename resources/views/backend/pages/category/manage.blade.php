@extends('backend.master')

@section('content')
<style>
    .table{
        margin: 15px;
    }
</style>
<div class="container">
    <div class="col-md-12">
        <h3>Manage Category</h3>
        <div class="row">
            <table class="table table-bordered">
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach ($categories as $category)
                    
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <img src="{{asset('images/'.$category->image)}}" height="50px" width="50px" alt="">
                    </td>
                    <td>
                        <a href="{{url('/category/edit/'.$category->id)}}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{url('/category/delete/'.$category->id)}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection