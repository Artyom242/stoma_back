<template>
    <div class="blocks_row">
        <calendar
            :nullSelectedDate="selectedDate"
            @date-selected="handleDateSelected"
        ></calendar>

        <transition name="fade" mode="out-in">
            <component :is="currentForm"
                :selectedDate="selectedDate"
                :busyTimes="busyTimes"
                :weekendTimes="weekendTimes"

                @selectedDate="selectedDate=$event"
                @closeForm="handleCloseForm"
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

const baseURL = `${window.location.origin}/`; // динамическое определение базового URL
axios.defaults.baseURL = baseURL;

export default {
    components: {
        Calendar,
        EmptyForm,
        AppointmentForm,
    },
    emits: ['closeForm'],
    setup(_,{emit}) {
        const selectedDate = ref(null);
        const currentForm = ref('EmptyForm');
        let busyTimes = ref([]);
        let successMessage  = ref('');
        let weekendTimes = ref([]);

        const handleDateSelected = (date) => {
            selectedDate.value = date;
            getTimeOfDay();
        };

        watch(selectedDate, (newValue) => {
            currentForm.value = newValue ? 'AppointmentForm' : 'EmptyForm';
        });

        const getTimeOfDay = async () => {
            if (selectedDate.value){
                const formattedDate = format(selectedDate.value, 'yyyy-MM-dd');

                //Промежуток сокращенного дня
                axios.get('api/calendar/times/' + formattedDate)
                    .then(dat => {
                        weekendTimes.value = dat.data;
                    }).catch(function (error) {
                    console.log(error);
                });

                //Время других записей
                axios.get('api/applications/' + formattedDate)
                    .then(res => {
                        busyTimes.value = res.data.times;
                    }).catch(function (error) {
                    console.log(error);
                });

            }
        }

        const handleCloseForm = () => {
            emit('closeForm');
            selectedDate.value = null;
            currentForm.value = 'EmptyForm';
        };


        return {
            selectedDate,
            handleDateSelected,
            handleCloseForm,
            currentForm,
            busyTimes,
            successMessage,
            weekendTimes,
            getTimeOfDay,
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
