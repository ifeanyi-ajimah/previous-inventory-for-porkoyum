@extends('main')

@section('title', '- Deliveries')

@section('stylesheets')
    {!! Html::style('css/mdb.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/input-material.css') !!}
    <style>
        .modal-body{
            color: black;
        }
        .modal-body table{
            margin: 0 auto;
        }
        .modal-body td{
            padding: 5px;
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

{{--{!! Charts::assets() !!}--}}

@section('content')

    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <h2 class="text-center state">All Sales</h2>
            <div class="tab">
                <table class="table table-responsive table-bordered text-center" id="searcher">
                    <thead>
                    <tr>
                        <td></td>
                        <td>Product</td>
                        <td>Quantity</td>
                        <td>Amount</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>&#8373; {{ number_format($order->value) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
<!--     <script src="js/colResizable-1.6.js"></script>
    <script>
        $("#shift").colResizable({liveDrag:true});
    </script> -->
    {!! Html::script('js/datatables.js') !!}
    {!! Html::script('js/materialize.min.js') !!}
    <script>
        $(document).ready(function() {
            $('#searcher').DataTable();
            $(".dataTables_filter").addClass("input-field");
            $(".dataTables_filter").appendTo(".md-form");
        });
    </script>
@endsection