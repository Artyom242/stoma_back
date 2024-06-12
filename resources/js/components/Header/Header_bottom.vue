<template>
    <div class="header_bottom">
        <div class="__container">
            <div class="header_bottom_section">
                <div class="header_bottom_block">
                    <nav class="header_bottom_menu">
                        <div class="item_menu_icon">
                            <p>Все услуги</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6"
                                 viewBox="0 0 13 7">
                                <path
                                    d="M3.25762 3.72175L6.51269 6.97937L9.76777 3.72175L13.0254 0.466675H6.51269H0L3.25762 3.72175Z"
                                    fill="#2F2F2F" />
                            </svg>
                            <div class="services_menu">
                                <h3>Услуги клиники</h3>
                                <div class="services_menu_sections">
                                    <div class="services_menu_block"
                                         v-for="(section, index) in sections"
                                         :key="section.id">
                                        <div class="services_menu_block__title">
                                            <img :src="'/storage/' + section.image" class="img services_menu_block__img" alt="Иконка лечение зуба">
                                            <h5>{{ section.name }}</h5>
                                        </div>
                                        <nav class="services_menu_block__boby">
                                            <a href=""
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
    </div>
</template>

<script>
import { fetchData } from '../Helpers/dataFetch';

    export default {
        data() {
            return {
                services: [],
                sections: [],
                links: {}
            };
        },
        async created() {
            const data = await fetchData();
            this.services = data.services;
            this.sections = data.sections;
            this.links = data.links;
        },
        methods: {
            filteredServices(sectionId) {
                return this.services.filter((service) => service.section_id === sectionId);
            }
        }
    }
</script>

<style scoped>

</style>
