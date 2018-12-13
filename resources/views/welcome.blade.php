<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inventory</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #171B1F;
                color: #fff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            body:before{
                background-image: url("img/03.png");
                content: ' ';
                display: block;
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                opacity: 0.3;
                background-repeat: no-repeat;
                background-position: 50% 0;
                background-size: cover;

            }


            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

           /* .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }*/

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a > button {
                background: #fff;
                padding: 6 15px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                color: #171B1F;
                font-family: inherit;
                height: 25px;
                border: none;
                border-radius: 0px;
                cursor: pointer;
                width: 120px;
            }
            .links > a > button:disabled{
                background: grey;
                cursor: not-allowed;
            }
            .links > a > .bd_1{
                border-radius: 10px 0px 0px 10px;
            }
            .links > a > .bd_2{
                border-radius: 0px 10px 10px 0px;
            }
            .m-b-md {
                margin-bottom: 5px;
            }
            .m-b-ml{
                margin-left: -2px;
            }
            .links > a > .db{
                width: 120px;
                height: 30px;
                border-radius: 3px;
            }
            img{
                width:20px;
                height: 20px;
                float: left;
                margin-top: -3px;
            }
            .links{
                width: 650px;
            }
            .visible-xs{
                display: none;
            }
            @media (max-width: 767px) {
                .hidden-xs{
                    display: none;
                }
                .visible-xs{
                    display: block;
                    float: left;
                }
                .links{
                    width: 100%;
                }
                .links > a > button{
                    width: 20%;
                }
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Inventory
                </div>

                @if (Route::has('login'))

                    <div class="top-right links">
                        @if (Auth::check())
                            <a href="{{ url('/dashboard') }}"><button class="db">Dashboard</button></a>
                        @else
                            <a href="{{ url('/login') }}" class="m-b-ml">
                                <button  class="bd_1 hidden-xs"><img src="img/Nigeria.ico" alt="ico">Nigeria</button>
                                <!--mobile--><button class="bd_1 visible-xs"><img src="img/Nigeria.ico" alt="ico">NIG</button></a><!--/mobile-->
                            <a href="{{ url('/login') }}" class="m-b-ml">
                                <button disabled class="hidden-xs"><img src="img/Ghana.ico" alt="ico">Ghana</button>
                            <!--mobile--> <button disabled class="visible-xs"><img src="img/Ghana.ico" alt="ico">GHN</button></a><!--/mobile-->
                            <a href="{{ url('/login') }}" class="m-b-ml">
                                <button disabled class="hidden-xs"><img src="img/Kenya.ico" alt="ico">Kenya</button>
                            <!--mobile--><button disabled class="visible-xs"><img src="img/Kenya.ico" alt="ico">KEN</button></a><!--/mobile-->
                            <a href="{{ url('/login') }}" class="m-b-ml">
                                <button disabled class="hidden-xs"><img src="img/UAE.ico" alt="ico">UAE</button>
                            <!--mobile--><button disabled class="visible-xs"><img src="img/UAE.ico" alt="ico">UAE</button></a><!--/mobile-->
                            <a href="{{ url('/login') }}" class="m-b-ml">
                                <button disabled class="bd_2 hidden-xs"><img src="img/Cote d'Ivoire.ico" alt="">Ivory...</button>
                            <!--mobile--><button disabled class="bd_2 visible-xs"><img src="img/Cote d'Ivoire.ico" alt="">CDI</button></a><!--/mobile-->
                        <!--<a href="{{ url('/register') }}">Register</a>-->
                        @endif
                    </div>
                @endif
                {{--<div class="links">--}}
                    {{--<a href="https://laravel.com/docs">Documentation</a>--}}
                    {{--<a href="https://laracasts.com">Laracasts</a>--}}
                    {{--<a href="https://laravel-news.com">News</a>--}}
                    {{--<a href="https://forge.laravel.com">Forge</a>--}}
                    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
                {{--</div>--}}
            </div>
        </div>
    </body>
</html>
