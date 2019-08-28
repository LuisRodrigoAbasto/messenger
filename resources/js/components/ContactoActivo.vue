<template>
  <b-row>
    <b-col cols="8">
      <b-card
        footer-bg-variant="ligth"
        footer-border-variant="dark"
        title="Convesacion Acctiva"
        class="h-100"
      >
        <b-media vertical-align="center" class="mb-2">
          <b-img rounded="circle" slot="aside" blank blank-color="#ccc" width="48" alt="placeholder"></b-img>

           <b-card >
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac
            nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </b-card>
        </b-media>

        <b-media right-align vertical-align="center" class="mb-2">
          <b-img rounded="circle" slot="aside" blank blank-color="#ccc" width="48" alt="placeholder"></b-img>


          <b-card >
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac
            nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </b-card>
        </b-media>
        <div slot="footer">
          <b-form class="mb-0">
            <b-input-group>
              <b-form-input class="text-center" type="text" placeholder="Escribe un mensaje"></b-form-input>
              <b-button variant="primary">Enviar</b-button>
            </b-input-group>
          </b-form>
        </div>
      </b-card>
    </b-col>
    <b-col cols="4">
      <b-img v-bind="mainProps" rounded="circle" alt="Circle image"></b-img>
      <p>Usuario Seleccionado</p>
      <hr />
      <b-form-checkbox>Desactivar Notificaciones</b-form-checkbox>
    </b-col>
  </b-row>
</template>

<script>
export default {
  data() {
    return {
      mainProps: {
        blank: true,
        blankColor: "#777",
        width: 60,
        height: 60,
        class: "m1"
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
