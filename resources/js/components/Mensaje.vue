<template>
  <b-container fluid style="height: calc(100vh - 56px);">
    <b-row no-gutters>
      <b-col cols="4">
        <contacto-lista @conversacionSelected="cargarActivoConversacion($event)"></contacto-lista>
      </b-col>
      <b-col cols="8">
        <contacto-activo v-if="selectedConversacion" 
        :contacto_id="selectedConversacion.contacto_id">
        </contacto-activo>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
export default {
  data() {
    return {
        selectedConversacion:null
    };
  },
  mounted() {},
  methods: {
    cargarActivoConversacion(conversacion) {
// console.log('Selecionaste',conversacion);
this.selectedConversacion=conversacion;
    }
  }
};
</script>