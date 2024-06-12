<template>
    <div class="calendar_block">
        <table class="calendar">
            <thead>
            <tr class="row_title_calendar">
                <td class="arrow prev" @click="prevMonth">‹</td>
                <td colspan="5" class="title_calendar">{{ monthNames[month] }} {{ year }}</td>
                <td class="arrow next" @click="nextMonth">›</td>
            </tr>
            <tr class="row_days_calendar">
                <td>Пн</td>
                <td>Вт</td>
                <td>Ср</td>
                <td>Чт</td>
                <td>Пт</td>
                <td>Сб</td>
                <td>Вс</td>
            </tr>
            </thead>
            <tbody class="body_calendar">
            <tr v-for="(week, weekIndex) in calendar" :key="weekIndex">
                <td v-for="(day, dayIndex) in week" :key="day.date ? day.date.toISOString() : dayIndex"
                    :class="{ today: isToday(day), selected: isSelected(day), holiday: isHoliday(dayIndex) }"
                    @click="selectDay(day)">
                    {{ day.day }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { ref, computed, defineEmits } from 'vue';

export default {
    emits: ['date-selected'],
    setup(props, { emit }) {
        const now = new Date();
        const year = ref(now.getFullYear());
        const month = ref(now.getMonth());
        const selectedDay = ref(null);

        const monthNames = [
            "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
            "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"
        ];

        const isToday = (day) => {
            const today = new Date();
            return day.date &&
                day.date.getDate() === today.getDate() &&
                day.date.getMonth() === today.getMonth() &&
                day.date.getFullYear() === today.getFullYear();
        };

        const isSelected = (day) => {
            return selectedDay.value && day.date && selectedDay.value.getTime() === day.date.getTime();
        };

        const calendar = computed(() => {
            const Dlast = new Date(year.value, month.value + 1, 0).getDate();
            const DNfirst = new Date(year.value, month.value, 1).getDay();
            const startOffset = DNfirst === 0 ? 6 : DNfirst - 1;

            const days = [];
            for (let i = 0; i < startOffset; i++) {
                days.push({ day: '', date: null });
            }
            for (let i = 1; i <= Dlast; i++) {
                days.push({ day: i, date: new Date(year.value, month.value, i) });
            }

            const weeks = [];
            while (days.length) {
                weeks.push(days.splice(0, 7));
            }

            return weeks;
        });

        const isHoliday = (dayIndex) => {
            return dayIndex === 5 || dayIndex === 6;
        };
        const selectDay = (day) => {
            if (day.date) {

                if (selectedDay.value && selectedDay.value.getTime() === day.date.getTime()) {
                    selectedDay.value = null;
                    emit('date-selected', null);
                } else {
                    selectedDay.value = day.date;
                    emit('date-selected', day.date);
                }
            }
        };

        const prevMonth = () => {
            month.value--;
            if (month.value < 0) {
                month.value = 11;
                year.value--;
            }
        };

        const nextMonth = () => {
            month.value++;
            if (month.value > 11) {
                month.value = 0;
                year.value++;
            }
        };

        return { year, month, calendar, monthNames, isToday, isSelected, isHoliday, selectDay, prevMonth, nextMonth };
    }
}
</script>

<style scoped>
.selected {
    background: rgb(220, 241, 253);;
}
</style>
