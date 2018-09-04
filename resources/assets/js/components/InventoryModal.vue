<template>
    <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">
              <div class="modal-header">
                <slot name="header">
                    <h3>{{brand}}
                        <span class="pull-right" @click="$emit('close')" @blur="$emit('close')">
                            <span class="fa fa-remove md-close"></span>
                        </span>
                    </h3>
                </slot>
              </div>
              <div class="modal-body">
                <slot name="body">
                    <div>
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Item</td>
                                <td>Value</td>
                            </tr>
                            </thead>

                            <tbody>
                              <tr v-for="item in items">
                                  <td>{{item.name}}</td>
                                  <td>{{numFormat(item.units)}}</td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </slot>
              </div>
            </div>
          </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props : ['items','brand']
    }
</script>