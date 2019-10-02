<template>
  <div>
    <b-form class="my-3 mx-2">
      <b-form-input class="text-center" type="text" placeholder="Buscar Contacto"></b-form-input>
    </b-form>
    <b-list-group>
        <contacto v-for="data in conversaciones" 
        :key="data.id"
        :data="data" 
        @click.native="selectConversacion(data)" >
        </contacto>
      <!-- <contacto variant="dark"></contacto>

      <contacto variant></contacto>

      <contacto variant="secondary"></contacto> -->
    </b-list-group>
  </div>
</template>

<script>
export default {
  data() {
    return {
      conversaciones: []
    };
  },
  mounted() {
    this.cargarConvesacion();
  },
  methods: {
    cargarConvesacion() {
      axios.get("/api/conversaciones").then(response => {
        this.conversaciones = response.data;
      });
    },
    selectConversacion(data)
    {
// console.log(data);
this.$emit('conversacionSelected',data)
    }
  }
};
</script>
