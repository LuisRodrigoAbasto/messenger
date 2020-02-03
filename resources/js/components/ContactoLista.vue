<template>
  <b-list-group>
    <contacto
      v-for="conversacion in conversacionesFiltered"
      :key="conversacion.id"
      :conversacion="conversacion"
      :selected="isSelected(conversacion)"
      @click.native="selectConversacion(conversacion)"
    ></contacto>
  </b-list-group>
</template>

<script>
export default {
  methods: {
    selectConversacion(conversacion) {
      this.$store.dispatch("cargarMensaje", conversacion);
    },
    isSelected(conversacion) {
      if (this.selectConversacion) {
        return this.selectConversacion.id === conversacion.id;
      }
    }
  },
  computed: {
    selectedConversacion() {
      return this.$store.state.selectedConversacion;
    },
    conversacionFiltered()
    {
      return this.$store.state.conversacionFiltered;
    }
  }
};
</script>
