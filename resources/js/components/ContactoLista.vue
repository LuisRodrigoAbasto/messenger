<template>

    <b-list-group>
      <contacto
        v-for="conversacion in conversaciones"
        :key="conversacion.id"
        :conversacion="conversacion"
        @click.native="selectConversacion(conversacion)"
      ></contacto>
      <!-- <contacto variant="dark"></contacto>

      <contacto variant></contacto>

      <contacto variant="secondary"></contacto>-->
    </b-list-group>
</template>

<script>
export default {
  props: {
    conversaciones: Array
  },
  data() {
    return {};
  },
  mounted() {},
  methods: {
    selectConversacion(conversacion) {
      // console.log(data);
      this.$emit("conversacionSelected", conversacion);
    }
  }
};
</script>
