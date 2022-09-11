import './bootstrap';

import {createApp} from 'vue';  

import app from './layouts/org.vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

const app2=createApp(app);
app2.use(VueSweetalert2);
app2.mount("#app"); 