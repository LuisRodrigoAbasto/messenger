/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';

import BootstrapVue from 'bootstrap-vue'
import store from'./store'

import VueRouter from 'vue-router'
import MessengerComponent from './components/Mensaje.vue'
import ExampleComponent from './components/ExampleComponent.vue'

Vue.use(VueRouter)

Vue.use(BootstrapVue);

Vue.component('contacto', require('./components/Contacto.vue').default);
Vue.component('contacto-lista', require('./components/ContactoLista.vue').default);
Vue.component('contacto-form', require('./components/ContactoForm.vue').default);
Vue.component('contacto-activo', require('./components/ContactoActivo').default);
Vue.component('mensaje-conversacion', require('./components/MensajeConversacion').default);
// Vue.component('mensaje', require('./components/Mensaje.vue').default);
Vue.component('status-component', require('./components/Status.vue').default);
Vue.component('profile-component', require('./components/Profile.vue').default);


const routes = [
  { path: '/chat', component: MessengerComponent },
  { path: '/chat/:conversacion_id', component: MessengerComponent },
  { path: '/example', component: ExampleComponent },
]

const router = new VueRouter({
  routes,
  mode: 'history'
})

const app = new Vue({
  el: '#app',
  store,
  router,
  methods: {
    logout() {
      document.getElementById('logout-form').submit();
    }
  }

});
