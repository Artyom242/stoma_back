<template>
        <div class="overlay" @click="closeModal"></div>
        <div class="modal">
            <span class="close-btn" @click="closeModal">
            <svg class="ham hamRotate ham8 active" viewBox="0 0 100 100" width="50">
              <path class="line top" d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
              <path class="line middle" d="m 30,50 h 40"></path>
              <path class="line bottom" d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
            </svg>
          </span>
            <div class="modal_header">
                <h2 class="title_center">Запись на прием</h2>
            </div>
            <div class="modal-content">
                <div class="blocks_row">
                    <slot></slot>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    props: {
        isVisible: {
            type: Boolean,
        }
    },
    methods: {
        closeModal() {
            this.$emit('updateIsVisible', false);
        }
    }
}
</script>

<style>
</style>
