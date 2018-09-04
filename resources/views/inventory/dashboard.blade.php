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

                <div class="top-right links">
                    <a href="{{ url('/inventory/accra') }}"><button class="db">Accra</button></a>
                    <a href="{{ url('/inventory/regions') }}"><button class="db">Other Regions</button></a>
                </div>
            </div>
        </div>
    </body>
</html>
