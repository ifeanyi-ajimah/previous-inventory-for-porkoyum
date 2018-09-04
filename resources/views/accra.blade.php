<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accra - Inventory</title>

    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/input-material.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/component.css">
    <link rel="stylesheet" href="/css/styles.css">

    <style>
        @media (min-width: 1200px) {
            .container{
                padding-right: 0;
            }
        }
        .dataTables_length{
            display: none;
        }
        .dataTables_filter.input-field label{
            position: relative;
            top: 0;
            width: 100%;
        }
    </style>
</head>

<body class="inverse">

@include('partials._nav')
@include('partials._messages')

<section class="container">
    <div class="col-xs-12 mag-10">
        <h2 class="text-center state st">Accra</h2>
    </div>
    <div class="bordered col-sm-6 col-xs-12 pad-0">
        <div class="col-xs-12 mag-10">
            <div class="text-left">
                <button data-modal="entry-modal" href="" class="btn btn-primary btn-custom btn-sm md-trigger">Entry</button>
            </div>
        </div>
        <div class="col-xs-12 pad-0">
            <div class="tab tab-ground">
                <table id="table" class="table">
                    <thead>
                    <tr>
                        <td></td>
                        <td>Holdings</td>
                        <td>Transit</td>
                        <td>Fulfilled</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="entry-row md-trigger" data-modal="edit-inventory-{{$loop->index}}">
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->stateInventory($state)? number_format($product->stateInventory($state)->quantity) : 0}}</td>
                            <td>{{number_format($product->transitAccra($state)->sum('quantity'))}}</td>
                            <td>{{number_format($product->fulfilledAccra($state)->where('confirmed',true)->sum('quantity'))}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="total-ground">
                <table class="table">
                    <thead>
                    <tr class="total">
                        <td class="tt">TOTAL</td>
                        <td id="t01"></td>
                        <td id="t02"></td>
                        <td id="t03"></td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="col-xs-12 pad-0 mag-top-10 mag-10">
        <div class="col-sm-6 col-xs-12 incoming bordered pad-0">
            <h2 class="text-center state">Incoming Orders</h2>

            <div class="inc-orders">
                <div class="input-field col-xs-12 pull-left searcher">
                    <!--<label for="search">Search</label>
                    <input type="search" id="search">-->
                </div>

                <div class="col-xs-12 pad-0 pad-right orders">
                    <table class="table" id="searcher">
                        <thead>
                        <tr>
                            <td>s/n</td>
                            <td>Product</td>
                            <td>Qty</td>
                            <td>Value</td>
                            <td>Address</td>
                            <td>Logistics Person</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$order->product->product_name}}</td>
                                <td>{{number_format($order->quantity)}}</td>
                                <td>{{number_format($order->value)}}</td>
                                <td>{{$order->customer->address}}</td>
                                @if($order->deliveryperson)
                                    <td><button class="btn btn-warning btn-xs md-trigger" data-modal="assign-modal-{{$loop->index}}">Change <span class="fa fa-arrow-right"></span></button></td>
                                @else
                                    <td><button class="btn btn-success btn-xs md-trigger" data-modal="assign-modal-{{$loop->index}}">Assign <span class="fa fa-arrow-right"></span></button></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="col-sm-12 pending bordered pad-0">
                <h2 class="text-center state">Pending Orders</h2>

                <div class="orders-height">
                    <table id="table2a" class="table tab3">
                        <thead>
                        <tr>
                            <td>Product</td>
                            <td class="text-right">Value (&#8373;)</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->product_name}}</td>
                                <td class="text-right">{{number_format($product->PendingAccra($state)->sum('value'))}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="total-ground">
                    <table class="table">
                        <thead>
                        <tr class="total">
                            <td>Total Product Value</td>
                            <td id="td1a" class="text-right"></td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="col-sm-12 delivered bordered pad-0">
                <h2 class="text-center state">Delivered Orders</h2>

                <div class="orders-height">
                    <table id="table2" class="table tab3">
                        <thead>
                        <tr>
                            <td>Product</td>
                            <td class="text-right">Value (&#8373;)</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->product_name}}</td>
                                <td class="text-right">{{number_format($product->fulfilledAccra($state)->sum('value'))}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="total-ground">
                    <table class="table">
                        <thead>
                        <tr class="total">
                            <td>Total Product Value</td>
                            <td id="td1" class="text-right"></td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!--======MODALS SECTION ======-->
<section>
    <div class="md-modal md-effect-1" id="entry-modal">
        <div class="md-content">
            <h3>Product Entry Form
                <span class="x-close pull-right remove">
                    <span class="fa fa-remove md-close"></span>
                </span>
            </h3>
            <div>
                <form action="{{route('new-shipment')}}" method="post">
                    {{csrf_field()}}
                    <div class="input-field col-xs-12 pad-0">
                        <label for="prod">Products</label>
                        <select name="product" id="prod">
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-12 pad-0">
                        <div class="input-field col-xs-6 col-xs-6">
                            <label for="intact">QTY Intact</label>
                            <input type="number" name="intact" id="intact" minlength="0" value="0">
                        </div>
                        <div class="input-field col-xs-6 col-xs-6 text-right">
                            <label for="damaged">QTY Damaged</label>
                            <input type="number" name="damaged" id="damaged" minlength="0" value="0">
                        </div>
                        <input type="hidden" name="region" value="{{$region}}">
                    </div>

                    <div class="col-xs-12 pad-0 sum-total" id="sum-totals">
                        <h3>0</h3>
                    </div>

                    <button class="btn btn-primary btn-custom md-close2" type="submit" id="submit">Submit</button>

                </form>
            </div>
        </div>
    </div>

    @foreach($orders as $order)
        <div class="md-modal md-effect-1" id="assign-modal-{{$loop->index}}">
            <div class="md-content">
                <h3>Assign Logistic Personnel
                    <span class="x-close pull-right remove">
                    <span class="fa fa-remove md-close"></span>
                </span>
                </h3>
                <div>
                    <form action="{{url('assign-delivery')}}/{{$order->id}}" method="post">
                        {{csrf_field()}}
                        <div class="input-field col-xs-12 pad-0">
                            <label for="personnel">Personel</label>
                            <select name="delivery_person" id="personnel">
                                @foreach($logistics as $p)
                                    <option value="{{$p->id}}">{{$p->fullname}}</option>
                                @endforeach
                            </select>
                        </div>


                        <button class="btn btn-primary btn-custom md-close2" type="submit" id="submit2">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach($products as $product)
        @foreach($product->pendingAccra($state)->get() as $order)
            <div class="md-modal md-effect-1" id="change-stat-{{$loop->index}}">
                <div class="md-content">
                    <h3>Change Status
                        <span class="x-close pull-right remove">
                    <span class="fa fa-remove md-close"></span>
                </span>
                    </h3>
                    <div>
                        <form action="{{ url('change-status') }}/{{$order->id}}" method="post">
                            {{csrf_field()}}
                            <div class="input-field col-xs-12 pad-0">
                                <label for="stat">Change Status</label>
                                <select name="status" id="stat">
                                    <option value="0">Pending</option>
                                    <option value="1">Delivered</option>
                                </select>
                            </div>


                            <button class="btn btn-primary btn-custom md-close2" type="submit" id="submit3">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        @endforeach

            <div class="md-modal md-effect-1" id="edit-inventory-{{$loop->index}}">
                <div class="md-content">
                    <h3>{{$product->product_name}}
                        <span class="x-close pull-right remove">
                    <span class="fa fa-remove md-close"></span>
                </span>
                    </h3>
                    <div>
                        <form action="{{route('edit-shipment')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="product" value="{{$product->id}}">

                            <div class="">
                                <div class="input-field">
                                    <label for="quantity">QTY Available</label>
                                    <input type="number" name="quantity" id="intact" minlength="0" value="{{$product->stateInventory($state)? $product->stateInventory($state)->quantity : 0}}">
                                </div>
                                <input type="hidden" name="region" value="{{$region}}">
                                <input type="hidden" name="location" value="{{$state}}">
                            </div>

                            <div class="col-xs-12 pad-0 sum-total" id="sum-totals">
                                <h3>0</h3>
                            </div>

                            <button class="btn btn-primary btn-custom md-close2" type="submit" id="submit">Submit</button>

                        </form>
                    </div>
                </div>
            </div>

    @endforeach

    <div class="md-overlay"></div>

</section>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/materialize.min.js"></script>
<script src="/js/classie.js"></script>
<script src="/js/modalEffects.js"></script>
<script src="/js/datatables.js"></script>

<script>
    //initialize material select
    $(document).ready(function() {
        $('select').material_select();
        $('#searcher').DataTable();
        $(".dataTables_filter").addClass("input-field");
    });

    $('#pend').click(function () {
        $('.pendings').show();
        $('.orders').hide();
        $('.del').hide();
    });

    $('#new').click(function () {
        $('.pendings').hide();
        $('.orders').show();
        $('.del').hide();
    });

    $('#del').click(function () {
        $('.pendings').hide();
        $('.orders').hide();
        $('.del').show();
    });

    $('input[type = "number"]').change(function () {
        var q1 = parseInt($('#intact').val());
        var q2 = parseInt($('#damaged').val());
        var sum = q1 + q2;
        $('#sum-totals h3').text(sum);
    });

    var table = document.getElementById('table'), sumTab1 = 0, sumTab2 = 0, sumTab3 = 0;
    for (var i = 1; i < table.rows.length; i++){
        sumTab1 = sumTab1 + numRevert(table.rows[i].cells[1].innerHTML);
        sumTab2 = sumTab2 + numRevert(table.rows[i].cells[2].innerHTML);
        sumTab3 = sumTab3 + numRevert(table.rows[i].cells[3].innerHTML);
    }
    document.getElementById('t01').innerHTML = numFormat(sumTab1)
    document.getElementById('t02').innerHTML = numFormat(sumTab2)
    document.getElementById('t03').innerHTML = numFormat(sumTab3)
</script>
<script>
    var table2 = document.getElementById('table2'), sumTabAmount = 0;
    for (var j = 1; j < table2.rows.length; j++){
        sumTabAmount = sumTabAmount + numRevert(table2.rows[j].cells[1].innerHTML);
    }
    document.getElementById('td1').innerHTML = numFormat(sumTabAmount);
</script>
<script>
    var table3 = document.getElementById('table2a'), sumTabAmount = 0;
    for (var j = 1; j < table3.rows.length; j++){
        sumTabAmount = sumTabAmount + numRevert(table3.rows[j].cells[1].innerHTML);
    }
    document.getElementById('td1a').innerHTML = numFormat(sumTabAmount);
</script>
</body>
</html>