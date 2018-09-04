@extends('main')

@section('title', '- All Region Orders')

@section('stylesheets')
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('https://unpkg.com/flatpickr/dist/flatpickr.min.css') !!}
    {!! Html::style('css/parsley.css') !!}

    <style>
        .state-info {
            background-color: #00C851;
            margin-bottom: 10px;
            height: 110px;
        }
        .state-info a, .state-info a:active {
            color: black;
            text-decoration: underline;
            font-size: 15px;
            font-weight: bolder;
        }
        input[type="text"] {
            color: black;
        }
        input[type="text"][readonly="readonly"] {
            color: black;
        }
        .inputtext {
            height: 40px;
        }
        .inputbutton {
            height: 40px;
            margin-top: 0 !important;
        }
    </style>
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <div class="col-lg-9 col-md-6 col-xs-12 pull-right">
                <form class="form-inline" method="get" action="{{ route('stateorders') }}">
                    <div class="form-group">
                        <input type="text" name="date" placeholder="Select Date" class="inputtext flatpickr form-control">
                        <input type="submit" value="Display Regions Sales" class="btn btn-success inputbutton">
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="row details">
        <div class="col-xs-12">

            <h2 style="text-align: center; font-size: 30px;">Orders By Regions</h2>

            @foreach ($todayOrders as $order)
            <div class="col-sm-2 col-xs-3">
                <div class="col-xs-11 state-info">
                    <h4><a href="/orders/state/{{ $state[$order->state_id] }}">
                        {{ $state[$order->state_id] }}
                    </a></h4>
                    <ul class="list-unstyled">
                    <li><span style="font-weight: bolder;">Orders</span> : {{ $order->orders_count }}</li>
                    <li><span style="font-weight: bolder;">P.V</span> : {{ $order->total_sales }}</li>
                     </ul>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('https://unpkg.com/flatpickr') !!}

    <script>
        flatpickr(".flatpickr", {
            altInput: true
        });
    </script>
@endsection