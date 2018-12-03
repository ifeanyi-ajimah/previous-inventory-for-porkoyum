@extends('main')

@section('title', '- View Customer')

@section('stylesheets')
    {!! Html::style('css/dashboard.css') !!}
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">
            <div class="row">
                <h4>
                    View <strong>{{ $customer->name }}</strong> Details
                    <a class="btn btn-success pull-right" href="{{ route('customers.index') }}">Return to Customers</a>
                </h4>
                <hr/>

                <div class="details">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $customer->name }}
                    </div>
                    <div class="form-group">
                        <strong>Address:</strong>
                        {{ $customer->address }}
                    </div>
                    <div class="form-group">
                        <strong>Phone Number:</strong>
                        {{ $customer->phone_no }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">
            <h4>Orders</h4>
            <hr/>
            @if (count($customerOrders) == 0)
                <span>No orders for this Customer</span>
            @else
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Product Category</th>
                        <th>Product</th>
                        <th>Date Created</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($customerOrders as $customerOrder)
                            <tr>
                                <td>{{ $customerOrder->id }}</td>
                                <td>{{ $product_cat[$customerOrder->product_id] }}</td>
                                <td>{{ $customerOrder->product->product_name }}</td>
                                <td>{{ formatDate($customerOrder->created_at) }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('orders.edit', $customerOrder->id) }}">Edit</a>
                                    <a class="btn btn-primary" href="{{ route('orders.show', $customerOrder->id) }}">View</a>
                                </td>
                                <td>
                                    {{--{!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id]]) !!}--}}
                                    {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                                    {{--{!! Form::close() !!}--}}
                                </td>
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
