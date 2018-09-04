<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{!! csrf_token() !!}">
    <title>Other Regions - Inventory</title>

    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/input-material.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/component.css">
    <link rel="stylesheet" href="/css/styles.css">

    <style>
        #entry-modal2 .md-content{
            min-height: 370px;
        }
        .mt-0{
            margin-top: 0;
        }
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
        .radios label{
            /* margin: 6px 5px !important; */
            margin-bottom: 6px;
        }
        .radios{
            margin: 8% 0;
        }
        .input-field label:not(.label-icon).active {
            -webkit-transform: translateY(-20%);
            transform: translateY(-20%);
        }
        /* @media(min-width: 768px){
            .radios label:nth-child(even){
                text-align: right;
            }
        } */
    </style>
</head>

<body class="inverse">
@include('partials._nav')
@include('partials._messages')

<section class="container">
    <div class="col-xs-12 mag-10 less-col">
        <h2 class="text-center state st">Other Regions</h2>
        <div>
            <button data-modal="entry-modal" href="" class="btn btn-primary btn-custom  md-trigger">Stock Entry</button>
            <button data-modal="entry-modal2" href="" class="btn btn-primary btn-custom btn-sm md-trigger pull-right">Region Entry</button>
        </div>

    </div>
  <div class="col-xs-12">
      <div class="col-sm-6 col-xs-12 bordered pad-0">
          <div class="tab">
              <table class="table">
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
                      <tr>
                          <td>{{$product->product_name}}</td>
                          <td>{{$product->regionalInventory($region)->latest()->first()?
                            $product->regionalInventory($region)->latest()->first()->available : 0
                        }}</td>
                          <td>{{$product->transit($state)->sum('quantity')}}</td>
                          <td>{{$product->fulfilled($state)->sum('quantity')}}</td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>

          <!-- <div>
              <table class="table">
                  <thead>
                  <tr class="total">
                      <td>TOTAL</td>
                      <td>520</td>
                      <td>105</td>
                      <td>325</td>
                  </tr>
                  </thead>
              </table>
          </div> -->
      </div>

      <div class="col-sm-6 col-xs-12" id="warehousing">
          <state-warehouse></state-warehouse>
          <state-pending></state-pending>
      </div>
  </div>
</section>

<section id="orders" class="container">
    <incoming-orders></incoming-orders>
</section>

<!--======MODALS SECTION ======-->
<section>
    <div class="md-modal md-effect-1" id="entry-modal2">
        <div class="md-content">
            <h3>Product Entry Form
                <span class="x-close pull-right remove">
                    <span class="fa fa-remove md-close"></span>
                </span>
            </h3>
            <div>
                <form action="{{route('restock')}}" method="post">
                    {{csrf_field()}}
                    <div class="input-field col-xs-12 col-sm-6 pad-0">
                        <label for="prod">Products</label>
                        <select name="product" id="prod" id="select-product">
                            @foreach($availableProducts as $product)
                            <option value="{{$product->id}}" data-available="{{$product->available}}">{{$product->product_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=' col-xs-12 col-sm-6'>
                        <div class="input-field col-xs-12">
                            <label for="intact">QTY Intact</label>
                            <input type="number" name="intact" id="intact" minlength="0" value="0">
                        </div>
                    </div>
                    <div class="col-xs-12 pad-0">
                        <!-- <div class="input-field col-xs-12 col-sm-6">
                            <label for="intact">QTY Intact</label>
                            <input type="number" name="intact" id="intact" minlength="0" value="0">
                        </div> -->
                        <!-- <div class="input-field col-xs-6 col-xs-6 text-right"> -->
                            <!-- <label for="damaged">QTY Damaged</label> -->
                            <input type="hidden" name="damaged" id="damaged" minlength="0" value="0">
                        <!-- </div> -->
                    </div>
                    <div class="col-xs-12 pad-0">
                        <div class='radios col-xs-12 pad-0'>
                          @foreach($states as $state)
                            <label class='col-sm-6 col-xs-12'>
                                <input class="with-gap" name="location" type="radio" value="{{$state->id}}" />
                                <span>{{$state->name}}</span>
                            </label>
                          @endforeach 
                        </div>
                    </div>
                    <input type="hidden" name="region" value="{{$region}}">
                    

                    <button class="btn btn-primary btn-custom md-close2" type="submit" id="submit3">Submit</button>

                </form>
            </div>
        </div>
    </div>
    <div class="md-modal md-effect-1" id="entry-modal">
        <div class="md-content">
            <h3>Stock Entry Form
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
                            <input type="number" name="intact" id="intact2" minlength="0" value="0">
                        </div>
                        <div class="input-field col-xs-6 col-xs-6 text-right">
                            <label for="damaged">QTY Damaged</label>
                            <input type="number" name="damaged" id="damaged2" minlength="0" value="0">
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



    <div class="md-overlay"></div>

</section>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script src="/js/states.js"></script>
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

    $('#select-product').on('change', function(){
        $('#intact').attr('max', $(this).attr('data-available'))
    })
    $('input[type = "number"]').change(function () {
        var q1 = parseInt($('#intact2').val());
        var q2 = parseInt($('#damaged2').val());
        var sum = q1 + q2;
        $('#sum-totals h3').text(sum);
    });
</script>
</body>
</html>