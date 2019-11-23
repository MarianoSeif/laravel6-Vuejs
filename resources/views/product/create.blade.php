@extends('layouts.base')

@section('content')

    <div class="mt-3">
        <h1>Create Product</h1>
        {!! Form::open(['action'=>'ProductController@create', 'method'=>'POST']) !!}
            <div class="form-group">
                {{Form::label ('name', 'Name:')}}
                {{Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Ingrese un nombre'])}}
            </div>
            <div class="form-group">
                {{Form::label ('description', 'Description:')}}
                {{Form::textarea('description', '', ['class'=>'form-control'])}}
            </div>
            {{Form::submit('Crear', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>

@endsection
