<template >
    <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">
              <div class="modal-header">
                <slot name="header">
                    <h3>Assign Logistic Personnel
                        <span class="pull-right" @click="$emit('close')" @blur="$emit('close')">
                            <span class="fa fa-remove md-close"></span>
                        </span>
                    </h3>
                </slot>
              </div>
              <div class="modal-body">
                <slot name="body">
                    <div>
                        <label>Select Personnel</label>
                        <select class="form-control" v-model="selected" @change="$emit('assign',selected)">
                            <option v-for="person in persons" :key="person.id" :value="person.id ">{{person.fullname}}</option>
                        </select>
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
      props : ['persons'],
      data(){
        return {
          selected : null
        }
      }
    }
</script>