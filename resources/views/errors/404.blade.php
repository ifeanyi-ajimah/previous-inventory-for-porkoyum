<!DOCTYPE html>
<html lang="en">
    <head>
        <title>404 Page</title>
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
                <h1 class="fourzerofour">404</h1>
                <h1>PAGE NOT FOUND</h1>
                <h4>YOU BROKE THE BALANCE OF THE INTERNET, MR FOLORUNSHO IS ON YOUR ASS</h4>
                <a href="{{ route('dashboard') }}" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Back to Dashboard</a>
            </div>
        </div>
    </body>
</html>
