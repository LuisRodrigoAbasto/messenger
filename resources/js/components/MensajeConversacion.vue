<template>
        <b-media :right-align="escrito" vertical-align="center" class="mb-2">
          <b-img :src="image" rounded="circle" slot="aside" height="48" width="48"/>

           <b-card >
             <slot></slot>
          </b-card>
        </b-media>
</template>

<script>
export default {
  props:{
    escrito:Boolean,
    image:String
  },
  data() {
    return {
     content:'abc'
    };
  },
  mounted() {
    // console.log("escrito :",this.escrito);
  }
};
</script>
