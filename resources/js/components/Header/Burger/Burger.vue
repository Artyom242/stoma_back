<template>
    <div>
        <burgerButton></burgerButton>

        <div :class="{ 'header_top_burger_menu': true, 'open': menuStore.isMenuOpen }" ref="menu">
            <div class="burger_menu">
                <nav class="header_bottom_menu">
                    <div class="header_bottom_menu_serveces">
                        <div class="item_menu_icon" id="menu_service" @click="menuStore.toggleMobileMenu">
                            <p>Все услуги</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 13 7">
                                <path
                                    d="M3.25762 3.72175L6.51269 6.97937L9.76777 3.72175L13.0254 0.466675H6.51269H0L3.25762 3.72175Z"
                                    fill="#2F2F2F" />
                            </svg>
                        </div>
                        <div class="services_menu_mobile" :class="{ 'block': menuStore.isMobileMenuOpen }" :style="{ maxHeight: menuStore.isMobileMenuOpen ? mobileMenuMaxHeight : '0' }">
                            <div class="services_menu_sections">
                                <div class="services_menu_block"
                                     v-for="(section, index) in sections"
                                     :key="section.id">
                                    <div class="services_menu_block__title">
                                        <img :src="'/storage/' + section.image" class="img" alt="">
                                        <h5>{{ section.name }}</h5>
                                    </div>
                                    <nav class="services_menu_block__boby">
                                        <a href="#"
                                           v-for="service in filteredServices(section.id)"
                                           :key="service.id"
                                        >{{ service.name }}</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a :href="links.clinic">О клинике</a>
                    <a :href="links.price">Цены</a>
                    <a :href="links.feedback">Отзывы</a>
                    <a :href="links.contact">Контакты</a>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import { menuStore } from '../../Helpers/MenuStore';
import BurgerButton from './BurgerButton.vue';
import {computed} from "vue";

export default {
    components: { BurgerButton },
    setup() {
        const mobileMenuMaxHeight = computed(() => {
            const mobileMenu = document.querySelector('.services_menu_mobile');
            return mobileMenu ? `${mobileMenu.scrollHeight + 40}px` : '0';
        });

        return {
            menuStore,
            mobileMenuMaxHeight
        };
    },
    data() {
        return {
            services: [],
            sections: [],
            links: {}
        };
    },
    created() {
        this.fetchData();
    },
    methods: {
        async fetchData() {
            try {
                const response = await axios.get('/api/stickyHeader');
                this.services = response.data.services;
                this.sections = response.data.sections;
                this.links = response.data.links;
            } catch (error) {
                console.error('Ошибка при получении данных:', error);
            }
        },
        filteredServices(sectionId) {
            return this.services.filter((service) => service.section_id === sectionId);
        },

        handleClick(event) {
            const menu = this.$refs.menu;
            if (menu && menuStore.isMenuOpen) {
                const isClickInsideMenu = menu.contains(event.target);
                const isClickOnBurger = event.target.classList.contains('header_top_burger');
                if (!isClickInsideMenu && !isClickOnBurger) {
                    menuStore.toggleMenu();
                }
            }
        }
    },
    mounted() {
        document.addEventListener('click', this.handleClick);
    },
    beforeUnmount() {
        document.removeEventListener('click', this.handleClick);
    }
}
</script>

<style scoped>

</style>
