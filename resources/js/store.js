import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    mensajes: [],
    selectedConversacion: null,
    conversaciones: [],
    querySearch: '',
    user: null
  },
  mutations:
  {
    setUser(state, user) {
      state.user = user;
    },
    newMessagesList(state, mensajes) {
      state.mensajes = mensajes;
    },
    addMessage(state, mensaje) {
      const conversacion = state.conversaciones.find((conversacion) => {
        return conversacion.contacto_id == mensaje.from_id ||
          conversacion.contacto_id == mensaje.to_id
      });
      const author = state.user.id === mensaje.from_id ? "Tú" : conversacion.contacto_name;

      conversacion.last_message = `${author}: ${mensaje.content}`;
      conversacion.last_time = mensaje.created_at;

      if (state.selectedConversacion.contacto_id == mensaje.from_id ||
        state.selectedConversacion.contacto_id == mensaje.to_id)
        state.mensajes.push(mensaje);
    },
    selectConversacion(state, conversacion) {
      state.selectedConversacion = conversacion;
    },
    newQuerySearch(state, newValue) {
      state.querySearch = newValue;
    },
    newConversationsList(state, conversaciones) {
      state.conversaciones = conversaciones;
    }
  },
  actions:
  {
    cargarMensaje(context, conversacion) {
     return axios
        .get(
          `/api/mensajes?contacto_id=${conversacion.contacto_id}`
        )
        .then(response => {
          context.commit('selectConversacion', conversacion);
          context.commit('newMessagesList', response.data)
        });
    },
    cargarConversaciones(context) {
     return  axios.get("/api/conversaciones").then(response => {
        context.commit('newConversationsList', response.data);
      });
    },
    postMessage(context, newMensaje) {
      const params = {
        to_id: context.state.selectedConversacion.contacto_id,
        content: newMensaje
      };
     return axios.post("/api/mensajes", params).then(response => {
        // console.log(response.data);
        if (response.data.success) {
          newMensaje = "";
          const mensaje = response.data.mensaje;
          mensaje.escrito = true;
          context.commit('addMessage', mensaje)
        }
      });
    },
  }, getters: {
    conversacionesFiltered(state) {
      return state.conversaciones.filter(conversacion =>
        conversacion.contacto_name.
          toLowerCase().
          includes(state.querySearch.toLowerCase())
      );
    },
    getConversationById(state) {
      return conversacion_id => {
        return state.conversaciones.find(
          conversacion => conversacion.id == conversacion_id
        );
      };
    }
  }
})