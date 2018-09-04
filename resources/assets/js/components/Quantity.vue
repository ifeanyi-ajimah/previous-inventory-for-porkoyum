<template>
    <div class="form-control">
        <button class="btn btn-success" @click="addQuantity"><span class="glyphicon glyphicon-collapse-up"></span></button>
        <input type="text" name="quantity" v-model="quantity" />
        <button class="btn btn-success" @click="decreaseQuantity"><span class="glyphicon glyphicon-collapse-down"></span></button>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                quantity: 1,
            }
        },
        methods: {
            addQuantity () {
                return this.quantity += 1;
            },
            decreaseQuantity () {
                return this.quantity -= 1;
            }
        }
    }
</script>

<style>

</style>
