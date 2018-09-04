<template>
    <div class="col-xs-12 mag-10">
        <div class="col-sm-6 col-xs-12 incoming bordered">
            <h2 class="text-center state">Incoming Orders</h2>

            <div class="col-xs-6 pull-left pad-0">
                <div class="col-xs-2 pad-0 pull-left text-left inc-btn">
                    <button class="btn btn-custom btn-danger btn-xs"><span class="fa fa-arrow-left"></span></button>
                </div>
            </div>

            <div class="col-xs-12 pad-0 pad-right inc">
                <state-block v-for="state in states" :state="state" :key="state.id" @close="showBlock"></state-block>
            </div>
        </div>

            <div class="col-sm-6 col-xs-12">
                <pending></pending>
                <delivered></delivered>
            </div>
    </div>
</template>

<script>
    export default {
        props : ['data'],
        data () {
            return {
                states: null,
                persons: null
            }
        },
        methods: {
            showBlock : function(){
                $('.state-block').show();
                $('.inc-tab').hide();
                $('.inc-btn').hide();
            },
        },
        mounted(){
            axios.get('/api/states')
                .then((response) => {
                    this.states = response.data
                })
        }
    }
</script>
