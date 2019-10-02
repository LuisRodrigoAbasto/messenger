<template>
  <b-row>
    <b-col cols="8">
      <b-card
        footer-bg-variant="ligth"
        footer-border-variant="dark"
        title="Convesacion Acctiva"
        class="h-100"
      >
        <mensaje-conversacion
          v-for="data in mensajes"
          :key="data.id"
          :escrito="data.escrito"
        >{{ data.content }}</mensaje-conversacion>
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
      <b-img v-bind="mainProps" rounded="circle" alt="Circle image"></b-img>
      <p>Usuario Seleccionado</p>
      <hr />
      <b-form-checkbox>Desactivar Notificaciones</b-form-checkbox>
    </b-col>
  </b-row>
</template>

<script>
export default {
  data() {
    return {
      mainProps: {
        blank: true,
        blankColor: "#777",
        width: 60,
        height: 60,
        class: "m1"
      },
      mensajes: [],
      newMensaje: ""
    };
  },
  mounted() {
    this.cargarMensaje();
  },
  methods: {
    cargarMensaje() {
      axios.get("api/mensajes").then(response => {
        // console.log(response.data);
        this.mensajes = response.data;
      });
    },
    enviarMensaje() {
      const params = {
        to_id: 2,
        content: this.newMensaje
      };
      axios.post("api/mensajes", params).then(response => {
        // console.log(response.data);
        if (response.data.success) {
          this.newMensaje = "";
          this.cargarMensaje();
        }
      });
    }
  }
};
</script>
