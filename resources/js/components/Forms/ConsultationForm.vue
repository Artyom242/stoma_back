<template>
    <div class="column_form_two">
        <div class="block_forms">
            <h4 class="title_calendar">Свободное время</h4>
            <p>Консультация проходит в 8:45</p>
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
import {ref, computed, watch, defineComponent} from 'vue';

export default defineComponent({
    props: {
        times: Array,
        initialName: String,
        initialPhone: String,
        initialIsValidName: Boolean,
        initialIsFormValid: Boolean,
    },
    emits: ['UpdateName', 'UpdatePhone', 'UpdateIsValidName', 'UpdateIsFormValid'],
    setup(props, { emit }) {
        const localName = ref(props.initialName);
        const localPhone = ref(props.initialPhone);

        const UpdateName = (value) => {
            emit('UpdateName', localName.value);
            UpdateIsValidName(localName.value);
        };

        const UpdatePhone = (value) => {
            emit('UpdatePhone', localPhone.value);
            UpdateIsFormValid()
        };

        const UpdateIsValidName = (value) => {
            const isValid = /^[A-Za-zА-Яа-яЁё]*$/.test(value);
            emit('UpdateIsValidName', isValid);
            UpdateIsFormValid();
        };

        const UpdateIsFormValid = () => {
            const isNameValid = /^[A-Za-zА-Яа-яЁё]*$/.test(localName.value) && localName.value !== '';
            const isPhoneValid = localPhone.value !== null && localPhone.value.trim() !== '' && localPhone.value.length === 17;
            emit('UpdateIsFormValid', isNameValid && isPhoneValid);
        };

        watch(() => props.initialName, UpdateName);
        watch(() => props.initialPhone, UpdatePhone);

        // Initialize validation state with initial props
        UpdateIsFormValid();
        UpdateIsValidName(localName.value);
        UpdatePhone(localPhone.value);

        return {
            localName,
            localPhone,
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

.fade-enter-active, .fade-leave-active {
    transition: opacity 0.3s, transform 0.3s;
}
.fade-enter-from, .fade-leave-to {
    opacity: 0;
    transform: translateY(10px);
}
</style>

