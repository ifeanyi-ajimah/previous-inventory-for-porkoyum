<!DOCTYPE html>
<html lang="en">
    <head>
        <title>403 - Forbidden</title>
        {{ Html::style('css/bootstrap/bootstrap.min.css') }}
        <style>
            .top { margin-top: 150px; }
            .fourzerofour { font-weight: bold; font-size: 200px; color: #2b542c }
        </style>
    </head>
    <body>
        @include('partials._nav')
        <div class="col-md-8 col-md-offset-2 top">
            <div class="row text-center">
                <h1 class="text-danger">FORBIDDEN REQUEST!!!</h1>
                <br>
                <h4>Sorry, your request has been denied</h4>
                <a href="{{ url('/') }}" class="btn btn-primary"></span> Back to Base</a>
            </div>
        </div>
    </body>
</html>
