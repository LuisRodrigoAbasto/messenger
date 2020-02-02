/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)


Vue.component('contacto', require('./components/Contacto.vue').default);
Vue.component('contacto-lista', require('./components/ContactoLista.vue').default);
Vue.component('contacto-activo', require('./components/ContactoActivo').default);
Vue.component('mensaje-conversacion', require('./components/MensajeConversacion').default);
Vue.component('mensaje', require('./components/Mensaje.vue').default);

const app = new Vue({
    el: '#app',  
    data:{
    mainProps: { blank: true, blankColor: '#777', width: 60, height: 60, class: 'm1' }
    },
    methods:{
        logout()
        {
            document.getElementById('logout-form').submit();
        }
}

});
