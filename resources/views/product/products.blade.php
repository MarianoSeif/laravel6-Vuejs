@extends('layouts.base')

@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Product List</h1>
        </div>
        <div class="col">
            <a href="{{route('product_create')}}" class="btn btn-primary float-right">Create</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Name<a href="{{route('product', ['orderBy'=>2])}}">&rtriltri;</a></th>
                <th>Description</th>
                <th>Created at<a href="{{route('product', ['orderBy'=>1])}}">&rtriltri;</a></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td><a href="{{route('product_show', ['product' => $product->id ])}}">{{$product->name}}</a></td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->created_at}}</td>
                    <td><a href="{{route('product_edit', ['product' => $product->id])}}"><i class="fa fa-pencil"></i><small>Edit</small></a></td>
                    <td><a href="{{route('product_remove', ['product'=>$product->id])}}" onclick="return confirm('are u sure?')"><i class="fa fa-trash"></i><small>Delete</small></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
