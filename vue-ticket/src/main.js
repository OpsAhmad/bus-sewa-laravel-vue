import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios'
import detail from './Detail.vue'
import home from './Home.vue'
import login from './Login.vue'
import register from './Register.vue'
import ticket from './Ticket.vue'
import App from './App.vue'

Vue.config.productionTip = false

Vue.use(VueRouter);
Vue.prototype.$axios = axios;

const routes = [
  {path:'/',name:"home",component:home},
  {path:'/login',name:"login",component:login},
  {path:'/register',name:"register",component:register},
  {path:'/detail',name:"detail",component:detail},
  {path:'/ticket',name:"ticket",component:ticket},
]

const router = new VueRouter({
  mode:"history",
  routes
});

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
