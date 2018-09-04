<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>account-summary</title>

    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <script src="js/modernizr.custom.js"></script>

    <style>
        .state-block, .state-block:hover {
            color: white;
            width: initial;
            border: 1px solid transparent;
            margin-bottom: 5px;
        }
        .state-block h3 {
            padding: 20px 5px;
            margin-top: 10px;
        }
        .state-block a, .state-block a:focus, .state-block a:hover, .nav-pills a, .nav-pills > li.active > a,
        .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
            color: #ffffff;
            outline: none;
        }
        .header h1{
            margin-top: 5px;
        }
        .state-block:first-child h3{
            margin-top: 0;
        }
        .state-block.active{
            border: 1.5px solid greenyellow;
        }
        .state-nav{
            height: auto;
            max-height: 90vh;
            overflow: auto;
        }
        .panel-group .panel{
            color: black;
            border-radius: 2px;
            margin: 10px 0;
        }
        .panel-footer button{
            font-weight: 100;
            letter-spacing: 1px;
            border-radius: 1.2px;
        }
        .h4.pull-right{
            letter-spacing: 0;
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
        }
        @media (min-width: 768px) {
            .state-nav{
                position: fixed;
            }
        }

    </style>
</head>

<body class="inverse">

<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="#">WebSiteName</a>-->
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hello, Lagos</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="col-xs-12">

        <!--==== State Navigation ====-->
        <div class="col-xs-12 col-sm-3 pad-0">
            <ul class="state-nav col-sm-3">

                <li class="state-block active">
                    <a href="#lagos" data-toggle="pill">
                        <h3>
                            <span class="state-name">Lagos</span>
                            <span class="state-num"> <span>&#8373;</span>12,000,000</span>
                        </h3>
                    </a>
                </li>
                <li class=" state-block">
                    <a href="#abia" data-toggle="pill">
                        <h3>
                            <span class="state-name">Abia</span>
                            <span class="state-num"> <span>&#8373;</span>200,000</span>
                        </h3>
                    </a>
                </li>
                <li class="state-block">
                    <a href="#menu2" data-toggle="pill">
                        <h3>
                            <span class="state-name">Yola</span>
                            <span class="state-num"> <span>&#8373;</span>50,000</span>
                        </h3>
                    </a>
                </li>
                <li class="state-block">
                    <a href="">
                        <h3>
                            <span class="state-name">Delta</span>
                            <span class="state-num"> <span>&#8373;</span>30,000</span>
                        </h3>
                    </a>
                </li>
                <li class=" state-block">
                    <a href="">
                        <h3>
                            <span class="state-name">Lagos</span>
                            <span class="state-num"> <span>&#8373;</span>12,000,000</span>
                        </h3>
                    </a>
                </li>
                <li class=" state-block">
                    <a href="">
                        <h3>
                            <span class="state-name">Abia</span>
                            <span class="state-num"> <span>&#8373;</span>200,000</span>
                        </h3>
                    </a>
                </li>
                <li class="state-block">
                    <a href="">
                        <h3>
                            <span class="state-name">Yola</span>
                            <span class="state-num"> <span>&#8373;</span>50,000</span>
                        </h3>
                    </a>
                </li>
                <li class="state-block">
                    <a href="">
                        <h3>
                            <span class="state-name">Delta</span>
                            <span class="state-num"> <span>&#8373;</span>30,000</span>
                        </h3>
                    </a>
                </li>
                <li class=" state-block">
                    <a href="">
                        <h3>
                            <span class="state-name">Lagos</span>
                            <span class="state-num"> <span>&#8373;</span>12,000,000</span>
                        </h3>
                    </a>
                </li>
                <li class=" state-block">
                    <a href="">
                        <h3>
                            <span class="state-name">Abia</span>
                            <span class="state-num"> <span>&#8373;</span>200,000</span>
                        </h3>
                    </a>
                </li>
                <li class="state-block">
                    <a href="">
                        <h3>
                            <span class="state-name">Yola</span>
                            <span class="state-num"> <span>&#8373;</span>50,000</span>
                        </h3>
                    </a>
                </li>
                <li class="state-block">
                    <a href="">
                        <h3>
                            <span class="state-name">Delta</span>
                            <span class="state-num"> <span>&#8373;</span>30,000</span>
                        </h3>
                    </a>
                </li>

            </ul>
        </div>

        <div class="col-xs-12 col-sm-9">


            <div class="tab-content">
                <div id="lagos" class="tab-pane fade in active">

                    <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="pill" href="#today">Today</a></li>
                        <li><a data-toggle="pill" href="#yesterday">Yesterday</a></li>
                        <li><a data-toggle="pill" href="#week">Week</a></li>
                        <li><a data-toggle="pill" href="#month">Month</a></li>
                        <li><a data-toggle="pill" href="#year">Year</a></li>
                    </ul>

                    <div class="header">
                        <h1 class="text-center">Total Confirmed Orders (<b>Lagos</b>)</h1>
                    </div>

                    <div class="tab-content">
                        <div id="today" class="tab-pane fade in active">
                            <div class="col-xs-12"><h3 class="col-xs-12">Today</h3></div>
                            <div class="panel-group col-xs-12">

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="yesterday" class="tab-pane fade">
                            <div class="col-xs-12"><h3 class="col-xs-12">Yesterday</h3></div>
                            <div class="panel-group col-xs-12">

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="week" class="tab-pane fade">
                            <div class="col-xs-12"><h3 class="col-xs-12">Week</h3></div>
                            <div class="panel-group col-xs-12">

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="month" class="tab-pane fade">
                            <div class="col-xs-12"><h3 class="col-xs-12">Month</h3></div>
                            <div class="panel-group col-xs-12">

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="year" class="tab-pane fade">
                            <div class="col-xs-12"><h3 class="col-xs-12">Year</h3></div>
                            <div class="panel-group col-xs-12">

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div id="abia" class="tab-pane fade">

                    <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="pill" href="#today1">Today</a></li>
                        <li><a data-toggle="pill" href="#yesterday1">Yesterday</a></li>
                        <li><a data-toggle="pill" href="#week1">Week</a></li>
                        <li><a data-toggle="pill" href="#month1">Month</a></li>
                        <li><a data-toggle="pill" href="#year1">Year</a></li>
                    </ul>

                    <div class="header">
                        <h1 class="text-center">Total Confirmed Orders (<b>Abia</b>)</h1>
                    </div>

                    <div class="tab-content">
                        <div id="today1" class="tab-pane fade in active">
                            <div class="col-xs-12"><h3 class="col-xs-12">Today</h3></div>
                            <div class="panel-group col-xs-12">

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="yesterday1" class="tab-pane fade">
                            <div class="col-xs-12"><h3 class="col-xs-12">Yesterday</h3></div>
                            <div class="panel-group col-xs-12">

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="week1" class="tab-pane fade">
                            <div class="col-xs-12"><h3 class="col-xs-12">Week</h3></div>
                            <div class="panel-group col-xs-12">

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="month1" class="tab-pane fade">
                            <div class="col-xs-12"><h3 class="col-xs-12">Month</h3></div>
                            <div class="panel-group col-xs-12">

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="year1" class="tab-pane fade">
                            <div class="col-xs-12"><h3 class="col-xs-12">Year</h3></div>
                            <div class="panel-group col-xs-12">

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">100</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">80</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>Moolato</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">110</span></p>
                                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--=== Lagos ===-->
            <!--<div class="panel-group col-xs-12" id="lagos">

                <div class="col-xs-4 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                        <div class="panel-body">
                            <p>QTY: <span class="h4 pull-right">100</span></p>
                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                        <div class="panel-body">
                            <p>QTY: <span class="h4 pull-right">80</span></p>
                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Moolato</b></div>
                        <div class="panel-body">
                            <p>QTY: <span class="h4 pull-right">110</span></p>
                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                        <div class="panel-body">
                            <p>QTY: <span class="h4 pull-right">100</span></p>
                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                        <div class="panel-body">
                            <p>QTY: <span class="h4 pull-right">80</span></p>
                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Moolato</b></div>
                        <div class="panel-body">
                            <p>QTY: <span class="h4 pull-right">110</span></p>
                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                        <div class="panel-body">
                            <p>QTY: <span class="h4 pull-right">100</span></p>
                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                        <div class="panel-body">
                            <p>QTY: <span class="h4 pull-right">80</span></p>
                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Moolato</b></div>
                        <div class="panel-body">
                            <p>QTY: <span class="h4 pull-right">110</span></p>
                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Flattummy</b></div>
                        <div class="panel-body">
                            <p>QTY: <span class="h4 pull-right">100</span></p>
                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Slim Tea</b></div>
                        <div class="panel-body">
                            <p>QTY: <span class="h4 pull-right">80</span></p>
                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Moolato</b></div>
                        <div class="panel-body">
                            <p>QTY: <span class="h4 pull-right">110</span></p>
                            <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                        </div>
                    </div>
                </div>

            </div>-->

            <!--=== Abia ===-->
            <!--<div class="panel-group col-xs-12" id="abia">

            <div class="col-xs-4 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><b>Flattummy</b></div>
                    <div class="panel-body">
                        <p>QTY: <span class="h4 pull-right">100</span></p>
                        <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                    </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><b>Slim Tea</b></div>
                    <div class="panel-body">
                        <p>QTY: <span class="h4 pull-right">80</span></p>
                        <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                    </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><b>Moolato</b></div>
                    <div class="panel-body">
                        <p>QTY: <span class="h4 pull-right">110</span></p>
                        <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                    </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><b>Flattummy</b></div>
                    <div class="panel-body">
                        <p>QTY: <span class="h4 pull-right">100</span></p>
                        <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                    </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><b>Slim Tea</b></div>
                    <div class="panel-body">
                        <p>QTY: <span class="h4 pull-right">80</span></p>
                        <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                    </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><b>Slim Tea</b></div>
                    <div class="panel-body">
                        <p>QTY: <span class="h4 pull-right">80</span></p>
                        <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                    </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><b>Moolato</b></div>
                    <div class="panel-body">
                        <p>QTY: <span class="h4 pull-right">110</span></p>
                        <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                    </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><b>Flattummy</b></div>
                    <div class="panel-body">
                        <p>QTY: <span class="h4 pull-right">100</span></p>
                        <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,500,000</span></p>
                    </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><b>Slim Tea</b></div>
                    <div class="panel-body">
                        <p>QTY: <span class="h4 pull-right">80</span></p>
                        <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>120,000</span></p>
                    </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><b>Moolato</b></div>
                    <div class="panel-body">
                        <p>QTY: <span class="h4 pull-right">110</span></p>
                        <p>Value: <span class="h4 pull-right"> <span>&#8373;</span>1,100,000</span></p>
                    </div>
                </div>
            </div>

        </div>-->
        </div>
    </div>
</main>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/materialize.min.js"></script>

</body>
</html>