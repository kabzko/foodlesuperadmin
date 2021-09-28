
import login from './components/pages/login.vue';
import home from './components/pages/home.vue';
import fare from './components/pages/fare.vue';
import rider_list from './components/pages/rider_list.vue';
import rider_detail from './components/pages/rider_detail.vue';
import store_list from './components/pages/store_list.vue';
import store_detail from './components/pages/store_detail.vue';
import chat_support from './components/pages/chat_support.vue';
import ticket_detail from './components/pages/ticket_detail.vue';
import active_orders_list from './components/pages/active_orders_list.vue';

export const routes = [
  {
    path: '/',
    component: home
  },
  {
    path: '/login',
    component: login
  },
  {
    path: '/fare',
    component: fare
  },
  {
    path: '/rider_list',
    component: rider_list
  },
  {
    path: '/rider_detail',
    component: rider_detail
  },
  {
    path: '/store_list',
    component: store_list
  },
  {
    path: '/store_detail',
    component: store_detail
  },
  {
    path: '/chat_support',
    component: chat_support
  },
  {
    path: '/ticket_detail',
    component: ticket_detail
  },
  {
    path: '/active_orders_list',
    component: active_orders_list
  },
];