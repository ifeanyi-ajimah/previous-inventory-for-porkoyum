                                <!-- <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        Inventory <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url('inventory/accra') }}"></span>&nbsp; Accra</a></li>
                                        <li><a href="{{ url('inventory/regions') }}"></span>&nbsp; Other Regions</a></li>
                                    </ul>
                                </li> -->
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        Orders <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu multi-level"  aria-labelledby="dropdownMenu">
                                        <li><a href="{{ route('orders.create') }}"><span class="glyphicon glyphicon-plus"></span>&nbsp; New Order</a></li>
                                        <li><a href="{{ url('orders/deliveries') }}"><span class="glyphicon glyphicon-plane"></span>&nbsp; Deliveries</a></li>
                                        <li class="dropdown-submenu">
                                            <a href="#" tabindex="-1"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp; Orders</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('orders.index') }}"><span class="glyphicon glyphicon-lock"></span>&nbsp; All Orders</a></li>
                                                <li><a href="{{ route('orders.confirmed') }}"><span class="glyphicon glyphicon-ok"></span>&nbsp; Confirmed</a></li>
                                                <li><a href="{{ route('orders.unconfirmed') }}"><span class="glyphicon glyphicon-remove"></span>&nbsp; Unconfirmed</a></li>
                                                <li><a href="{{ route('orders.delivered') }}"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp; Delivered</a></li>
                                                <li><a href="{{ route('orders.undelivered') }}"><span class="glyphicon glyphicon-thumbs-down"></span>&nbsp; Undelivered</a></li>
                                                <li><a href="/orders/state/accra"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp; Accra</a></li>
                                                <li><a href="/orders/states"><span class="glyphicon glyphicon-globe"></span>&nbsp; Orders By Region</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        Customers <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('customers.create') }}"><span class="glyphicon glyphicon-plus"></span>&nbsp; Add New Customers</a></li>
                                        <li><a href="{{ route('customers.index') }}"><span class="glyphicon glyphicon-user"></span>&nbsp; Existing Customers</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        Manage<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('users.index') }}"><span class="glyphicon glyphicon-user"></span>&nbsp; Users</a></li>
                                        <li><a href="{{ route('roles.index') }}"><span class="glyphicon glyphicon-th-list"></span>&nbsp; Roles</a></li>
                                        <li><a href="{{ route('permissions.index') }}"><span class="glyphicon glyphicon-check"></span>&nbsp; Permissions</a></li>
                                        <li><a href="{{ route('commsexecs.index') }}"><span class="glyphicon glyphicon-user"></span>&nbsp; Comms Personnel</a></li>
                                        <li><a href="{{ route('products.index') }}"><span class="glyphicon glyphicon-th-list"></span>&nbsp; Products</a></li>
                                        <!-- <li><a href="{{ route('deliverypersons.index') }}"><span class="glyphicon glyphicon-plane"></span>&nbsp; Delivery Persons</a></li> -->
                                        <li><a href="/states"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;Regions</a></li>
                                        <li><a href="/region"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;Service Zone</a></li>
                                    </ul>
                                </li>