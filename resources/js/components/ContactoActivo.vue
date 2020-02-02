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
      <b-img rounded="circle" blank blank-color="#777" alt="img" class="m-1"></b-img>
      <p>Usuario Seleccionado</p>
      <hr />
      <b-form-checkbox>Desactivar Notificaciones</b-form-checkbox>
    </b-col>
  </b-row>
</template>

<script>
export default {
  props:
  {
    contacto_id:Number,
    contacto_name:String,
    mensajes:Array
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
        }
      });
    }
  },
  // watch:
  // {
  //   contacto_id(value)
  //   {
  //     console.log(`contacto_id=>${this.contacto_id}`);
  //     this.cargarMensaje();
  //   }
  // }
};
</script>
