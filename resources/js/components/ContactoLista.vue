<template>
<div>
    <b-form class="my-3 mx-2">
            <b-form-input class="text-center"
            type="text"
            placeholder="Buscar Contacto" >
            </b-form-input>
            </b-form>
    <b-list-group>

           <contacto variant="dark">
           </contacto>

           <contacto variant="">
            </contacto>

            <contacto variant="secondary">
                </contacto>

            </b-list-group>
</div>
</template>

<script>
    export default {
        data()
        {
            return{
                mainProps: { blank: true, blankColor: '#777', width: 60, height: 60, class: 'm1' },
            };
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
