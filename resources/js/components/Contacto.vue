<template>
  <b-list-group-item :variant="variant">
    <b-row class="p-2" align-h="center">
      <b-col cols="12" md="3" class="text-center">
        <b-img
          :src="conversacion.contacto_image"
          rounded="circle"
          width="60"
          height="60"
          class="m-1"
        />
      </b-col>
      <b-col cols="6" align-self="center" class="d-none d-md-block">
        <p class="mb-1">
         <status-component :online="conversacion.online" />
          {{ conversacion.contacto_name }}
        </p>
        <p class="text-muted small mb-1">{{ conversacion.last_message }}</p>
      </b-col>
      <b-col cols="3" class="d-none d-md-block">
        <p class="text-muted small">{{ lasTime}}</p>
      </b-col>
    </b-row>
  </b-list-group-item>
</template>

<script>
export default {
  props: {
    conversacion: Object,
    selected:Boolean
  },
  computed:{
    lasTime(){
      return moment(this.conversacion.last_time,'YYYY-MM-DD hh:mm:ss').locale('es').fromNow();
    },
    variant(){
      return this.selected ? 'info' :'';
    }
  }
};
</script>
