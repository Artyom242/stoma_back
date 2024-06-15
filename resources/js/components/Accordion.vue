<template>
    <div class="accordion">
        <div
            v-for="(section, index) in sections"
            :key="section.id"
            class="accordion_item"
            :class="{active_item : index === activeIndex}">
            <button
                class="btn_blue accordion_btn"
                :class="{ accordion_btn__active: index === activeIndex }"
                @click="toggle(index)"
            >
                <div class="accordion_item__title">
                    <h4 class="light">{{ section.name }}</h4>
                </div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="plus"
                    width="100"
                    height="100"
                    viewBox="0 0 160 160"
                >
                    <rect class="vertical-line" x="70" width="20" height="160" rx="20" />
                    <rect class="horizontal-line" y="70" width="160" height="20" rx="20" />
                </svg>
            </button>
            <div
                class="accordion_content"
                :class="{ accordion_content__active: index === activeIndex }"
                :ref="'content' + index"
                :style="{ maxHeight: index === activeIndex ? `${contentHeights[index]}px` : '0' }"
            >
                <div
                    v-for="service in filteredServices(section.id)"
                    :key="service.id"
                    class="column_block"
                >
                    <p>{{ service.name }}</p>
                    <div class="price_block">
                        <p>{{ service.price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            activeIndex: 0,
            contentHeights: [],
            services: [],
            sections: [],
        };
    },
    async created() {
        await this.fetchData();
        this.$nextTick(() => {
            this.updateContentHeights();
            if (this.activeIndex !== null) {
                const content = this.$refs['content' + this.activeIndex][0];
                if (content) {
                    const padding = parseFloat(window.getComputedStyle(content).paddingTop) +
                        parseFloat(window.getComputedStyle(content).paddingBottom);
                    content.style.maxHeight = `${content.scrollHeight + padding}px`;
                }
            }
        });
    },
    methods: {
        async fetchData() {
            try {
                const response = await axios.get('/api/stickyHeader');
                this.services = response.data.services;
                this.sections = response.data.sections;
            } catch (error) {
                console.error('Ошибка при получении данных:', error);
            }
        },
        toggle(index) {
            if (this.activeIndex === index) {
                this.activeIndex = null;
            } else {
                this.activeIndex = index;
                this.$nextTick(() => {
                    this.updateContentHeights();
                    const content = this.$refs['content' + index][0];
                    if (content) {
                        const padding = parseFloat(window.getComputedStyle(content).paddingTop) +
                            parseFloat(window.getComputedStyle(content).paddingBottom);
                        content.style.maxHeight = `${content.scrollHeight + padding}px`;
                    }
                });
            }
        },
        filteredServices(sectionId) {
            return this.services.filter((service) => service.section_id === sectionId);
        },
        updateContentHeights() {
            this.contentHeights = this.sections.map((section, index) => {
                const content = this.$refs['content' + index][0];
                if (content) {
                    const padding = 20;
                    return content.scrollHeight + padding;
                }
                return 0;
            });
        },
    },
    mounted() {
        this.$nextTick(() => {
            this.updateContentHeights();
            if (this.activeIndex !== null) {
                const content = this.$refs['content' + this.activeIndex][0];
                if (content) {
                    const padding =
                        parseFloat(window.getComputedStyle(content).paddingTop) +
                        parseFloat(window.getComputedStyle(content).paddingBottom);
                    content.style.maxHeight = `${content.scrollHeight + padding}px`;
                }
            }
        });
    },
    watch: {
        activeIndex() {
            this.$nextTick(() => {
                this.updateContentHeights();
            });
        },
    },
};
</script>

<style scoped>
</style>
