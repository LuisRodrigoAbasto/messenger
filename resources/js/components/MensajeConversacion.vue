<template>
        <b-media :right-align="escrito" vertical-align="center" class="mb-2">
          <b-img rounded="circle" slot="aside" blank blank-color="#ccc" width="48" alt="placeholder"></b-img>

           <b-card >
             <slot></slot>
          </b-card>
        </b-media>
</template>

<script>
export default {
  props:{
    escrito:Boolean
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
