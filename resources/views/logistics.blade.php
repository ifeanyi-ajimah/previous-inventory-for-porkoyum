<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logistics</title>

    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/input-material.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/component.css">
    <link rel="stylesheet" href="css/styles.css">

    <style>
        td .btn-custom{
            margin-left: 0;
        }
        .md-content{
            min-height: 300px;
        }
        #submit3{
            position: absolute;
            bottom: 25px;
            margin: 0 auto;
            left: 0;
            right: 0;
        }
        .md-content > div ul{
            padding: 0;
        }
    </style>

    <script src="js/modernizr.custom.js"></script>
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
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hello, Oladotun</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<section>
    <div class="col-xs-12 mag-10">
        <h2 class="text-center state">Logistics</h2>
    </div>
    <div class="col-sm-8 col-sm-offset-2 col-xs-12">
        <div class="">
            <table id="table" class="table">
                <thead>
                <tr>
                    <td></td>
                    <td>Order ID</td>
                    <td>Status</td>
                    <td>Change Status</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Order-1001</td>
                    <td>Delivered</td>
                    <td>
                        <button class="btn btn-success btn-custom btn-xs md-trigger" data-modal="change-stat"><span class="fa fa-arrow-right"></span></button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Order-1002</td>
                    <td>Delivered</td>
                    <td>
                        <button class="btn btn-success btn-custom btn-xs md-trigger" data-modal="change-stat"><span class="fa fa-arrow-right"></span></button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Order-1003</td>
                    <td>pending</td>
                    <td>
                        <button class="btn btn-success btn-custom btn-xs md-trigger" data-modal="change-stat"><span class="fa fa-arrow-right"></span></button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Order-1004</td>
                    <td>pending</td>
                    <td>
                        <button class="btn btn-success btn-custom btn-xs md-trigger" data-modal="change-stat"><span class="fa fa-arrow-right"></span></button>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Order-1005</td>
                    <td>pending</td>
                    <td>
                        <button class="btn btn-success btn-custom btn-xs md-trigger" data-modal="change-stat"><span class="fa fa-arrow-right"></span></button>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Order-1006</td>
                    <td>pending</td>
                    <td>
                        <button class="btn btn-success btn-custom btn-xs md-trigger" data-modal="change-stat"><span class="fa fa-arrow-right"></span></button>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Order-1007</td>
                    <td>pending</td>
                    <td>
                        <button class="btn btn-success btn-custom btn-xs md-trigger" data-modal="change-stat"><span class="fa fa-arrow-right"></span></button>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Order-1008</td>
                    <td>pending</td>
                    <td>
                        <button class="btn btn-success btn-custom btn-xs md-trigger" data-modal="change-stat"><span class="fa fa-arrow-right"></span></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>


<!--======MODALS SECTION ======-->
<section>
    <div class="md-modal md-effect-1" id="change-stat">
        <div class="md-content">
            <h3>Change Status
                <span class="x-close pull-right remove">
                    <span class="fa fa-remove md-close"></span>
                </span>
            </h3>
            <div>
                <form action="">

                    <div class="input-field col-xs-12 pad-0">
                        <label for="stat">Change Status</label>
                        <select name="" id="stat">
                            <option value="">Pending</option>
                            <option value="">Delivered</option>
                            <option value="">RETURNED</option>
                        </select>
                    </div>


                    <button class="btn btn-primary btn-custom md-close2" type="submit" id="submit3">Submit</button>

                </form>
            </div>
        </div>
    </div>

    <div class="md-overlay"></div>

</section>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/modalEffects.js"></script>

<script>
    //initialize material select
    $(document).ready(function() {
        $('select').material_select();
    });


</script>

</body>
</html>