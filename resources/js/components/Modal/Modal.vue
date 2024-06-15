<template>
        <ModalApplication v-if="isVisible"
            @updateIsVisible="isVisible = $event">
            <CalendarBlock></CalendarBlock>
        </ModalApplication>
</template>

<script>
import ModalApplication from './ModalApplication.vue';
import CalendarBlock from '../CalendarBlock.vue';
import eventBus from '../Modal/eventBus';

export default {
    data() {
        return {
            isVisible: false
        };
    },
    components: {
        ModalApplication,
        CalendarBlock
    },
    mounted() {
        eventBus.on('openModal', this.openModal);
    },
    methods: {
        openModal() {
            this.isVisible = true;
            console.log('ad');
        },
        closeModal() {
            this.isVisible = false;
        }
    },
    beforeUnmount() {
        eventBus.off('openModal', this.openModal);
    }
}
</script>
