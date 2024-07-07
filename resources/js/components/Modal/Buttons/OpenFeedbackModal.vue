<template>
    <button class="btn btn_submit feedback_title__btn openModalBtn"
            @click="openModal('Оставить отзыв', 'FeedbackForm')">
        <span>Оставить отзыв</span>
    </button>
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
