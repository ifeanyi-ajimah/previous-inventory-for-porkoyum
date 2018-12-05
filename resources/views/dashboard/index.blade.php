@extends('main')

@section('title', '- Dashboard')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/mdb.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('https://unpkg.com/flatpickr/dist/flatpickr.min.css') !!}
    {!! Html::style('css/compiled.css') !!}

    <style>
        .typeahead { margin-bottom: 5px; }
        .twitter-typeahead{  width: 96.1%; }
        .scroll {  height: 300px; overflow-y: hidden; }
        .result {  width: 100%; margin-bottom: 5px; height: 20px; padding: 5px; }
        .result a { text-decoration: none; }
        .nav-tabs > li > a{ width: 90px; text-align: center; }

        .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
            color: #fff;
            background-color: #3b3f4c;
            width: 180px;
            text-align: center;
        }
        .navbar-default .navbar-nav > .open:nth-child(2) > a, .navbar-default .navbar-nav > .open:nth-child(2) > a:focus, .navbar-default .navbar-nav > .open:nth-child(2) > a:hover {
            color: #fff;
            background-color: #3b3f4c;
            width: 232px;
            text-align: center;
        }
        .navbar-default .navbar-nav > .open:nth-child(3) > a, .navbar-default .navbar-nav > .open:nth-child(3) > a:focus, .navbar-default .navbar-nav > .open:nth-child(3) > a:hover {
            color: #fff;
            background-color: gray;
            width: 198px;
            text-align: center;
        }
        .navbar-default .navbar-nav > .open:nth-child(4) > a, .navbar-default .navbar-nav > .open:nth-child(4) > a:focus, .navbar-default .navbar-nav > .open:nth-child(4) > a:hover {
            color: #fff;
            background-color: gray;
            width: 212px;
            text-align: center;
        }
        .po{ padding: 0; }
        .offset{ margin-left: 5.8% !important; }
        @media (min-width: 1200px) {
            .container{
                width: 95%;
            }
        }
        @media screen and (-webkit-min-device-pixel-ratio:0)
        and (min-resolution:.001dpcm) {
            .form-inline .form-group{margin-left: 27px !important;}
        }
        .panel-heading{ height: 110px; }
        .media-body{ color: #000000; text-align: right; }
        .media-body h2{ font-size: 1.2rem; }
        .media-body>h4:nth-child(3) { margin-top: -8px; }
        @media (min-width: 787px) {
            .search-btn{width: 40%; float: right; }
            .flatpickr.inputtext{ float: left !important; }
        }
        @media (max-width: 767px) {
            .flatpickr.inputtext{ width: 63%; }
            .search-btn input{ margin: 0; margin-left: 5px}
            .form-group{margin: 0 !important;}
            .offset{ margin: 0 !important; padding: 0; }
            .sbtn{ padding-left: 0;}
            .nav-tabs > li > a { width: inherit; padding: 8px 12px; }
            .row{ margin-bottom: 40px}
            .h5down{ top: 83px; position: absolute; right: 0;}
        }
    </style>
@endsection


@section('content')

    {{--<div class="row">--}}
        <div class="col-lg-7 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12 offset">
            <div class="md-form">
                <input id="search" type="text" name="customername" class="typeahead inputtext form-control" autocomplete="off" placeholder="Search">
            </div>
            <!-- <div id="results" class=""></div> -->
        </div>
    {{--</div>--}}

    {{--<div class="row">--}}
        <div class="col-lg-4 col-md-6 col-xs-12 pull-right sbtn">
            <form class="form-inline" method="get" action="{{ route('orders.searchbydate') }}">
                <div class="form-group" style="margin-left: 45px;">
                    <div class="search-btn"><input type="submit" value="Search" class="btn btn-success pull-right inputbutton"></div>
                    <input type="text" name="date" placeholder="Search Orders By Date" class="pull-right inputtext flatpickr form-control">
                </div>
            </form>
        </div>
    {{--</div>--}}

    <div class="row details">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">
           {{-- <h5 style="margin-left: -15px;">
                Welcome, {{ Auth::user()->name }} (<strong>{{ Auth::user()->roles->first()->name }}</strong>)
            </h5>--}}
            <hr/>


            <div class="row">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#today">Today</a></li>
                    <li><a data-toggle="tab" href="#yesterday">Yesterday</a></li>
                    <li><a data-toggle="tab" href="#week">Week</a></li>
                    <li><a data-toggle="tab" href="#month">Month</a></li>
                    <li><a data-toggle="tab" href="#year">Year</a></li>
                </ul>

            </div>

            <div class="row details noborder nopadding">
                <div class="tab-content">

                    <div id="today" class="tab-pane fade in active">

                        @foreach($todayOrders as $order)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="panel panel-{{ $dc[$order->product_id] }}">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/{{ $img[$order->product_id] }}" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body media-right">
                                                <h2 class="media-heading">{{ $pcs[$order->product_id] }}</h2></strong>
                                                <h4>&#8358; {{ number_format($order->total_sales) }} PV</h4>
                                                <h4>{{ $order->orders_count }} Orders</h4>
                                                {{--<h4>{{ $order->confirmed_orders }} Confirmed Orders</h4>--}}
                                                {{--<h4>34 Confirmed Orders</h4>--}}
                                                {{--N0 Amount Paid--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a href="/products/{{ $pcs[$order->product_id] }}/orders?date=today">View Details</a>
                                        <span class="glyphicon glyphicon-arrow-right pull-right"></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-xs-12 po">
                            <div class="row">
                                <div class="col-md-5 scroll">
                                    <h3>Data Entries</h3>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Orders</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usersOrdersToday as $usersOrder)
                                                @isset($users[$usersOrder->created_by])
                                                <tr>
                                                    <td>{{ $users[$usersOrder->created_by] }}</td>
                                                    <td>{{ $usersOrder->orders_count }}</td>
                                                    <td>&#8358; {{ number_format($usersOrder->total_sales) }}</td>
                                                </tr>
                                                @endisset
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-7 scroll">
                                    <h3>Comms Reps</h3>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Orders</th>
                                                <!-- <th>Product Category</th> -->
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($comms as $comm)
                                                <tr>
                                                    <td>{{ $commsrep[$comm->id] }}</td>
                                                    <td>{{ $comm->orders_count }}</td>

                                                    <td>&#8358; {{ number_format($comm->total_sales) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div id="yesterday" class="tab-pane fade">

                        @foreach ($yesterdayOrders as $order)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="panel panel-{{ $dc[$order->product_id] }}">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/{{ $img[$order->product_id] }}" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body media-right">
                                                <h2 class="media-heading">{{ $pcs[$order->product_id] }}</h2></strong>
                                                <h4>&#8358; {{ number_format($order->total_sales) }} PV</h4>
                                                <h4>{{ $order->orders_count }} Orders</h4>
                                                {{--<h4>{{ $order->confirmed_orders }} Confirmed Orders</h4>--}}
                                                {{--<h4>34 Confirmed Orders</h4>--}}
                                                {{--N0 Amount Paid--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a href="/products/{{ $pcs[$order->product_id] }}/orders?date=yesterday">View Details</a>
                                        <span class="glyphicon glyphicon-arrow-right pull-right"></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                            <div class="col-xs-12 po">
                                <div class="row">
                                    <div class="col-md-5">
                                        <h3>Data Entries</h3>
                                        <table class="table table-responsive">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Orders</th>
                                                <th>Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($usersOrdersYesterday as $usersOrder)
                                                @isset($users[$usersOrder->created_by])
                                                <tr>
                                                    <td>{{ $users[$usersOrder->created_by] }}</td>
                                                    <td>{{ $usersOrder->orders_count }}</td>
                                                    <td>&#8358; {{ number_format($usersOrder->total_sales) }}</td>
                                                </tr>
                                                @endisset
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-7 scroll">
                                        <h3>Comms Reps</h3>
                                        <table class="table table-responsive">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Orders</th>
                                                <!-- <th>Product Category</th> -->
                                                <th>Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($commsYesterday as $comm)
                                                <tr>
                                                    <td>{{ $commsrep[$comm->id] }}</td>
                                                    <td>{{ $comm->orders_count }}</td>

                                                    <td>&#8358; {{ number_format($comm->total_sales) }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                    </div>

                    <div id="week" class="tab-pane fade">

                        @foreach($weekOrders as $order)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="panel panel-{{ $dc[$order->product_id] }}">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/{{ $img[$order->product_id] }}" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body media-right">
                                                <h2 class="media-heading">{{ $pcs[$order->product_id] }}</h2></strong>
                                                <h4>&#8358; {{ number_format($order->total_sales) }} PV</h4>
                                                <h4>{{ $order->orders_count }} Orders</h4>
                                                {{--<h4>{{ $order->confirmed_orders }} Confirmed Orders</h4>--}}
                                                {{--<h4>34 Confirmed Orders</h4>--}}
                                                {{--N0 Amount Paid--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a href="/products/{{ $pcs[$order->product_id] }}/orders">View Details</a>
                                        <span class="glyphicon glyphicon-arrow-right pull-right"></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                            <div class="col-xs-12 po">
                                <div class="row">
                                    <div class="col-md-5">
                                        <h3>Data Entries</h3>
                                        <table class="table table-responsive">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Orders</th>
                                                <th>Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($usersOrdersWeek as $usersOrder)
                                                @isset($users[$usersOrder->created_by])
                                                <tr>
                                                    <td>{{ $users[$usersOrder->created_by] }}</td>
                                                    <td>{{ $usersOrder->orders_count }}</td>
                                                    <td>&#8358; {{ number_format($usersOrder->total_sales) }}</td>
                                                </tr>
                                                @endisset
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-7 scroll">
                                        <h3>Comms Reps</h3>
                                        <table class="table table-responsive">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Orders</th>
                                                <!-- <th>Product Category</th> -->
                                                <th>Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($commsWeek as $comm)
                                                <tr>
                                                    <td>{{ $commsrep[$comm->id] }}</td>
                                                    <td>{{ $comm->orders_count }}</td>

                                                    <td>&#8358; {{ number_format($comm->total_sales) }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                    </div>

                    <div id="month" class="tab-pane fade">

                        @foreach($monthOrders as $order)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="panel panel-{{ $dc[$order->product_id] }}">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/{{ $img[$order->product_id] }}" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body media-right">
                                                <h2 class="media-heading">{{ $pcs[$order->product_id] }}</h2></strong>
                                                <h4>&#8358; {{ number_format($order->total_sales) }} PV</h4>
                                                <h4>{{ $order->orders_count }} Orders</h4>
                                                {{--<h4>{{ $order->confirmed_orders }} Confirmed Orders</h4>--}}
                                                {{--<h4>34 Confirmed Orders</h4>--}}
                                                {{--N0 Amount Paid--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a href="/products/{{ $pcs[$order->product_id] }}/orders">View Details</a>
                                        <span class="glyphicon glyphicon-arrow-right pull-right"></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-xs-12 po">
                            <div class="row">
                                <div class="col-md-5">
                                    <h3>Data Entries</h3>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Orders</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usersOrdersMonth as $usersOrder)
                                                @isset($users[$usersOrder->created_by])
                                                <tr>
                                                    <td>{{ $users[$usersOrder->created_by] }}</td>
                                                    <td>{{ $usersOrder->orders_count }}</td>
                                                    <td>&#8358; {{ number_format($usersOrder->total_sales) }}</td>
                                                </tr>
                                                @endisset
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-7 scroll">
                                    <h3>Comms Reps</h3>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Orders</th>
                                                <!-- <th>Product Category</th> -->
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($commsMonth as $comm)
                                                <tr>
                                                    <td>{{ $commsrep[$comm->id] }}</td>
                                                    <td>{{ $comm->orders_count }}</td>

                                                    <td>&#8358; {{ number_format($comm->total_sales) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div id="year" class="tab-pane fade">

                        @foreach($yearOrders as $order)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="panel panel-{{ $dc[$order->product_id] }}">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/{{ $img[$order->product_id] }}" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body media-right">
                                                <h2 class="media-heading">{{ $pcs[$order->product_id] }}</h2></strong>
                                                <h4>&#8358; {{ number_format($order->total_sales) }} PV</h4>
                                                <h4>{{ $order->orders_count }} Orders</h4>
                                                {{--<h4>{{ $order->confirmed_orders }} Confirmed Orders</h4>--}}
                                                {{--<h4>34 Confirmed Orders</h4>--}}
                                                {{--N0 Amount Paid--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a href="/products/{{ $pcs[$order->product_id] }}/orders">View Details</a>
                                        <span class="glyphicon glyphicon-arrow-right pull-right"></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-xs-12 po">
                            <div class="row">
                                <div class="col-md-5 scroll">
                                    <h3>Data Entries</h3>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Orders</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usersOrdersYear as $usersOrder)
                                                @isset($users[$usersOrder->created_by])
                                                <tr>
                                                    <td>{{ $users[$usersOrder->created_by] }}</td>
                                                    <td>{{ $usersOrder->orders_count }}</td>
                                                    <td>&#8358; {{ number_format($usersOrder->total_sales) }}</td>
                                                </tr>
                                                @endisset
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-7 scroll">
                                    <h3>Comms Reps</h3>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Orders</th>
                                                <!-- <th>Product Category</th> -->
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($commsYear as $comm)
                                                <tr>
                                                    <td>{{ $commsrep[$comm->id] }}</td>
                                                    <td>{{ $comm->orders_count }}</td>

                                                    <td>&#8358; {{ number_format($comm->total_sales) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    {!! Html::script('js/mdb.js') !!}
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('https://unpkg.com/flatpickr') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js') !!}
    <!-- {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js') !!} -->

    <script>
        $(document).on('touchstart.dropdown.data-api', '.dropdown-submenu > a', function (event) {
            event.preventDefault();
        });
    </script>
    <script>
        flatpickr(".flatpickr", {
            altInput: true
        });

        jQuery(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var engine = new Bloodhound({
                remote: {
                    url: '/api/customers/search?customername=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $('.typeahead').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                source: engine.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'customers',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">No Customer found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        return '<a href="customers/' + data.id + '" target="_blank" class="list-group-item">' + data.name + '</a>'
                    }
                }
            });
        });


    </script>

@endsection
