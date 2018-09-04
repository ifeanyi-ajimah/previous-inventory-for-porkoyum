@extends('main')

@section('title', '- Dashboard')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/mdb.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('https://unpkg.com/flatpickr/dist/flatpickr.min.css') !!}
    {!! Html::style('css/compiled.css') !!}
    {!! Html::style('css/input-material.css') !!}


    <style>
        .typeahead { margin-bottom: 5px; }
        .twitter-typeahead{  width: 96.1%; }
        .scroll {  height: 300px; overflow-y: hidden; }
        .result {  width: 100%; margin-bottom: 5px; height: 20px; padding: 5px; }
        .result a { text-decoration: none; }
        .nav-tabs > li > a{ width: 90px; text-align: center; }

        .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
            color: #fff;
            background-color: gray;
            width: 180px;
            text-align: center;
        }
        .navbar-default .navbar-nav > .open:nth-child(2) > a, .navbar-default .navbar-nav > .open:nth-child(2) > a:focus, .navbar-default .navbar-nav > .open:nth-child(2) > a:hover {
            color: #fff;
            background-color: gray;
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
        input[type=text]:not(.browser-default){
            color: lightgray;
            font-size: 1rem;
        }
        .modal-body input[type=text]:not(.browser-default) {
            color: black;
        }
        .modal-footer button{
            padding: 3px 15px;
        }
        .modal-footer{
            padding: 0;
        }
        .modal-body {
            margin: 0px 0 20px;
        }
        .modal-title{
            font-weight: bold;
        }
        .modal-body button.close{
            font-size: 30px;
            font-weight: 200;
            background: black;
            width: 30px;
            height: 30px;
            line-height: 0;
            border-radius: 50%;
            padding-bottom: 10px;
        }
        .caret{
            border: none;
        }
        .glyphicon-comment{
            cursor: pointer;
        }
        /*.tooltip .tooltip-inner{
            font-size: 12px;
        }*/
        .select-wrapper input.select-dropdown{
            height: 2rem;
        }
        .table > tbody > tr > td{
            line-height: 2.6;
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
        @media (min-width: 1200px) {
            .md-form{
                margin-left: 6.5%;
            }
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
        .dataTables_length{
            display: none;
        }
        .dataTables_filter.input-field label{
            position: relative;
            top: 0;
            width: 100%;
            padding: 0;
        }
        .input-field input[type="search"]{
            padding: 0;
            font-size: 16px;
        }
        .input-field input[type="search"]:focus {
            background: transparent;
            color: white;
        }
        .row{
            margin-left: 0;
        }
    </style>
@endsection


@section('content')

    {{--<div class="row">--}}
        <div class="col-lg-7 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12 offset">
            <div class="md-form">
                <!--<input id="search" type="text" name="customername" class="typeahead inputtext form-control" autocomplete="off" placeholder="Search">-->
            </div>
            <!-- <div id="results" class=""></div> -->
        </div>
    {{--</div>--}}

    {{--<div class="row">--}}
        <!-- <div class="col-lg-4 col-md-6 col-xs-12 pull-right sbtn">
            <form class="form-inline" method="get" action="{{ route('orders.searchbydate') }}">
                <div class="form-group" style="margin-left: 45px;">
                    <div class="search-btn"><input type="submit" value="Search" class="btn btn-success pull-right inputbutton"></div>
                    <input type="text" name="date" placeholder="Search Orders By Date" class="pull-right inputtext flatpickr form-control">
                </div>
            </form>
        </div> -->
    {{--</div>--}}

    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">
            <div class="row">
                <ul class="">
                    <li class="active">
                        <a data-toggle="tab" href="#unverified" id="unverify">
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <div class="media-body media-right">
                                                <h2 class="media-heading">Unverified Orders</h2></strong>
                                                <h4><strong>Amount: </strong>&#8373; {{ number_format($unverifiedOrders->sum('value')) }}</h4>
                                                <h4><strong>Quantity: </strong>{{ $unverifiedOrders->sum('quantity') }} </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#pending" id="pend">
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <div class="media-body media-right">
                                                <h2 class="media-heading">Pending Orders</h2></strong>
                                                <h4><strong>Amount: </strong>&#8373; {{ number_format($pendingOrders->sum('value')) }}</h4>
                                                <h4><strong>Quantity: </strong>{{ $pendingOrders->sum('quantity') }} </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#cancelled" id="cancel">
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <div class="media-body media-right">
                                                <h2 class="media-heading">Cancelled Orders</h2></strong>
                                                <h4><strong>Amount: </strong>&#8373; {{ number_format($cancelledOrders->sum('value')) }}</h4>
                                                <h4><strong>Quantity: </strong>{{ $cancelledOrders->sum('quantity') }} </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#delivered" id="deliver">
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <div class="media-body media-right">
                                                <h2 class="media-heading">Delivered Orders</h2></strong>
                                                <h4><strong>Amount: </strong>&#8373; {{ number_format($deliveredOrders->sum('value')) }}</h4>
                                                <h4><strong>Quantity: </strong>{{ $deliveredOrders->sum('quantity') }} </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>

            </div>

            <div class="row">
                <div class="tab-content" style="min-height: 400px">
                    <div id="unverified" class="tab-pane fade in active">
                        <div class="col-xs-12 col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Unverified Orders</h3>
                                    <table class="table table-responsive" id="searcher1">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Cost</th>
                                                <th>Customer</th>
                                                <th>Phone</th>
                                                <th>Time</th>
                                                <th>Region</th>
                                                <th>Comment</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($unverifiedOrders->latest()->get() as $order)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $order->product->product_name }}</td>
                                                    <td>{{ $order->quantity }}</td>
                                                    <td>&#8373; {{ number_format($order->value) }}</td>
                                                    <td>{{ $order->customer->name }}</td>
                                                    <td>{{ $order->customer->phone_no }}</td>
                                                    <td>{{ $order->created_at->diffForHumans() }}</td>
                                                    <td>{{ $order->state->name }}</td>
                                                    <td><i class="glyphicon glyphicon-comment"  data-tooltip title="{{$order->comment}}"></i></td>
                                                    <td><select class="actions md-trigger" name="actions" data-id="{{$order->id}}">
                                                            <option>-- Select an option --</option>
                                                            <option value="comment">Add a Comment</option>
                                                            <option value="cancel">Cancel</option>
                                                            <option value="verify">Verify</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div id="pending" class="tab-pane fade">

                        <div class="col-xs-12 col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Pending Orders</h3>
                                    <table class="table table-responsive" id="searcher2">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Cost</th>
                                                <th>Customer</th>
                                                <th>Phone</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pendingOrders->latest()->get() as $order)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $order->product->product_name }}</td>
                                                    <td>{{ $order->quantity }}</td>
                                                    <td>&#8373; {{ number_format($order->value) }}</td>
                                                    <td>{{ $order->customer->name }}</td>
                                                    <td>{{ $order->customer->phone_no }}</td>
                                                    <td>{{ $order->created_at->diffForHumans() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div id="cancelled" class="tab-pane fade">

                        <div class="col-xs-12 col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Cancelled Orders</h3>
                                    <table class="table table-responsive" id="searcher3">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Cost</th>
                                                <th>Customer</th>
                                                <th>Phone</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cancelledOrders->latest()->get() as $order)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $order->product->product_name }}</td>
                                                    <td>{{ $order->quantity }}</td>
                                                    <td>&#8373; {{ number_format($order->value) }}</td>
                                                    <td>{{ $order->customer->name }}</td>
                                                    <td>{{ $order->customer->phone_no }}</td>
                                                    <td>{{ $order->created_at->diffForHumans() }}</td>
                                                    <td class="text-muted">{{ $order->confirmed? "Confirmed" : "Not confirmed" }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div id="delivered" class="tab-pane fade">

                        <div class="col-xs-12 col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Delivered Orders</h3>
                                    <table class="table table-responsive" id="searcher4">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Cost</th>
                                                <th>Customer</th>
                                                <th>Phone</th>
                                                <th>Date</th>
                                                <th>Confirmed</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($deliveredOrders->latest()->get() as $order)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $order->product->product_name }}</td>
                                                    <td>{{ $order->quantity }}</td>
                                                    <td>&#8373; {{ number_format($order->value) }}</td>
                                                    <td>{{ $order->customer->name }}</td>
                                                    <td>{{ $order->customer->phone_no }}</td>
                                                    <td>{{ $order->created_at->diffForHumans() }}</td>
                                                    <td class="text-muted">{{ $order->confirmed? "Confirmed" : "Not confirmed" }}</td>
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
    <button class="hide" id="call-modal" data-toggle="modal" data-target="#add-comment"></button>
    <div id="add-comment" class="modal fade" role="dialog" style="color: #000;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">What comment do you have?</h4>
                </div>
                <div class="modal-body" style="height: 100px;">
                    <form id="comment" action="" method="post">
                        {{csrf_field()}}
                        <div class="input-field col-xs-12 pad-0">
                            <input type="text" name="comment" placeholder="Your Comment Here">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-custom submit-comment" data-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    {!! Html::script('js/mdb.js') !!}
    {!! Html::script('js/materialize.min.js') !!}
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('https://unpkg.com/flatpickr') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js') !!}
    {!! Html::script('js/datatables.js') !!}

    <!-- {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js') !!} -->

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $('#searcher1, #searcher2, #searcher3, #searcher4').DataTable();
            $(".dataTables_filter").addClass("input-field").appendTo(".md-form");
            $('#searcher1_filter').show();
            $('#searcher2_filter').hide();
            $('#searcher3_filter').hide();
            $('#searcher4_filter').hide();
        });

        $("#unverify").click(function(){
            $('#searcher1_filter').show();
            $('#searcher2_filter').hide();
            $('#searcher3_filter').hide();
            $('#searcher4_filter').hide();
        });
        $("#pend").click(function(){
            $('#searcher1_filter').hide();
            $('#searcher2_filter').show();
            $('#searcher3_filter').hide();
            $('#searcher4_filter').hide();
        });
        $("#cancel").click(function(){
            $('#searcher1_filter').hide();
            $('#searcher2_filter').hide();
            $('#searcher3_filter').show();
            $('#searcher4_filter').hide();
        });
        $("#deliver").click(function(){
            $('#searcher1_filter').hide();
            $('#searcher2_filter').hide();
            $('#searcher3_filter').hide();
            $('#searcher4_filter').show();
        });
    </script>
    <script>
        $(document).on('touchstart.dropdown.data-api', '.dropdown-submenu > a', function (event) {
            event.preventDefault();
        });

        //initialize material select
        $(document).ready(function() {
            $('select').material_select();
        });

        $('.submit-comment').click(function(){
            $('#comment').submit()
        })
        $('.actions').change(function(){
            var formAction = $(this).attr('data-id')
            switch($(this).val()){
                case "cancel":
                    formAction = "/cancel-order/"+formAction;
                    break;
                case "verify":
                    formAction = "/verify-order/"+formAction;
                    break;
                default :
                    formAction = "/comment-on-order/"+formAction;
                    break;
            }
            $('#comment').attr('action', formAction)
            $('#call-modal').click()
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
                    url: '/api/search?customername=%QUERY%',
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