require('./bootstrap');

import { createApp } from 'vue';
import registration from './components/registration.vue';
import personal_page from './components/personalPage.vue';
import test from './components/test.vue';
import main_page from './components/mainPage.vue';

const app = createApp({});

app.component('registration', registration);
app.component('cabinet', personal_page);
app.component('test', test);
app.component('main_page', main_page);

app.mount('#app');
