<template>
  <b-container fluid style="height: calc(100vh - 56px);">
    <b-row no-gutters>
      <b-col cols="4">
        <contacto-lista @conversacionSelected="cargarActivoConversacion($event)"></contacto-lista>
      </b-col>
      <b-col cols="8">
        <contacto-activo
          v-if="selectedConversacion"
          :contacto_id="selectedConversacion.contacto_id"
          :contacto_name="selectedConversacion.contacto_name"
          :mensajes="mensajes"
        ></contacto-activo>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
export default {
  props:{
    user_id:Number
  },
  data() {
    return {
      selectedConversacion: null,
      mensajes: []
    };
  },
  mounted() {
    Echo.channel("example").listen("MensajeEnviado", (data) => {
      const mensaje=data.mensaje;
      mensaje.escrito=(this.user_id==mensaje.from_id);
      this.mensajes.push(mensaje);
    });
  },
  methods: {
    cargarActivoConversacion(conversacion) {
      // console.log('Selecionaste',conversacion);
      this.selectedConversacion = conversacion;
      this.cargarMensaje();
    },
    cargarMensaje() {
      axios
        .get(`api/mensajes?contact_id=${this.selectedConversacion.contacto_id}`)
        .then(response => {
          // console.log(response.data);
          this.mensajes = response.data;
        });
    }
  }
};
</script>