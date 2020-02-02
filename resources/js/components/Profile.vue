<template>
  <div>
    <b-container>
      <b-form class="m-3" action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" v-model="csrfToken" />
        <b-form-group label="Correo Electronico:" >
          <b-form-input
           name="email"
            v-model="user.email"
            type="email"
            disabled
            placeholder="Ingresar Correo"
          ></b-form-input>
        </b-form-group>

        <b-form-group  label="Nombre de Usuario" >
          <b-form-input v-model="user.name" name="name"  type="text" required placeholder="Ingrese nombre de Usuario"></b-form-input>
        </b-form-group>
        
                <b-form-group  label="Nueva Contraseña (Solo si desea Modificar):" >
          <b-form-input type="password" name="password"  placeholder="Ingrese nombre de Usuario"></b-form-input>
        </b-form-group>

    <b-form-group  label="Imagen de Perfil (Solo si desea Modificar):" >
          <b-form-file placeholder="Seleccionar una nueva Imagen" name="image"></b-form-file>
        </b-form-group>

        <b-button type="submit" variant="primary">Guardar Cambios</b-button>
      </b-form>
      <!-- <b-card class="mt-3" header="Form Data Result">
        <pre class="m-0">{{ form }}</pre>
      </b-card>-->
    </b-container>
  </div>
</template>

<script>
export default {
  props: {
    user: Object,
    csrfToken:String
  },
  data() {
    return {
      
    };
  },
  methods: {
  }
};
</script>