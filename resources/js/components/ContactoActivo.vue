<template>
  <b-row>
    <b-col cols="8">
      <b-card
        no-body
        footer-bg-variant="ligth"
        footer-border-variant="dark"
        title="Convesacion Acctiva"
        class="h-100"
      >
        <b-card-body class="card-body-scroll">
          <mensaje-conversacion
            v-for="mensaje in mensajes"
            :key="mensaje.id"
            :escrito="mensaje.escrito"
          >{{ mensaje.content }}</mensaje-conversacion>
        </b-card-body>

        <div slot="footer">
          <b-form class="mb-0" @submit.prevent="enviarMensaje" autocomplete="off">
            <b-input-group>
              <b-form-input
                class="text-center"
                type="text"
                v-model="newMensaje"
                placeholder="Escribe un mensaje"
              ></b-form-input>
              <b-button type="submit" variant="primary">Enviar</b-button>
            </b-input-group>
          </b-form>
        </div>
      </b-card>
    </b-col>
    <b-col cols="4">
      <b-img rounded="circle" blank blank-color="#777" alt="img" class="m-1"></b-img>
      <p>Usuario Seleccionado</p>
      <hr />
      <b-form-checkbox>Desactivar Notificaciones</b-form-checkbox>
    </b-col>
  </b-row>
</template>

<script>
export default {
  props: {
    contacto_id: Number,
    contacto_name: String,
    mensajes: Array
  },
  data() {
    return {
      newMensaje: ""
    };
  },
  mounted() {
    // this.cargarMensaje();
  },
  methods: {
    enviarMensaje() {
      const params = {
        to_id: this.contacto_id,
        content: this.newMensaje
      };
      axios.post("api/mensajes", params).then(response => {
        // console.log(response.data);
        if (response.data.success) {
          this.newMensaje = "";
          const mensaje=response.data.mensaje;
          mensaje.escrito=true;
          this.$emit('messageCreated',mensaje)
        }
      });
    },
    scrolltoBotton() {
      const el = document.querySelector(".card-body-scroll");
      el.scrollTop = el.scrollHeight;
    }
  },
  // watch: {
  //   mensajes() {
  //     setTimeout(() => {
  //       this.scrolltoBotton();
  //       console.log("mensaje ha cambiado");
  //     }, 100);
  //   }
  // }
  updated(){
        this.scrolltoBotton();
        console.log("mensaje ha cambiado");
  }
};
</script>
<style>
.card-body-scroll {
  /* max-height: calc(100vh - 63px); */
  max-height: calc(100vh - 63px);
  overflow-y: auto;
}
</style>
