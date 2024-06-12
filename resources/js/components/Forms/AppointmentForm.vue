<template>
    <form class="form" @submit.prevent="validateForm">
        <div class="block_forms">
            <h4 class="title_calendar">Выберите запись <span class="necessarily">*</span></h4>
            <div class="pole row_pole">
                <div class="form_radio_btn">
                    <input id="radio-1" type="radio" name="radio" value="1" v-model="appointmentType">
                    <label for="radio-1">На прием</label>
                </div>
                <div class="form_radio_btn">
                    <input id="radio-2" type="radio" name="radio" value="2" v-model="appointmentType">
                    <label for="radio-2">На консультацию</label>
                </div>
            </div>
        </div>
        <div class="block_forms">
            <h4 class="title_calendar">Свободное время <span class="necessarily">*</span></h4>
            <div class="pole">
                <div class="pole column_pole">
                    <div class="block_checkbox" v-for="(time, index) in times.slice(0, Math.ceil(times.length / 2))" :key="index">
                        <input class="input_checkbox" type="checkbox" :id="time.id" v-model="time.selected">
                        <label :for="time.id">{{ time.label }}</label>
                    </div>
                </div>
                <div class="pole column_pole">
                    <div class="block_checkbox" v-for="(time, index) in times.slice(Math.ceil(times.length / 2))" :key="index">
                        <input class="input_checkbox" type="checkbox" :id="time.id" v-model="time.selected">
                        <label :for="time.id">{{ time.label }}</label>
                    </div>
                </div>
            </div>

        </div>
        <div class="block_forms">
            <div class="pole column_pole">
                <h4 class="title_calendar">Введите свое имя <span class="necessarily">*</span></h4>
                <input class="btn btn_input" type="text" placeholder="Иван" v-model="name">
            </div>
            <div class="pole column_pole">
                <h4 class="title_calendar">Введите свой телефон <span class="necessarily">*</span></h4>
                <input class="btn btn_input" v-model="phone" v-mask="'+7 (###) ###-####'" placeholder="+7 (___) ___-____" type="tel">
            </div>
            <div class="pole column_pole">
                <button class="btn btn_submit" type="submit" :disabled="!isFormValid"><span>Записаться</span></button>
                <p><span class="text_small">Нажимая на кнопку, вы даете согласие на обработку
                                            персональных данных и соглашаетесь с политикой конфиденциальности</span></p>
            </div>
        </div>
      </form>
</template>

<script>
import { ref, computed } from 'vue';
import VueTheMask from 'vue-the-mask';

export default {
    components: { VueTheMask },
    setup() {
        const appointmentType = ref(null);
        const times = ref([
            { id: '1', label: '9:00 - 10:00', selected: false },
            { id: '2', label: '10:00 - 11:00', selected: false },
            { id: '3', label: '12:00 - 13:00', selected: false },
            { id: '4', label: '14:00 - 15:00', selected: false },
            { id: '5', label: '16:00 - 17:00', selected: false },
        ]);
        const name = ref('');
        const phone = ref('');
        const selectedDate = ref(null);

        const isValidType = computed(() => appointmentType.value !== null);
        const isValidTime = computed(() => times.value.some(time => time.selected));
        const isValidName = computed(() => /^[А-Яа-яЁё]+$/.test(name.value));
        const isValidPhone = computed(() => phone.value !== null && phone.value.trim() !== '');
        const isFormValid = computed(() => isValidType.value && isValidTime.value && isValidName.value && isValidPhone.value );

        const validateForm = () => {
            if (isFormValid.value) {
                console.log('Форма валидна');
                // Отправка формы или другие действия
            } else {
                console.log('Форма не валидна');
                // Показать сообщение об ошибке или другие действия
            }
        };

        return { appointmentType, times, name, phone, selectedDate, isValidTime, isFormValid, isValidPhone, isValidType, isValidName, validateForm };
    }
}
</script>

<style scoped>
[disabled],
[disabled]:hover,
[disabled]:after,
[disabled]:before{
    background: #bdbdbd;
    color: white;
    box-shadow: none;
    font-weight: normal;
    cursor: default;
}

</style>
