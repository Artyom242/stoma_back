<template>
    <button class="btn btn_submit" @click="openModal('Запись на прием', 'CalendarBlock')"><span>Записаться</span></button>
</template>

<script>
import eventBus from '../../Helpers/eventBus';
export default {
    methods: {
        openModal(title, component) {
            eventBus.emit('openModal', { title, component });
        }
    }
}
</script>

<style scoped>

</style>
