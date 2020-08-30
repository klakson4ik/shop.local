<template>
	<div>
			<ul>
				<li v-for="elem of filter">
					<p>{{elem}}</p>	
				</li>
			</ul>
	</div>
</template>

<script>
    export default {
        name: "FilterCheckboxComponent",
        props : ['filter'],
        data() {
            return {
            }
        },

    }
</script>

<style scoped>

</style>
