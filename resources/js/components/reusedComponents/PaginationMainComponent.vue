
<template>

    <nav>
        <ul>
            <li>
                <a href="#" @click="firstPage">First</a>
            </li>
            <li>
                <a href="#" @click="previousPage"></a>
            </li>
            <li>
                <a href="#" @click="nextPage">></a>
            </li>
            <li>
                <a href="#" @click="lastPage">Last</a>
            </li>
        </ul>
    </nav>

</template>


<script>

    import DropdownComponent from "./DropdownComponent";

    export default {
        name: "PaginationMainComponent",
        component : {DropdownComponent},
        props : ['array'],
        data : () => {
            return {
            }

        },
        methods : {
				uriPageNumberEnd(){
					
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
        }
    }

</script>

<style scoped>

</style>
