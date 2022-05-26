import './form-components';
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'bootstrap/dist/css/bootstrap.css'

import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
import {ServerTable, ClientTable} from 'vue-tables-2';

import App from './App.vue';
import global from './global';
import Layout from 'src/layouts/Layout1.vue';
import router from './router.js'
import Vue from 'vue';
import VueToastr from 'vue-toastr';

Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)
Vue.use(ClientTable, {}, false, 'bootstrap3', {});
Vue.use(ServerTable, {}, false, 'bootstrap3', {});
Vue.use(VueToastr)

Vue.mixin(global);

Vue.component('Layout', Layout);

window.axios = require('axios');

const app = new Vue({
  router,
  render: h => h(App)
}).$mount('#app');
