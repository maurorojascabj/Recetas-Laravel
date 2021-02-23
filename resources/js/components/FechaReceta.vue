<template>
    <!-- <span v-text="formatearFecha"></span> -->
    <!-- O lo que es lo mismo -->
    <span>{{formatearFecha}}</span>
</template>

<script>
    export default {
        props: ['fecha'],
        // mounted(){
        //     console.log('El componente está listo', this.fecha);
        // },
        computed:{
            formatearFecha(){
                return moment(this.fecha).locale('es').format('DD [de] MMMM [del] YYYY')
            }
        }
    }
</script>