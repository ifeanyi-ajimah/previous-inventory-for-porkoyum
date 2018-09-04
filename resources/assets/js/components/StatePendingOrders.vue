<template>
    <div class="col-sm-6 pending">
        <div class="bordered">
            <h2 class="text-center state">Pending Orders</h2>

            <table class="table tab3 table-hover">
                <thead>
                <tr>
                    <td>Product</td>
                    <td class="pull-right">Quantity</td>
                </tr>
                </thead>
                <tbody>
                <list v-for="order in orders" :data="order" :key="orders.id"></list>
                </tbody>
            </table>

            <div class="total-ground">
                <table class="table">
                    <thead>
                    <tr class="total">
                        <td>Total</td>
                        <td class="pull-right">{{numFormat(total)}}</td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                orders : [],
                total : 0
            }
        },
        methods: {
            getTotal : function (){
                Object.keys(this.orders).forEach( (key) => {
                    this.total += parseInt(this.orders[key].units)
                })
            }
        },
        mounted(){
            axios.get('/api/orders/pending')
                .then((response) => {
                    this.orders = response.data
                    this.getTotal()
                })
        }
    }
</script>