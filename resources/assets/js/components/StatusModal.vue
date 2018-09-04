<template>
    <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">
              <div class="modal-header">
                <slot name="header">
                    <h3>Change Status
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
                            <tbody>
                              <tr>
                                  <td @click="$emit('markPending')">Pending</td>
                              </tr>
                              <tr>
                                  <td @click="$emit('markDelivered')">Delivered</td>
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
    }
</script>