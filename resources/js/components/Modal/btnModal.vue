<template>
    <button class="btn btn_submit" @click="openModal"><span>Записаться</span></button>
</template>

<script>
import eventBus from '../Modal/eventBus';
export default {
    methods: {
        openModal() {
            eventBus.emit('openModal');
        }
    }
}
</script>

<style scoped>

</style>
