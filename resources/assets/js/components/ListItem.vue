<template>
        <tr>
            <td v-on:click="open">{{data.name}}</td>
            <td class="pull-right" v-on:click="open">{{numFormat(data.units)}}</td>
            <modal :items="data.items" :brand="data.name" v-if="showModal" @close="close"></modal>
        </tr>
</template>

<script>
    export default {
        props : ['data'],
        data () {
            return {
                showModal : null
            }
        },
        methods : {
            open : function(){
                this.showModal = true
            },
            close : function(){
                this.showModal = false
            }
        }
    }
</script>

<style>

</style>
