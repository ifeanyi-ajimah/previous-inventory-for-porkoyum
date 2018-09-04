<template>
    <div class="col-sm-6">
        <div class="tab bordered">
            <h3 class="ware w1">Warehouse</h3>

            <table class="table tab3 table-hover">
                <thead>
                <tr>
                    <td>Region</td>
                    <td class="pull-right">Quantity</td>
                </tr>
                </thead>
                <tbody>
                    <list v-for="item in items" :data="item" :key="item.id"></list>
                </tbody>
            </table>

            <div class="total-ground">
                <table class="table">
                    <thead>
                    <tr class="total">
                        <td>Total </td>
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
                showModal : null,
                items : [],
                total : 0
            }
        },
        methods: {
            getTotal : function(){
                Object.keys(this.items).forEach( (key) => {
                    this.total += parseInt(this.items[key].units)
                })
            }
        },
        mounted(){
            axios.get('/api/states/warehouse')
                .then((response) => {
                    this.items = response.data
                    this.getTotal()
                })
        }
    }
</script>

