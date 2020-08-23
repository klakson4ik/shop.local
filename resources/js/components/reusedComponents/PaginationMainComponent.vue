
<template>

    <nav>
        <ul>
            <li v-if="paginationData['currentPage'] > 1">
                <a href="?page=1">First</a>
            </li>
            <li v-if="paginationData['currentPage'] > 1">
                <a :href="`?page=${paginationData['currentPage']-1}`"><</a>
            </li>
				<li v-for="(let i = 1; i = pagination['countShowPage']; ++i)">
					<a href="?page=i">{{i}}</a>
				</li>
				<li v-if="paginationData['countPage'] !== paginationData['currentPage']">
                <a :href="`?page=${paginationData['currentPage']+1}`">></a>
            </li>
            <li v-if="paginationData['countPage'] !== paginationData['currentPage']">
                <a :href="`?page=${paginationData['countPage']}`">Last</a>
            </li>
        </ul>
    </nav>

</template>


<script>

    import DropdownComponent from "./DropdownComponent";

    export default {
        name: "PaginationMainComponent",
        component : {DropdownComponent},
        props : ['paginationData'],
        data : () => {
            return {
					startPage : "",
            }

        },
        methods : {
				numberStartPage(){
					let countPage = this.paginationData['countShowPage'];
					let currentPage = this.paginationData['currentPage'];
					let floorCount = Math.floor(countPage / 2);
					let ceilCount = countPage - floorCount;
					if((currentPage - floorCount) < 2){
						this.startPage = 1;
					} 
					else if ((currentPage + ceilCount) > (this.paginationData['countPage'] -1)){
						this.startPage = this.paginationData['countPage'] - countPage;					
					}
					else{
						this.startPage = currentPage - floorCount;
					}

				},
            nextPage(){
            },
            previousPage(){
            },
            lastPage(){
            },
            firstPage(){
            },
        },
        created(){
				this.numberStartPage();
        }
    }

</script>

<style scoped>

</style>
