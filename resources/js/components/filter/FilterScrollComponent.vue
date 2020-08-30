<template>
	<div>
		<nav>
			<ul>
				<li v-for="elem of filter">
					<p>{{elem}}</p>	
				</li>
			</ul>
		</nav>		
	</div>
</template>

<script>
    export default {
        name: "FilterViewComponent",
        props : ['filter'],
        data() {
            return {
            }
        },

    }
</script>

<style scoped>

</style>
