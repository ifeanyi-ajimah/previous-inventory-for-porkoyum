                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        Orders <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu multi-level"  aria-labelledby="dropdownMenu">
                                        <li><a href="{{ route('orders.create') }}"><span class="glyphicon glyphicon-plus"></span>&nbsp; New Order</a></li>
                                        <li><a href="{{ route('orders.index') }}"><span class="glyphicon glyphicon-plus"></span>&nbsp; Orders</a></li>
                                    </ul>
                                </li>
                                @role('comms-admin')
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
                                        Manage <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('commsexecs.index') }}"><span class="glyphicon glyphicon-user"></span>&nbsp; Comms Personnel</a></li>
                                    </ul>
                                </li>
                                @endrole