@extends('layouts.base')

@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Product List</h1>
        </div>
        <div class="col">
            <a href="{{route('product.create')}}" class="btn btn-primary float-right">Create</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th style="width: 30%">Name
                    <a href="{{route('product.index', ['orderBy'=>'name_asc'])}}">&#9652;</a>
                    <a href="{{route('product.index', ['orderBy'=>'name_desc'])}}">&#9662;</a>
                </th>
                <th style="width: 30%">Description</th>
                <th style="width: 30%">Created at
                    <a href="{{route('product.index', ['orderBy'=>'created_at_asc'])}}">&#9652;</a>
                    <a href="{{route('product.index', ['orderBy'=>'created_at_desc'])}}">&#9662;</a>
                </th>
                @auth()
                    <th style="width: 5%"></th>
                    <th style="width: 5%"></th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td><a href="{{route('product.show', ['product' => $product->id ])}}">{{$product->name}}</a></td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->created_at}}</td>
                    @auth()
                        <td>
                            <a href="{{route('product.edit', ['product'=>$product->id])}}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                        <td>
                            {{ Form::open(['action' => ['ProductsController@destroy', 'product'=>$product->id], 'method' => 'delete', 'class' => 'deleteForm']) }}
                                {{Form::submit('Eliminar', ['class'=>'btn btn-danger btn-sm', 'onclick'=>'return confirm("are u sure?")'])}}
                            {{ Form::close() }}
                        </td>
                    @endauth
                </tr>
            @endforeach

            {{ $products->appends(['orderBy'=>Session::get('orderBy')])->links() }}
        </tbody>
    </table>

@endsection
