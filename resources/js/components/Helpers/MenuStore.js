import { reactive } from 'vue';

export const menuStore = reactive({
    isMenuOpen: false,
    isMobileMenuOpen: false,
    toggleMenu() {
        this.isMenuOpen = !this.isMenuOpen;
    },
    toggleMobileMenu() {
        this.isMobileMenuOpen = !this.isMobileMenuOpen;
    }
});
