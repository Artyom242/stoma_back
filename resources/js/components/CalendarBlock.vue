<template>
    <calendar @date-selected="handleDateSelected"></calendar>

    <transition name="fade" mode="out-in">
        <component :is="currentForm" :key="currentForm"
            :selectedDate
        ></component>
    </transition>

</template>

<script>
import { ref } from 'vue';
import Calendar from '../components/CalendarComponents/Calendar.vue';
import EmptyForm from '../components/CalendarComponents/EmptyForm.vue';
import AppointmentForm from './Forms/FormFrame.vue';

export default {
    components: {
        Calendar,
        EmptyForm,
        AppointmentForm
    },
    setup() {
        const selectedDate = ref(null);

        const handleDateSelected = (date) => {
            selectedDate.value = date;
        };

        const currentForm = ref('EmptyForm');

        return {
            selectedDate,
            handleDateSelected,
            currentForm
        };
    },
    watch: {
        selectedDate(newValue) {
            this.currentForm = newValue ? 'AppointmentForm' : 'EmptyForm';
        }
    }
};
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.3s, transform 0.3s;
}
.fade-enter-from, .fade-leave-to {
    opacity: 0;
    transform: translateY(10px);
}
</style>
