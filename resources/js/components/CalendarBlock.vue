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
        let controller = ref(null);
        let timeoutId = ref(null);

        const handleDateSelected = (date) => {
            if (timeoutId.value) {
                clearTimeout(timeoutId.value);
            }

            timeoutId.value = setTimeout(() => {
                selectedDate.value = date;
                getTimeOfDay();
            }, 700);
        };

        watch(selectedDate, (newValue) => {
            currentForm.value = newValue ? 'AppointmentForm' : 'EmptyForm';
        });

        const getTimeOfDay = async () => {
                    if (selectedDate.value) {

                        if (controller.value) {
                            controller.value.abort();
                        }

                        controller.value = new AbortController();
                        const signal = controller.value.signal;

                        const formattedDate = format(selectedDate.value, 'yyyy-MM-dd');

                        //Промежуток сокращенного дня
                        axios.get('api/calendar/times/' + formattedDate, { signal })
                            .then(dat => {
                                weekendTimes.value = dat.data;
                            }).catch(function (error) {
                            console.log(error);
                        });

                        //Время других записей
                        axios.get('api/applications/' + formattedDate,{ signal })
                            .then(res => {
                                busyTimes.value = res.data.times;
                                console.log('ad')
                            }).catch(function (error) {
                                console.log(error)
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
