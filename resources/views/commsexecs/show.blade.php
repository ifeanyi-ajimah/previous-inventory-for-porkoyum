@extends('main')

@section('title', '- View Comms Executive')

@section('stylesheets')
    {!! Html::style('css/dashboard.css') !!}
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">
            <div class="row">
                <h4>
                    View - <strong>{{ $commsExec->fullname }}</strong> Details
                    <a class="btn btn-success pull-right" href="{{ route('commsexecs.index') }}">Return to Comms Reps</a>
                </h4>
                <hr/>

                <div class="details">
                    <div class="form-group">
                        <strong>Full Name:</strong>
                        {{ $commsExec->fullname }}
                    </div>
                    <div class="form-group">
                        <strong>Display Name:</strong>
                        {{ $commsExec->display_name }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">
            <h3>Orders</h3>
            <hr/>
            @if (count($commsExecOrders) == 0)
                <span>No orders for this Comms Rep</span>
            @else
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Product</th>
                        <th>Date Created</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($commsExecOrders as $commsExecOrder)
                        <tr>
                            <td>{{ $commsExecOrder->id }}</td>
                            <td>{{ $product_cat[$commsExecOrder->product_cat_id] }}</td>
                            <td>{{ $commsExecOrder->product->product_name }}</td>
                            <td>{{ formatDate($commsExecOrder->created_at) }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('orders.edit', $commsExecOrder->id) }}">Edit</a>
                                <a class="btn btn-primary" href="{{ route('orders.show', $commsExecOrder->id) }}">View</a>
                            </td>
                            {{--<td>--}}
                                {{--{!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id]]) !!}--}}
                                {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection

@section('scripts')

@endsection