<template>
    <div class="feedback_form">
        <form @submit.prevent="CreateFeedback" method="post" class="form">
            <div class="block_forms">
                <h4 class="title_calendar">Какие услуги вы проходили?</h4>
                <div class="container">
                    <v-select
                        class="style-chooser"
                        multiple
                        v-model="selectedServices"
                        placeholder="Начните вводить услугу"
                        :options="services"
                        :getOptionLabel="service => service.name"
                    ></v-select>
                </div>
            </div>
            <div class="block_forms">
                <h4 class="title_calendar">Напишите отзыв *</h4>
                <div class="pole">
                    <textarea v-model="feedback" class="feedback_text_textarea" id=""></textarea>
                </div>
            </div>

            <div class="block_forms">
                <div class="pole title_rating_block">
                    <h4 class="title_calendar">Поставьте оценку</h4>
                    <transition name="fade">
                        <button v-if="rating" type="button" @click="clearRating" class=" clear-rating-button">Очистить</button>
                    </transition>
                </div>
                <div class="pole">
                    <div class="stars">
                        <img
                            v-for="star in 5"
                            :key="star"
                            :src="star <= rating ? '/images/icons/stars/star_yellow.svg' : '/images/icons/stars/star_grey.svg'"
                            alt="Звезда"
                            @click="setRating(star)"
                        />
                    </div>
                    <input type="hidden" name="rating" id="rating" value="0">
                </div>
            </div>

            <div class="block_forms">
                <div class="pole column_pole">
                    <h4 class="title_calendar">Введите свое имя <span class="necessarily">*</span></h4>
                    <input class="btn btn_input" type="text" @input="UpdateIsValidName" placeholder="Иван" v-model="name">
                    <transition name="fade">
                        <p v-if="!isValidName" class="text_small">Имя должно содержать только буквы кириллицы и латиницы</p>
                    </transition>
                </div>
                <div class="pole column_pole">
                    <h4 class="title_calendar">Введите свой телефон <span class="necessarily">*</span></h4>
                    <input class="btn btn_input" v-model="phone" v-mask="'+7 (###) ###-####'" placeholder="+7 (___) ___-____" type="tel">
                    <button class="btn btn_submit" :disabled="!isFormValid" type="submit"><span>Отправить</span></button>
                    <p><span class="text_small">Нажимая на кнопку, вы даете согласие на обработку
                                                        персональных данных и соглашаетесь с политикой конфиденциальности</span></p>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import "vue-select/dist/vue-select.css";
    import {ref, onMounted, watch} from "vue";
    import VueTheMask from 'vue-the-mask';
    import eventBus from '../../Helpers/eventBus';

    export default {
        components: {
            VueTheMask
        },
        emits: ['closeForm'],
        setup() {
            const services = ref([]);
            const rating = ref(0);
            const feedback = ref('');
            const name = ref('');
            const isValidName = ref(true);
            const phone = ref('');
            const selectedServices = ref([]);
            const isFormValid = ref(false);
            let modalSuccess = ref([]);

            const getServices = async () => {
                axios.get('api/feedback')
                    .then(res => {
                        services.value = res.data
                        console.log(services.value);
                    }) .catch(function (error){
                    console.log(error);
                })
            }

            const setRating = (value) => {
                rating.value = value;
            };

            const clearRating = () => {
                rating.value = 0;
            };


            const UpdateIsValidName = (value) => {
                isValidName.value = /^[A-Za-zА-Яа-яЁё]*$/.test(name.value);
            };

            const UpdateIsFormValid = async () => {
                let isFeedbackText = feedback.value.trim().length > 0;
                let isNameValid = /^[A-Za-zА-Яа-яЁё]*$/.test(name.value) && name.value !== '';
                let isPhoneValid = phone.value !== null && phone.value.trim() !== '' && phone.value.length === 17;
                isFormValid.value =  isFeedbackText && isNameValid && isPhoneValid;
            }

            const CreateFeedback = async () => {
                if (isFormValid){
                    try {
                        let data = {
                            name: name.value,
                            phone: phone.value,
                            feedback: feedback.value,
                            rating: rating.value,
                            services: selectedServices.value
                        }

                        const response = await axios.post('api/feedback', data);
                        modalSuccess.value = response.data;


                        name.value = '';
                        phone.value = '';
                        feedback.value = '';
                        rating.value = 0;
                        services.value = [];
                        isValidName.value = false;

                    } catch (error) {
                        console.log(error.toJSON());
                    }
                }
            }

            watch([feedback, name, phone], UpdateIsFormValid);

            onMounted(() => {
                getServices();
            });
            return {
                selectedServices,
                services,
                rating,
                feedback,
                name,
                phone,
                isValidName,
                isFormValid,
                setRating,
                UpdateIsValidName,
                UpdateIsFormValid,
                clearRating,
                CreateFeedback,
            };
        },
    };
</script>

<style>
.style-chooser {
    box-shadow: 2px 2px 10px #bdbdbd;
}
style-chooser input,
.style-chooser .vs__search{
    font-size: 18px;
}

.style-chooser .vs__selected-options {
    padding: 3px 10px;
}


.style-chooser .vs__selected {
        padding: 0.30em 0.60em;
        background: #0082cb;
        color: white;
        border: none;
    }
.style-chooser .vs-dropdown-option--active-bg {
    background: #0082cb;
    }

.clear-rating-button {
    color: white;
    margin-left: 10px;
    border-radius: 10px;
    cursor: pointer;
    background: #2f2f2f;
    font-size: 14px;
    padding: 2px 10px;
    max-width: max-content;
}

.title_rating_block {
    min-height: 25px;
}

</style>
