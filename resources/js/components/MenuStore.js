import { reactive } from 'vue';

export const menuStore = reactive({
    isMenuOpen: false,
    toggleMenu() {
        this.isMenuOpen = !this.isMenuOpen;
    }
});
