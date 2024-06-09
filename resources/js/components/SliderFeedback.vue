<template>
    <swiper
        :modules="modules"
        :slides-per-view="'auto'"
        :space-between="15"
        :free-mode="true"
        :free-mode-momentum="true"
        :free-mode-momentum-ratio="1"
        :free-mode-momentum-velocity-ratio="2"
        @swiper="onSwiper"
        @slideChange="onSlideChange"
        class="feedback_container"
    >
        <swiper-slide
            class="feedback_slide"
            v-for="(feedback, index) in feedbacks"
            :key="index"
        >
            <div class="feedback_block">
                <div class="pole row_pole feedback_gap">
                    <div class="pole row_pole ">
                        <div class="img_profile">
                            <img :src="feedback.profileImg" class="img" alt="Иконка профиля" />
                        </div>
                        <div>
                            <h5 class="p_20">{{ feedback.name }}</h5>
                            <p class="p_16">{{ feedback.title }}</p>
                        </div>
                    </div>
                    <div class="pole row_pole row_star">
                        <div v-for="(star, i) in 5" :key="i">
                            <img :src="star <= feedback.stars ? starFilled : starEmpty" alt="" />
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text_small">{{ feedback.text }}</p>
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>

<script>

import { FreeMode} from 'swiper/modules';
import { Swiper, SwiperSlide } from 'swiper/vue';

import 'swiper/css';
import 'swiper/css/free-mode';

export default {
    components: {
        Swiper,
        SwiperSlide,
    },
    props: {
        profileImg: String,
        starFilled: String,
        starEmpty: String
    },
    data() {
        return {
            feedbacks: [
                {
                    profileImg: this.profileImg,
                    name: "Илья",
                    title: "Профилактика",
                    stars: 2,
                    text: "Клиника очень хорошая. Есть все специалисты, персонал отличный, мне нравится все, оборудование современное, всё качественно, быстро и без боли. Просто супер.",
                },
                {
                    profileImg: this.profileImg,
                    name: "Илья",
                    title: "Профилактика",
                    stars: 5,
                    text: "Клиника очень хорошая. Есть все специалисты, персонал отличный, мне нравится все, оборудование современное, всё качественно, быстро и без боли. Просто супер.",
                },
                {
                    profileImg: this.profileImg,
                    name: "Илья",
                    title: "Профилактика",
                    stars: 3,
                    text: "Клиника очень хорошая. Есть все специалисты, персонал отличный, мне нравится все, оборудование современное, всё качественно, быстро и без боли. Просто супер.",
                },
                {
                    profileImg: this.profileImg,
                    name: "Илья",
                    title: "Профилактика",
                    stars: 5,
                    text: "Клиника очень хорошая. Есть все специалисты, персонал отличный, мне нравится все, оборудование современное, всё качественно, быстро и без боли. Просто супер.",
                },
                {
                    profileImg: this.profileImg,
                    name: "Илья",
                    title: "Профилактика",
                    stars: 5,
                    text: "Клиника очень хорошая. Есть все специалисты, персонал отличный, мне нравится все, оборудование современное, всё качественно, быстро и без боли. Просто супер.",
                },
                {
                    profileImg: this.profileImg,
                    name: "Илья",
                    title: "Профилактика",
                    stars: 5,
                    text: "Клиника очень хорошая. Есть все специалисты, персонал отличный, мне нравится все, оборудование современное, всё качественно, быстро и без боли. Просто супер.",
                },
                {
                    profileImg: this.profileImg,
                    name: "Илья",
                    title: "Профилактика",
                    stars: 5,
                    text: "Клиника очень хорошая. Есть все специалисты, персонал отличный, мне нравится все, оборудование современное, всё качественно, быстро и без боли. Просто супер.",
                },
            ],
        };
    },
    setup() {
        const onSwiper = (swiper) => {
            console.log(swiper);
        };
        const onSlideChange = () => {
            console.log('slide change');
        };
        return {
            onSwiper,
            onSlideChange,
            modules: [FreeMode],
        };
    },
};
</script>

<style scoped>
.feedback_slide {
    width:auto;height:auto;cursor:pointer
}
</style>
