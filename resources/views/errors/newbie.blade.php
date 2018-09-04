<!DOCTYPE html>
<html lang="en">
    <head>
        <title>No Access</title>
        {{ Html::style('css/bootstrap/bootstrap.min.css') }}
        <style>
            .top { margin-top: 150px; }
            .fourzerofour { font-weight: bold; font-size: 200px; color: #2b542c }
        </style>
    </head>
    <body>
        <div class="col-md-8 col-md-offset-2 top">
            <div class="row text-center">
                <h1 class="text-danger">NO ACCESS!!!</h1>
                <br>
                <h4>Hi {{Auth::user()->name}},</h4>
                <p>You have not been assigned any role yet, so there isn't exactly anything for you to see.</p>
                <p>Reach out to your team/department head so you can get an assignment ASAP!</p>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                     Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }} 
                </form>
            </div>
        </div>
    </body>
</html>
