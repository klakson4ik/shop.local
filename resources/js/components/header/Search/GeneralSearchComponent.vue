<template>
    <div class="input-group w-25">
        <input type="text" class="form-control" placeholder="Найти..." v-model="pattern" aria-label="" aria-describedby="basic-addon1">
        <div class="input-group-append">
            <button class="btn btn-success" type="button" @click="cl">Search</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "GeneralSearchComponent",
        data: () => {
            return {
                pattern : '',
                listSearching : '',
                resultArray : []
            }
        },
        methods: {
            cl() {
                // console.log(this.searchingList)
            }
        },
        watch : {
            pattern: function (query) {
                if(Object.keys(this.listSearching).length === 0 ) {
                    fetch('searchingWidget')
                        .then(response => response.json())
                        .then(response => this.listSearching = response)
                }
                if(query.length > 2){
                    for (let each in this.listSearching){
                        console.log(this.listSearching[each])
                    }

                    // let regexp = new RegExp(query.trim(), 'i');
                    // if (regexp.test(item.Name)) {
                    //     array.push(item)
                    // }
                }else{



                }

            },

        }
    }
</script>

<style scoped>

</style>
