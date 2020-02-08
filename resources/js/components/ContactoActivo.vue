<template>
  <b-row>
    <b-col cols="8">
      <b-card no-body footer-bg-variant="light" footer-border-variant="dark" class="h-100">
        <b-card-body class="card-body-scroll">
          <mensaje-conversacion
            v-for="mensaje in mensajes"
            :key="mensaje.id"
            :escrito="mensaje.escrito"
            :image="mensaje.escrito ? myImage : selectedConversacion.contacto_image"
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
      <b-img
        :src="selectedConversacion.contacto_image"
        rounded="circle"
        width="60"
        height="60"
        class="m-1"
      />
      <p>{{ selectedConversacion.contacto_name }}</p>
      <hr />
      <b-form-checkbox>Desactivar Notificaciones</b-form-checkbox>
    </b-col>
  </b-row>
</template>

<script>
export default {
  data() {
    return {
      newMensaje: ""
    };
  },
  methods: {
    enviarMensaje() {
      this.$store.dispatch("postMessage", this.newMensaje).then(()=>{
        this.newMensaje='';
      });
    },
    scrolltoBotton() {
      const el = document.querySelector(".card-body-scroll");
      el.scrollTop = el.scrollHeight;
    }
  },
  computed: {
    myImage() {
      return `/images/users/${this.$store.state.user.image}`;
    },
    selectedConversacion() {
      return this.$store.state.selectedConversacion;
    },
    mensajes() {
      return this.$store.state.mensajes;
    }
  },
  updated() {
    this.scrolltoBotton();
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
