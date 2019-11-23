@extends ('layouts.base')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">L6app index page</h1>
                <p>This is a template for a simple marketing or informational website. {{$var1}}It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                <p>
                    <a class="btn btn-primary btn-lg" href="{{route('login')}}" role="button">Login &raquo;</a>
                    <a class="btn btn-dark btn-lg" href="{{route('register')}}" role="button">Register &raquo;</a>
                </p>
            </div>
        </div>
    </div>
@endsection
