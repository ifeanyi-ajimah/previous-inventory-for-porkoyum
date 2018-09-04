@extends('main')

@section('title', '- My Shipments')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}
    {!! Html::style('css/dashboard.css') !!}

    <style>
        .navbar .navbar-brand{
            font-weight: 400;
        }

        label{
            color: #808080;
            font-size: 1.5rem;
            display: none;
        }
        .md-form label{
            font-size: 1.3rem;
            display: block;
        }
        input[type="text"]:not(.browser-default), input[type="number"]:not(.browser-default){
            font-size: 1.3rem;
            font-weight: bold;
        }
        .md-form input[type="text"]:not(.browser-default), .md-form input[type="number"]:not(.browser-default){
            font-size: 1.5rem;
        }
        input[type="text"]:focus:not(.browser-default):not([readonly]),input[type="number"]:focus:not(.browser-default):not([readonly]){
            border-bottom: 1px solid #00D255;
            -webkit-box-shadow: 0 1px 0 0 #00D255;
            box-shadow: 0 1px 0 0 #00D255;
        }
        .btn{
            background: #00D255;
            font-size: 1.11rem;
            font-weight: bold;
        }
        .btn:focus, .btn:hover {
            background: rgba(0, 210, 85, 0.8);
        }
        hr{
            display: none;
        }
        h3{
            font-weight: 100;
        }

    </style>
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <h2>Shipments</h2>
            <hr/>

            <table class="table table-responsive details">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shipments as $shipment)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $shipment->product->product_name }}</td>
                            <td>{{ $shipment->quantity }}</td>
                            <td>
                                <button class="btn btn-success receive" url='{{ url("inventory/reception/$shipment->id") }}'>Receive
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/materialize.min.js') !!}
    <script>
    $('.receive').click(function(){
        var formAction = $(this).attr('url')
        var newFrom = document.createElement('form')
        var input = document.createElement('input')
        $(newFrom).attr('method','post')
        $(newFrom).attr('action',formAction)
        $(newFrom).attr('id','newFrom')

        $(input).attr('type','hidden')
        $(input).attr('name','_token')
        $(input).attr('value',$('meta[name="_token"]').attr('content'))
        
        newFrom.appendChild(input)
        document.body.appendChild(newFrom)
        newFrom.submit()
    });
</script>
@endsection