<template>
	<input 
		type="submit" 
		class="btn btn-danger mr-1 col-3" 
		value="Eliminar x"
		@click="eliminarReceta"
	>
</template>
<script>
	export default {
		props:['recetaId'],
		methods: {
			eliminarReceta(){
				this.$swal({
					title: 'Deseas eliminar esta receta?',
					text: "Una vez eliminada, no se podrá recuperar",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Si',
					cancelButtonText: 'No'
				}).then((result) => {
					if (result.isConfirmed) {
						//Enviar la petición al servidor
						const params = {
							id: this.recetaId,
						}
						axios.post(`/recetas/${this.recetaId}`, {params, _method:'delete'})
							.then(respuesta => {
								this.$swal({
									title: 'Receta Eliminada',
									text: 'Se eliminó la receta seleccionada',
									icon: 'warning'
								})
								//Eliminar la receta del DOM
								this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
							})
							.catch(error => {
								console.log(error);
							})
					}
				})
			}
		}
	}
</script>
