<template>
    <div>
        <div class="col-sm-3 state-block" @click="show">
            <h3 @click="showOrders = true">
                <span class="state-name">{{state.name}}</span>
                <span class="state-num">{{state.units}}</span>
            </h3>
        </div>
        <orders :orders="orders" v-if="showOrders" :persons="persons" @close="close"></orders>
    </div>
</template>

<script>
    export default {
        props : ['state'],
        data () {
            return {
                states: [],
                persons: null,
                orders: null,
                showOrders : null
            }
        },
        methods : {
            close : function(){
                this.showOrders = false
                this.$emit('close')
            },
            show : function(){
                this.showOrders = true
                $('.state-block').hide();
            }
        },
        mounted(){
            axios.get('/api/states/'+this.state.id+'/orders')
                .then((response) => {
                    this.orders = response.data
                }) 

            axios.get('/api/states/'+this.state.id+'/delivery-persons/')
                .then((response) => {
                    this.persons = response.data
                })
        }
    }
</script>

<style>

</style>
