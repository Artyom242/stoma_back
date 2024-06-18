<template>
        <ModalFrame v-show="isVisible"
            :isVisible
            :title="modalTitle"
            @updateIsVisible="isVisible = $event">
            <component
                :is="currentComponent"
            ></component>
        </ModalFrame>
</template>

<script>
import ModalFrame from './ModalFrame.vue';
import CalendarBlock from '../CalendarBlock.vue';
import FeedbackForm from '../Forms/Feedbacks/FeedbackForm.vue';
import eventBus from '../Helpers/eventBus';

export default {
    data() {
        return {
            isVisible: false,
            modalTitle: '',
            currentComponent: null
        };
    },
    components: {
        ModalFrame,
        CalendarBlock,
        FeedbackForm
    },
    mounted() {
        eventBus.on('openModal', this.openModal);
    },
    watch: {
        isVisible(isVisible) {
            if (isVisible) {
                document.body.classList.add('modal-open');
            } else {
                document.body.classList.remove('modal-open');
            }
        }
    },
    methods: {
        openModal({ title, component }) {
            this.modalTitle = title;
            this.currentComponent = component;
            this.isVisible = true;
        },
        closeModal() {
            this.isVisible = false;
        }
    },
    beforeUnmount() {
        eventBus.off('openModal', this.openModal);
    },
}
</script>

<style scoped>
</style>
