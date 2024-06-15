<template>
    <form class="form" @submit.prevent="postForm" method="post">
        <div class="block_forms">
            <h4 class="title_calendar">Выберите запись <span class="necessarily">*</span></h4>
            <div class="pole row_pole">
                <div class="form_radio_btn">
                    <input id="radio-1"type="radio" name="radio" value="1" v-model="appointmentType">
                    <label for="radio-1">На прием</label>
                </div>
                <div class="form_radio_btn">
                    <input id="radio-2" type="radio" name="radio" value="2" v-model="appointmentType">
                    <label for="radio-2">На консультацию</label>
                </div>
            </div>
        </div>
        <transition name="fade" mode="out-in">
            <component :is="currentFormComponent" :key="currentFormKey"
                       :times="times"
                       :initialName="name"
                       :initialPhone="phone"
                       :initialIsValidName="isValidName"
                       :initialIsFormValid="isFormValid"
                       :initialSelectedTimes="selectedTimes"

                       @UpdateName="updateName"
                       @UpdatePhone="updatePhone"
                       @selectedTimes="updateTimes"
                       @UpdateIsValidName="isValidName = $event"
                       @UpdateIsFormValid="isFormValid = $event">
            </component>
        </transition>
    </form>
</template>

<script>
import { ref, computed } from 'vue';
import VueTheMask from 'vue-the-mask';
import AppointmentForm from './AppointmentForm.vue';
import ConsultationForm from './ConsultationForm.vue';
import { format } from 'date-fns';

export default {
    props: {
        selectedDate: Date,
    },
    components: { VueTheMask, AppointmentForm, ConsultationForm },
    setup( props ) {
        const appointmentType = ref(null);
        const times = ref([
            { id: '1', label: '9:00 - 10:00', selected: false },
            { id: '2', label: '10:00 - 11:00', selected: false },
            { id: '3', label: '11:00 - 12:00', selected: false },
            { id: '4', label: '12:00 - 13:00', selected: false },
            { id: '5', label: '13:00 - 14:00', selected: false },
            { id: '6', label: '14:00 - 15:00', selected: false },
            { id: '7', label: '15:00 - 16:00', selected: false },
            { id: '8', label: '16:00 - 17:00', selected: false },
        ]);
        const name = ref('');
        const phone = ref('');
        const isValidName = ref(false);
        const isFormValid = ref(false);
        const selectedTimes = ref([]);

        const updateName = (value) => {
            name.value = value;
        };

        const updateTimes = (times) => {
            selectedTimes.value = times;
        };

        const updatePhone = (value) => {
            phone.value = value;
        };

        const currentFormKey = ref(null);
        const currentFormComponent = computed(() => {
            if (appointmentType.value === '1') {
                return 'AppointmentForm';
            } else if (appointmentType.value === '2') {
                return 'ConsultationForm';
            }
            return null;
        });



        const postForm = async () => {
            if (isFormValid.value) {
                const formattedDate = format(props.selectedDate, 'yyyy-MM-dd');

                const data = {
                    type: appointmentType.value,
                    name: name.value,
                    phone: phone.value,
                    times: appointmentType.value === '1' ? selectedTimes.value : ['8:45'],
                    dateCreate: formattedDate,
                };

                axios.post('api/applications', data)
                    .then(res => {
                        console.log(res)
                }).catch(function (error) {
                    console.log(error.toJSON());
                });
            }
        }

        return {
            appointmentType,
            times,
            name,
            phone,
            isValidName,
            isFormValid,
            currentFormKey,
            currentFormComponent,
            selectedTimes,
            updatePhone,
            updateName,
            updateTimes,
            postForm
        };
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

.fade-enter-active, .fade-leave-active {
    transition: opacity 0.3s, transform 0.3s;
}
.fade-enter-from, .fade-leave-to {
    opacity: 0;
    transform: translateY(10px);
}
</style>
