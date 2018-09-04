<template>
    <div class="col-xs-12">

        <!--==== State Navigation ====-->
        <div class="col-xs-12 col-sm-3 pad-0">
            <ul class="state-nav col-sm-3">
                
                <li class="state-block" v-for="state in states" @key=state.id>
                    <a @click="selectedState = state" data-toggle="pill">
                        <h3>
                            <span class="state-name">{{state.name}}</span>
                            <span class="state-num"> <span>&#8373; </span>{{numFormat(state.total)}}</span>
                        </h3>
                    </a>
                </li>

            </ul>
        </div>

        <div class="col-xs-12 col-sm-9">


            <div class="tab-content">
                <div id="lagos" class="tab-pane fade in active">

                    <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="pill" href="#today">Today</a></li>
                        <li><a data-toggle="pill" href="#yesterday">Yesterday</a></li>
                        <li><a data-toggle="pill" href="#week">Week</a></li>
                        <li><a data-toggle="pill" href="#month">Month</a></li>
                        <li><a data-toggle="pill" href="#year">Year</a></li>
                    </ul>

                    <div class="header">
                        <h1 class="text-center">Total Confirmed Orders (<b>{{selectedState.name}}</b>)</h1>
                    </div>

                    <div class="tab-content">
                        <div id="today" class="tab-pane fade in active">
                            <div class="col-xs-12"><h3 class="col-xs-12">Today</h3></div>
                            <div class="panel-group col-xs-12">
                                <div class="col-xs-4 col-sm-3" v-for="order in selectedState.orders.today">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>{{order.product}}</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">{{order.quantity}}</span></p>
                                            <p>Value: <span class="h4 pull-right"><span>&#8373;</span>{{order.value}}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="yesterday" class="tab-pane fade">
                            <div class="col-xs-12"><h3 class="col-xs-12">Yesterday</h3></div>
                            <div class="panel-group col-xs-12">
                                <div class="col-xs-4 col-sm-3" v-for="order in selectedState.orders.yesterday">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>{{order.product}}</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">{{order.quantity}}</span></p>
                                            <p>Value: <span class="h4 pull-right"><span>&#8373;</span>{{order.value}}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="week" class="tab-pane fade">
                            <div class="col-xs-12"><h3 class="col-xs-12">Week</h3></div>
                            <div class="panel-group col-xs-12">
                                <div class="col-xs-4 col-sm-3" v-for="order in selectedState.orders.week">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>{{order.product}}</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">{{order.quantity}}</span></p>
                                            <p>Value: <span class="h4 pull-right"><span>&#8373;</span>{{order.value}}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="month" class="tab-pane fade">
                            <div class="col-xs-12"><h3 class="col-xs-12">Month</h3></div>
                            <div class="panel-group col-xs-12">
                                <div class="col-xs-4 col-sm-3" v-for="order in selectedState.orders.month">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>{{order.product}}</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">{{order.quantity}}</span></p>
                                            <p>Value: <span class="h4 pull-right"><span>&#8373;</span>{{order.value}}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="year" class="tab-pane fade">
                            <div class="col-xs-12"><h3 class="col-xs-12">Year</h3></div>
                            <div class="panel-group col-xs-12">
                                <div class="col-xs-4 col-sm-3" v-for="order in selectedState.orders.year">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><b>{{order.product}}</b></div>
                                        <div class="panel-body">
                                            <p>QTY: <span class="h4 pull-right">{{order.quantity}}</span></p>
                                            <p>Value: <span class="h4 pull-right"><span>&#8373;</span>{{order.value}}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                states: null,
                selectedState: null
            }
        },
        mounted(){
            axios.get('/api/accounts')
            .then((response) => {
                console.log(response.data.data)
                this.states = response.data.data
                this.selectedState = this.states[0]
            })
        }
    }
</script>

