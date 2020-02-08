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
      this.$router.push(`/chat/${conversacion.id}`,()=>{
      this.$store.dispatch("cargarMensaje", conversacion);
      });
    },
    isSelected(conversacion) {
      if (this.selectedConversacion) {
        return this.selectedConversacion.id === conversacion.id;
        return false;
      }
    }
  },
  computed: {
    selectedConversacion() {
      return this.$store.state.selectedConversacion;
    },
    conversacionesFiltered()
    {
      return this.$store.getters.conversacionesFiltered;
    }
  }
};
</script>
