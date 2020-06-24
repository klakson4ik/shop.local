<template>
    <div class="input-group w-25">
        <input type="text" class="form-control" placeholder="Найти..." v-model="pattern" aria-label="" aria-describedby="basic-addon1">
        <div class="input-group-append">
            <button class="btn btn-success" type="button" @click="cl">Search</button>
        </div>
        <div class="container ">
            <div class="it">
                <div class="row" v-for="each of resultArray" v-if="resultArray !== 0">
                    <div class="col-12">
                        <input class="form-control each" type="text" :placeholder="each['title']" readonly @click="eachClick(each)">
                    </div>
                </div>
            </div>
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
            eachClick(obj){
                this.pattern = obj['title']
            },

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
                    this.resultArray = []
                    for (let each in this.listSearching) {
                        for (let cat of this.listSearching[each]) {
                            if (this.resultArray.length < 9) {
                                let regexp = new RegExp(query.trim(), 'i');
                                if (regexp.test(cat['title'])) {
                                    this.resultArray.push(cat)
                                }

                            }
                        }
                    }
                }else{
                    this.resultArray = []
                }

            },

        }
    }
</script>

<style scoped>
    .it{
        width: inherit;
        position: absolute;
        z-index: 10;
        left: 0px;
    }

    .each:hover{
        background: light;
    }

</style>
