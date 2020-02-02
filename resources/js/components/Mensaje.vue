<template>
  <b-container fluid style="height: calc(100vh - 56px);">
    <b-row no-gutters>
      <b-col cols="4">
        <contacto-lista @conversacionSelected="cargarActivoConversacion($event)"
        :conversaciones="conversaciones"></contacto-lista>
      </b-col>
      <b-col cols="8">
        <contacto-activo
          v-if="selectedConversacion"
          :contacto_id="selectedConversacion.contacto_id"
          :contacto_name="selectedConversacion.contacto_name"
          :mensajes="mensajes"
          @messageCreated="addMessage($event)"
        ></contacto-activo>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
export default {
  props: {
    user_id: Number
  },
  data() {
    return {
      selectedConversacion: null,
      mensajes: [],
      conversaciones:[],
    };
  },
  mounted() {
    this.cargarConvesacion();

    Echo.private(`users.${this.user_id}`).listen("MensajeEnviado", data => {
      const mensaje = data.mensaje;
      mensaje.escrito = false;
      console.log(data);
      this.addMessage(mensaje);
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
        .get(`api/mensajes?contacto_id=${this.selectedConversacion.contacto_id}`)
        .then(response => {
          // console.log(response.data);
          this.mensajes = response.data;
        });
    },
    addMessage(mensaje) {
      const conversacion =this.conversaciones.find((conversacion)=>{
        return conversacion.contacto_id==mensaje.from_id ||
        conversacion.contacto_id==mensaje.to_id;
      });
      const author=this.user_id===mensaje.from_id? 'Tú' :conversacion.contacto_name ;
      conversacion.last_message=`${author}: ${mensaje.content}`;
      
      conversacion.last_time=mensaje.created_at;

      if(this.selectedConversacion.contacto_id==mensaje.from_id || this.selectedConversacion.contacto_id==mensaje.to_id){
        this.mensajes.push(mensaje);
      }
    },
       cargarConvesacion() {
      axios.get("api/conversaciones").then(response => {
        this.conversaciones = response.data;
      });
    },
  }
};
</script>