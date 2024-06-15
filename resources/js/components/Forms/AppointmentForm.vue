<template>
    <div class="column_form_two">
        <div class="block_forms">
            <h4 class="title_calendar">Свободное время <span class="necessarily">*</span></h4>
            <div class="pole checkbox_btn_column">
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
                <input class="btn btn_input" type="text" @input="UpdateName" placeholder="Иван" v-model="localName">
                <transition name="fade">
                    <p v-if="!initialIsValidName" class="text_small">Имя должно содержать только буквы кириллицы и латиницы</p>
                </transition>
            </div>
            <div class="pole column_pole">
                <h4 class="title_calendar">Введите свой телефон <span class="necessarily">*</span></h4>
                <input class="btn btn_input" @input="UpdatePhone" v-model="localPhone" v-mask="'+7 (###) ###-####'" placeholder="+7 (___) ___-____" type="tel">
            </div>
            <div class="pole column_pole">
                <button class="btn btn_submit" type="submit" :disabled="!initialIsFormValid"><span>Записаться</span></button>
                <p><span class="text_small">Нажимая на кнопку, вы даете согласие на обработку
                                                    персональных данных и соглашаетесь с политикой конфиденциальности</span></p>
            </div>
        </div>
    </div>
</template>

<script>
import {ref, computed, watch, defineComponent, nextTick} from 'vue';

export default defineComponent({
    props: {
        times: Array,
        initialName: String,
        initialPhone: String,
        initialIsValidName: Boolean,
        initialIsFormValid: Boolean,
        initialSelectedTimes: Array,
    },
    emits: ['UpdateName', 'UpdatePhone', 'UpdateIsValidName', 'UpdateIsFormValid', 'selectedTimes'],
    setup(props, { emit }) {
        const localName = ref(props.initialName);
        const localPhone = ref(props.initialPhone);

        const UpdateName = (value) => {
            emit('UpdateName', localName.value);
            UpdateIsValidName(localName.value);
        };

        const updateIsValidTime = async () => {
            await nextTick();
            const selectedTimes = props.times.filter(time => time.selected).map(time => time.label);
            emit('selectedTimes', selectedTimes);
            UpdateIsFormValid();
        };

        const UpdatePhone = (value) => {
            emit('UpdatePhone', localPhone.value);
            UpdateIsFormValid();
        };

        const UpdateIsValidName = (value) => {
            const isValid = /^[A-Za-zА-Яа-яЁё]*$/.test(value);
            emit('UpdateIsValidName', isValid);
            UpdateIsFormValid();
        };

        const UpdateIsFormValid = () => {
            const isNameValid = /^[A-Za-zА-Яа-яЁё]*$/.test(localName.value) && localName.value !== '';
            const isPhoneValid = localPhone.value !== null && localPhone.value.trim() !== '' && localPhone.value.length === 17;
            const isTimeValid = props.times.some(time => time.selected);
            emit('UpdateIsFormValid', isNameValid && isPhoneValid && isTimeValid);
        };

        watch(() => props.times, updateIsValidTime, { deep: true });
        watch(() => props.initialName, UpdateName);
        watch(() => props.initialPhone, UpdatePhone);

        UpdateIsFormValid();
        UpdateIsValidName(localName.value);
        UpdatePhone(localPhone.value);

        return {
            localName,
            localPhone,
            updateIsValidTime,
            UpdateName,
            UpdatePhone,
            UpdateIsFormValid,
            isFormValid: computed(() => props.initialIsFormValid),
            isValidName: computed(() => props.initialIsValidName)
        };
    },
});
</script>

<style>
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

.fade-enter-active, .fade-leave-active {
    transition: opacity 0.3s, transform 0.3s;
}
.fade-enter-from, .fade-leave-to {
    opacity: 0;
    transform: translateY(10px);
}
</style>
