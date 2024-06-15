/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

    import './bootstrap';
    import { createApp } from 'vue';
    import SliderFeedback from './components/SliderFeedback.vue';
    import Accordion from './components/Accordion.vue';
    import Sticky from './components/Header/Sticky.vue';
    import Burger from './components/Header/Burger/Burger.vue';
    import BurgerButton from './components/Header/Burger/BurgerButton.vue';
    import Header_bottom from './components/Header/Header_bottom.vue';
    import Modal from './components/Modal/Modal.vue';
    import CalendarBlock from './components/CalendarBlock.vue';
    import AppointmentForm from './components/Forms/FormFrame.vue';
    import VueTheMask from 'vue-the-mask';
    import BtnModal from './components/Modal/btnModal.vue';

    /**
     * Next, we will create a fresh Vue application instance. You may then begin
     * registering components with the application instance so they are ready
     * to use in your application's vie ws. An example is included for you.
     */

    const app = createApp({
        components: {
            Accordion,
            SliderFeedback,
            Sticky,
            Burger,
            BurgerButton,
            Header_bottom,
            Modal,
            CalendarBlock,
            AppointmentForm,
            BtnModal,
        }
    });

    app.use(VueTheMask);

    app.component('slider-feedback', SliderFeedback);
    app.component('accordion', Accordion);
    app.component('header-sticky', Sticky);
    app.component('burger', Burger);
    app.component('burgerButton', BurgerButton);
    app.component('header-bottom', Header_bottom);
    app.component('modal', Modal);
    app.component('calendar-block', CalendarBlock);
    app.component('appointment-form', AppointmentForm);
    app.component('btn-modal', BtnModal);


    app.mount('#app');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

