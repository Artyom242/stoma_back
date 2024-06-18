<template>
    <div class="blocks_row">
        <calendar @date-selected="handleDateSelected"></calendar>

        <transition name="fade" mode="out-in">
            <component :is="currentForm" :key="currentForm"
                :selectedDate="selectedDate"
                :busyTimes="busyTimes"
                @selectedDate="selectedDate = $event"
            ></component>
        </transition>
    </div>
</template>

<script>
import {ref, watch} from 'vue';
import Calendar from '../components/CalendarComponents/Calendar.vue';
import EmptyForm from '../components/CalendarComponents/EmptyForm.vue';
import AppointmentForm from './Forms/Applications/FormFrame.vue';
import {format} from "date-fns";

export default {
    components: {
        Calendar,
        EmptyForm,
        AppointmentForm
    },
    setup() {
        const selectedDate = ref(null);
        let busyTimes = ref([]);

        const handleDateSelected = (date) => {
            selectedDate.value = date;
            getTimeOfDay();
        };

        watch(() => selectedDate, handleDateSelected);

        const getTimeOfDay = async () => {
            if (selectedDate.value){
                const formattedDate = format(selectedDate.value, 'yyyy-MM-dd');

                axios.get('api/applications/' + formattedDate)
                    .then(res => {
                        busyTimes.value = res.data.times;
                    }).catch(function (error) {
                    console.log(error.toJSON());
                });
            }
        }

        const currentForm = ref('EmptyForm');


        return {
            selectedDate,
            handleDateSelected,
            currentForm,
            busyTimes,
            getTimeOfDay
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
