<template>
     <b-list-group-item :variant="variant">
            <b-row class="p-2" align-h="center">
            <b-col cols="12" md="3" class="text-center">
            <b-img v-bind="mainProps" rounded="circle" alt="Circle image"></b-img>
            </b-col>
            <b-col cols="6" align-self="center" class="d-none d-md-block">
            <p class="mb-1">Juan Ramos</p>
            <p class="text-muted small md-1">{{ lastMessage }}</p>
            </b-col>
            <b-col cols="3" class="d-none d-md-block">
            <p class="text-muted small">{{ lastTime }} </p>
            </b-col>
            </b-row>
            </b-list-group-item>
</template>

<script>
    export default {
        props:[
            'variant'
        ],
        data()
        {
            return{
                mainProps: { blank: true, blankColor: '#777', width: 60, height: 60, class: 'm1' },
                name:'Luis Rodrigo Abasto',
                lastMessage: 'Tu: Hasta Luego',
                lastTime:'1:37 pm',
                variant:'dark'
            };
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
