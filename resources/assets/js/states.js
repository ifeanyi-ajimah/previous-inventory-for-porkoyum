// All View Components for State will be registered here

Vue = require('vue');

Vue.mixin({
  methods: {
    numFormat: number => {
	    var parts = number.toString().split(".");
	    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	    return parts.join(".");
	}
  }
})

Vue.component('orders', require('./components/StateOrders.vue'));
Vue.component('pending', require('./components/StatePendingOrders.vue'));
Vue.component('delivered', require('./components/StateDeliveredOrders.vue'));
Vue.component('state-block', require('./components/StateBlock.vue'));
Vue.component('incoming-orders', require('./components/IncomingOrders.vue'));
Vue.component('modal', require('./components/InventoryModal.vue'));
Vue.component('list', require('./components/ListItem.vue'));
Vue.component('state-warehouse', require('./components/StateWarehouse.vue'));
Vue.component('state-pending', require('./components/StatePending.vue'));
Vue.component('status', require('./components/StatusModal.vue'));
Vue.component('delivery-persons', require('./components/DeliveryModal.vue'));

const app = new Vue({
    el: '#orders',

});

const app2 = new Vue({
    el: '#warehousing',
});