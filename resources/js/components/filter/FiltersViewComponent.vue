<template>
	<div>
		<nav>
			<ul>
				<li v-for="(filter, index) of filters" :key="index">
					<filter-checkbox-component
						v-if="filters['typesFilter'][index] == 'checkbox'"
						:filter = "filter"
					/>						
					<filter-scroll-component
						v-if="filters['typesFilter'][index] == 'scroll'"
						:filter = "filter"
					/>
				</li>
			</ul>
		</nav>		
	</div>
</template>

<script>
	import FilterCheckboxComponent from "./FilterCheckboxComponent";
	import FilterScrollComponent from "./FilterScrollComponent";
    export default {
        name: "FilterViewComponent",
        props : ['filters'],
		  components: {FilterCheckboxComponent, FilterScrollComponent},
        data() {
            return {
            }
        },

    }
</script>

<style scoped>

</style>
