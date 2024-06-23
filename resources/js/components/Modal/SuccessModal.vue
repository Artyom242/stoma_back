<template>
    <transition name="slide-fade">
        <div v-if="visible" class="success-message">
            <p>{{ message }}</p>
        </div>
    </transition>
</template>

<script>
export default {
    props: {
        message: String,
        duration: {
            type: Number,
            default: 7000 // 7 секунд
        }
    },
    data() {
        return {
            visible: false
        };
    },
    mounted() {
        this.show();
    },
    methods: {
        show() {
            this.visible = true;
            setTimeout(() => {
                this.visible = false;
            }, this.duration);
        }
    }
};
</script>

<style scoped>
.success-message {
    position: fixed;
    bottom: -100px; /* Начальная позиция вне экрана */
    left: 50%;
    transform: translateX(-50%);
    background-color: #4caf50;
    color: white;
    padding: 15px;
    border-radius: 4px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-out, opacity 0.3s ease-out;
}

.slide-fade-enter-active, .slide-fade-leave-active {
    transition: all 0.3s ease;
}

.slide-fade-enter-from, .slide-fade-leave-to {
    transform: translateY(100px); /* Двигаем вверх при входе */
    opacity: 0;
}

.slide-fade-leave-active {
    transition: all 0.3s ease 6.7s; /* Добавляем задержку перед скрытием */
}
</style>
