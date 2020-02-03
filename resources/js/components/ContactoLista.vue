<template>

    <b-list-group>
      <contacto
        v-for="conversacion in conversaciones"
        :key="conversacion.id"
        :conversacion="conversacion"
        :selected="selectConversacionId===conversacion.id"
        @click.native="selectConversacion(conversacion)"
      ></contacto>
    </b-list-group>
</template>

<script>
export default {
  props: {
    conversaciones: Array
  },
  data() {
    return {
      selectConversacionId:null
    };
  },
  mounted() {},
  methods: {
    selectConversacion(conversacion) {
      // console.log(data);
      this.selectConversacionId=conversacion.id
      this.$emit("conversacionSelected", conversacion);
    }
  }
};
</script>
