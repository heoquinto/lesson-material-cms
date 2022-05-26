import Vue from 'vue'
import VueRouter from 'vue-router'

import Dashboard from 'src/components/modules/dashboard/Dashboard';
import PageEdit from 'src/components/modules/page/PageEdit';

Vue.use(VueRouter);

const routes = [
    {
        path: '',
        name: 'Dashboard',
        component: Dashboard,
    },
    {
        path: '/page/edit/:pageId',
        name: 'PageEdit',
        component: PageEdit,
        props: true
    }
];

export default new VueRouter({
    mode: 'hash',
    base: process.env.BASE_URL,
    routes
})
