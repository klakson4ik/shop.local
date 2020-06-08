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
                <th>Добавить</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="(currency,index) of currencyArray" :key="currencyArray.ID">
                <th scope="row">{{index+1}}</th>
                <td class="d-flex justify-content-start">{{currency.Name}}</td>
                <td >{{currency.CharCode}}</td>
                <td >{{currency.Value}}</td>
                <td>{{currency.Previous}}</td>
                <td>
                <td>
                    <input type="checkbox" name="currency" class="ml-4 shadow"   @change="addCurrencies(currency.CharCode)">
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
                changesCurrency : [],
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
                        if (regexp.test(item.Name)) {
                            array.push(item)
                        }
                    }
                    this.searchArray = array
                } else {
                    this.searchArray = this.currencyAll
                }
            },
            add(){
                let dataArray = []
                for(let each of this.changesCurrency){
                    if(each.is_change === true)
                        dataArray.push(each.currency)
                }
                console.log(dataArray)
                fetch("currency", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        title: "New currencies",
                        body: dataArray
                    })
                })
                    .then(response => (response.json()))
                    // .then(response => this.$store.dispatch('LOAD_CATEGORIES', response['categories']))
                // this.$emit('close')
            },
            addCurrencies(currency){
                let is_isset = false
                for (let each of this.changesCurrency) {
                    if (each.currency === currency){
                        is_isset = true
                        each.is_change =false
                        break
                    }
                }
                if(is_isset === false){
                    this.changesCurrency.push({
                        currency: currency,
                        is_change: true
                        }
                    )
                }
            }



        },
        watch : {
            currencyAll : function () {
                this.searchArray = this.currencyAll
            }
        }

    }
</script>

<style scoped>

</style>
