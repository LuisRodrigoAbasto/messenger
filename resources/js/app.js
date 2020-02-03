/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';
import BootstrapVue from 'bootstrap-vue'


Vue.use(BootstrapVue);
Vue.use(Vuex);

Vue.component('contacto', require('./components/Contacto.vue').default);
Vue.component('contacto-lista', require('./components/ContactoLista.vue').default);
Vue.component('contacto-activo', require('./components/ContactoActivo').default);
Vue.component('mensaje-conversacion', require('./components/MensajeConversacion').default);
Vue.component('mensaje', require('./components/Mensaje.vue').default);
Vue.component('status-component', require('./components/Status.vue').default);
Vue.component('profile-component', require('./components/Profile.vue').default);

const store = new Vuex.Store({
    state: {
      mensajes:[],
      selectedConversacion: null,
      conversaciones: [],
      querySearch:'',
    },
    mutations:
    {
        newMessageList(state, mensajes){
            state.mensajes=mensajes;
        },
        addMessage(state,mensaje){
            state.mensajes.push(mensaje);
        },
        selectConversacion(state, conversacion){
            state.selectedConversacion=conversacion;
        }
    },
    actions:
    {
        cargarMensaje(context,conversacion) {
            axios
              .get(
                `api/mensajes?contacto_id=${conversacion.contacto_id}`
              )
              .then(response => {
                context.commit('selectConversacion',conversacion);
                context.commit('newMessageList',response.data)
              });
          },
    },getters:{
        conversacionesFiltered(state) {
            return state.conversaciones.filter(conversacion =>
              conversacion.contacto_name.
              toLowerCase().
              includes(state.querySearch.toLowerCase())
            );
          },
    }
  })


const app = new Vue({
    el: '#app',  
    store,
    methods:{
        logout()
        {
            document.getElementById('logout-form').submit();
        }
}

});
