<template>
    <transition name="success">
        <div v-show="visible" class="success-message __container">
            <p class="success-message_text">{{ message }}</p>
        </div>
    </transition>
</template>

<script>
import eventBus from '../Helpers/eventBus';

export default {
    props: {
        duration: {
            type: Number,
            default: 7000
        }
    },
    data() {
        return {
            visible: false,
            message: ''
        };
    },
    mounted() {
        eventBus.on('showSuccess', this.show);
    },
    methods: {
        show(message) {
            this.message = message;
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
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    background-color: #4caf50;
    color: white;
    z-index: 10000;
    padding: 15px;
    border-radius: 4px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-out;
}

.success-message_text {
    font-weight: 500;
}

.success-enter-active, .success-leave-active {
    transition: all 0.3s ease-out;
}
.success-enter-from, .success-leave-to {
    opacity: 0;
    transform: translateY(100px) translateX(-50%);
}
</style>

