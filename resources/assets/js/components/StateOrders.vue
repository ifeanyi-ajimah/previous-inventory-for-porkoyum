<template>
    <div>
        <div class="col-xs-2 pad-0 pull-left text-left">
            <button class="btn btn-custom btn-danger btn-xs" @click="$emit('close')"><span class="fa fa-arrow-left"></span></button>
        </div>
        <div class="col-xs-12 pad-0 pad-right orders">
            <table class="table" id="searcher">
                <thead>
                <tr>
                    <td>s/n</td>
                    <td>Product</td>
                    <td>Quantity</td>
                    <td>Value</td>
                    <td>Address</td>
                    <td>Assign Logistics</td>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="order,index in orders">
                        <td>{{index+1}}</td>
                        <td>{{order.product}}</td>
                        <td>{{numFormat(order.quantity)}}</td>
                        <td>{{numFormat(order.value)}}</td>
                        <td>{{order.address}}</td>
                        <td><button class="btn btn-success btn-custom btn-xs" @click="openModal(order.id)"><span class="fa fa-arrow-right"></span></button></td>
                    </tr>
                </tbody>
                <delivery-persons v-if="showModal" :persons="persons" @close="showModal = false" @assign="assign(selectedOrder,$event)"></delivery-persons>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['orders','persons'],
        data () {
            return {
                pending: [],
                delivered: [],
                showModal : null,
                selectedOrder : null
            }
        },
        methods: {
            openModal : function(order){
                this.showModal = true
                this.selectedOrder = order
            },
            markDelivered : function(order){
                axios.post('/api/orders/'+order+'/delivered', {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                  })
                  .then((response) => {
                        this.showModal = false
                        this.pending.splice(order,1)
                        this.delivered.push(order)
                  })
            },
            markPending : function(order){
                axios.post('/api/orders/'+order+'/pending', {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                  })
                  .then((response) => {
                        this.showModal = false
                        this.delivered.splice(order,1)
                        this.pending.push(order)
                  })
            },
            assign : function(order,person){
                axios({
                    method : "patch",
                    url : '/api/orders/'+order+'/delivery-person/',
                    data : {
                        delivery_person: person
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                  })
                  .then((response) => {
                        console.log(response.data)
                        this.showModal = false
                  })
                  .catch(function (error) {
                        console.log(error.response.data);
                  });
            }
        }
    }
</script>

