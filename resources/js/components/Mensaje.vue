<template>
  <b-container fluid style="height: calc(100vh - 56px);">
    <b-row no-gutters class="h-100">
      <b-col cols="4">
        <contacto-form />
        <contacto-lista />
      </b-col>
      <b-col cols="8">
        <contacto-activo v-if="selectedConversacion" />
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
export default {
  props: {
    user: Object
  },
  mounted() {
    this.$store.commit("setUser", this.user);
    this.$store.dispatch("cargarConversaciones").then(() => {
      const conversacion_id = this.$route.params.conversacion_id;
      if (conversacion_id) {
        const conversacion = this.$store.getters.getConversationById(conversacion_id);
        // console.log('conversacion',conversacion);
        this.$store.dispatch("cargarMensaje", conversacion);
      }
    });

    Echo.private(`users.${this.user.id}`).listen("MensajeEnviado", data => {
      const mensaje = data.mensaje;
      mensaje.escrito = false;
      this.addMessage(mensaje);
    });

    Echo.join(`messenger`)
      .here(
        users => users.forEach(
          user => this.changeStatus(user, true)
          )
      )
      .joining(user => this.changeStatus(user, true))
      .leaving(user => this.changeStatus(user, false));
  },
  methods: {
    changeStatus(user, status) {
      const index = this.$store.state.conversaciones.findIndex(
        conversacion => conversacion.contacto_id == user.id
      );
      if (index >= 0) {
        this.$set(this.$store.state.conversaciones[index], "online", status);
      }
    },
    addMessage(mensaje){
      this.$store.commit('addMessage',mensaje);
    }
  },
  computed: {
    selectedConversacion() {
      return this.$store.state.selectedConversacion;
    }
  }
};
</script>