@extends('main')

@section('title', '- Auto Doctor Orders')

@section('stylesheets')
    {!! Html::style('css/mdb.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/order.css') !!}
    <style>
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
        .btn-info{
            background-color: #27aae0;
            border-color: #27aae0;
        }
    </style>
@endsection

{{--{!! Charts::assets() !!}--}}

@section('content')

<section>

    <h2 class="text-center"> Orders Overview </h2>

    <div class="panel-group col-xs-12 col-sm-10 col-sm-offset-1">
        @foreach($orders as $order)
        <div class="col-xs-4 col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><b>{{$order->customer->name}}</b></div>
                <div class="panel-body">
                    <p>QTY: <span class="pull-right">{{$order->quantity}}</span></p>
                    <p>Created: <span class="pull-right">{{$order->created_at->diffForHumans()}}</span></p>
                </div>
                <div class="panel-footer text-center">
                    <button url='{{ url("/autodoctor/$order->id")}}' class="btn btn-info take-up">Take Up</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection


@section('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var takeups = document.querySelectorAll('.take-up')
        takeups.forEach( function(el) {
            el.addEventListener('click', function(){
                var url = this.getAttribute('url')
                $.post(url, function(data, status){
                    if(status == "success"){
                        console.log(data)
                        var parent = this.parentElement.parentElement.parentElement
                        parent.classList.add('hide')
                        // $(parent).remove()
                    }
                }.bind(this))
            })
        });
    </script>
@endsection