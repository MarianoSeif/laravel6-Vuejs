@extends('layouts.base')

@section('content')
    <div class="mt-3">
        <h1>Edit Product</h1>

        {!! Form::open(['action'=>['ProductsController@update', $product->id], 'method'=>'PUT']) !!}
            <div class="form-group">
                {{Form::label ('name', 'Name:')}}
                {{Form::text('name', $product->name, ['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label ('description', 'Description:')}}
                {{Form::textarea('description', $product->description, ['class'=>'form-control'])}}
            </div>
            {{Form::submit('Guardar', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection
