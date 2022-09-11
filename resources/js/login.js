import './bootstrap';

import {createApp} from 'vue';  

import login from './layouts/login.vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

const app=createApp(login);
app.use(VueSweetalert2);
app.mount("#login"); 