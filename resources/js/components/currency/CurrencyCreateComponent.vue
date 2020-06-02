<template>
    <div class="container">
        <div class="col">
            <search-component
                @searchQuery = "getArrayPagination"
            />
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Валюта</th>
                <th>Код</th>
                <th>Текущий курс</th>
                <th>Предыдущий курс</th>
                <th>Действие</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="currency of currencyArray" :key="currencyArray.id">
                <th scope="row">1</th>
                <td class="d-flex justify-content-start">{{currency.name}}</td>
                <td class="d-flex justify-content-start">{{currency.charCode}}</td>
                <td class="d-flex justify-content-start">{{currency.value}}</td>
                <td class="d-flex justify-content-start">{{currency.previous}}</td>
                <td>
                    <!--                <i class="fa fa-wrench " aria-hidden="true" @click="showModal('edit'),editItem(cat)" ></i>-->
                </td>
                <td>
                    <!--                <i class="fa fa-trash" aria-hidden="true" @click="deleteCat(cat)" ></i>-->
                </td>
            </tr>
            </tbody>
        </table>
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <table-pagination-component
                        ref ="reRender"
                        :array = "searchArray"
                        @fillCat = "fillArray"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CurrencyCreateComponent",
        props : ['currencyAll'],
        data() {
            return {
                searchArray : [],
                currencyArray : [],
            }
        },

        methods: {
            fillArray(array) {
                this.currencyArray = array
            },
            getArrayPagination(query) {
                if (query.length > 0) {
                    let array = []
                    for (let item of this.currencyAll) {
                        let regexp = new RegExp(query.trim(), 'i');
                        if (regexp.test(item.title)) {
                            array.push(item)
                        }
                    }
                    this.searchArray = array
                } else {
                    this.searchArray = this.currencyAll
                }
            },
        },
        watch : {
            currencyAll : function () {
                // console.log(this.currencyAll)
                for (let each in this.currencyAll){
                    console.log(this.currencyAll[each])
                }
                this.currencyArray = this.currencyAll
            }
        },
    }
</script>

<style scoped>

</style>
