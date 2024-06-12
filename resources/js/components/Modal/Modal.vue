<template>
    <div>
        <Modal v-if="isModal1Visible" :title="modal1Title" @update:isVisible="isModal1Visible = $event">
            <p>Контент модального окна 1</p>
        </Modal>

        <Modal v-if="isModal2Visible" :title="modal2Title" @update:isVisible="isModal2Visible = $event">
            <p>Контент модального окна 2</p>
        </Modal>
    </div>
</template>

<script>
import Modal from '../Modal/ModalFrame.vue';

export default {
    components: {
        Modal
    },
    data() {
        return {
            isModal1Visible: false,
            isModal2Visible: false,
            modal1Title: 'Запись на прием',
            modal2Title: 'Оставить отзыв'
        };
    },
    methods: {
        openModal1() {
            this.isModal1Visible = true;
        },
        openModal2() {
            this.isModal2Visible = true;
        }
    }
}
</script>
