<template>
  <b-container fluid style="height: calc(100vh - 56px);">
    <b-row no-gutters>
      <b-col cols="4">
        <b-form class="my-3 mx-2">
          <b-form-input class="text-center" type="text" v-model="querySearch" placeholder="Buscar Contacto"></b-form-input>
        </b-form>
        <contacto-lista/>
      </b-col>
      <b-col cols="8">
        <contacto-activo
          v-if="selectedConversacion"
          :contacto_id="selectedConversacion.contacto_id"
          :contacto_name="selectedConversacion.contacto_name"
          :contacto_image="selectedConversacion.contacto_image"
          :my-image="myImageUrl"
          @messageCreated="addMessage($event)"/>
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
    this.cargarConvesacion();

    Echo.private(`users.${this.user.id}`).listen("MensajeEnviado", data => {
      const mensaje = data.mensaje;
      mensaje.escrito = false;
      console.log(data);
      this.addMessage(mensaje);
    });

    Echo.join(`messenger`)
      .here(users => {
        users.forEach(user => this.changeStatus(user, true));
      })
      .joining(user => this.changeStatus(user, true))
      .leaving(user => this.changeStatus(user, false));
  },
  methods: {

    addMessage(mensaje) {
      const conversacion = this.conversaciones.find(conversacion => {
        return (
          conversacion.contacto_id == mensaje.from_id ||
          conversacion.contacto_id == mensaje.to_id
        );
      });
      const author =
        this.user.id === mensaje.from_id ? "Tú" : conversacion.contacto_name;
      conversacion.last_message = `${author}: ${mensaje.content}`;

      conversacion.last_time = mensaje.created_at;

      if (
        this.selectedConversacion.contacto_id == mensaje.from_id ||
        this.selectedConversacion.contacto_id == mensaje.to_id
      ) {
        this.$store.commit('addMessage',mensaje);
      }
    },
    cargarConvesacion() {
      axios.get("api/conversaciones").then(response => {
        this.conversaciones = response.data;
      });
    },
    changeStatus(user, status) {
      const index = this.conversaciones.findIndex(conversacion => {
        return conversacion.contacto_id == user.id;
      });
      if (index >= 0) {
        this.$set(this.conversaciones[index], "online", status);
      }
    }
  },
  computed: {

    myImageUrl(){
      return `/images/users/${this.user.image}`;
    },
    selectedConversacion(){
      return this.$store.state.selectedConversacion;
    }
    }
};
</script>