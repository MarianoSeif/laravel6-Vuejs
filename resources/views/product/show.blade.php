@extends('layouts.base')

@section('content')
    <h1>Product Description</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        {{$product->name}}
                    </div>
                    <div class="card-body">
                        {{$product->description}}
                    </div>
                </div>
                @auth()
                    <a href="{{route('product.edit', ['product'=>$product->id])}}" class="btn btn-primary">Edit</a>
                @endauth
            </div>
        </div>
    </div>
@endsection
