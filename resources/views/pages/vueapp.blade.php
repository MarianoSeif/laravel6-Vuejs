@extends('layouts.base')

@section('content')

    <div id="app">
        <product-create>{{csrf_token()}}</product-create>
        <br>
        <product-card></product-card>
    </div>

@endsection
