<template>
    <div class="container">
<!--        <div class="row">-->
<!--            <div class="col">-->
<!--                <button type="button" class="btn btn-primary" @click="modalVisible = true">Добавить валюту</button>-->
<!--            </div>-->
<!--            <div class="col">-->
<!--                <search-component-->
<!--                    @searchQuery = "getArrayPagination"-->
<!--                />-->
<!--            </div>-->
<!--        </div>-->
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
<!--                <th>Код</th>-->
<!--                <th>Текущий курс</th>-->
<!--                <th>Предыдущий курс</th>-->

            </tr>
            </thead>
            <tbody>
            <tr v-for="(user, index) of userArray" :key="userArray.id">
                <th scope="row">{{index+1}}</th>
                <td>{{user.name}}</td>
<!--                <td>{{currency.charCode}}</td>-->
<!--                <td>{{currency.value}}</td>-->
<!--                <td>{{currency.previous}}</td>-->
                <td>
<!--                    <i class="fa fa-refresh" aria-hidden="true" @click="refresh(currency)"></i>-->
                </td>
                <td>
<!--                    <i class="fa fa-trash" aria-hidden="true" @click="deleteUser(currency)" ></i>-->
                </td>
            </tr>
            </tbody>
        </table>
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col d-flex justify-content-end">-->
<!--                    <table-pagination-component-->
<!--                        ref ="reRender"-->
<!--                        :array = "searchArray"-->
<!--                        @fillCat = "fillArray"-->
<!--                    />-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->


<!--        <div v-if="modalVisible===true">-->
<!--            <template-popup-component-->
<!--                title = "Новая валюта"-->
<!--            >-->
<!--                <currency-create-component-->
<!--                    title="Создание валюты"-->
<!--                    ref ="addCurrency"-->
<!--                    :currencyAll = "currencyAll"-->
<!--                    :currentCurrency = "currencies"-->
<!--                />-->
<!--                <template #footer>-->
<!--                    <button-component-->
<!--                        btnName="Закрыть"-->
<!--                        @click="modalVisible = false"-->
<!--                    />-->
<!--                    <button-component-->
<!--                        btnName="Добавить"-->
<!--                        @click="saveCreateStatus"-->
<!--                    />-->
<!--                </template>-->
<!--            </template-popup-component>-->
<!--        </div>-->

    </div>
</template>

<script>
    export default {
        name: "UserControlIndexComponent",
        props : ['users'],
        data: () => {
            return {
                modalVisible : false,
                searchArray : [],
                userArray : [],
                currencyAll : [],
            }
        },
        methods: {
            fillArray(array){
                this.userArray = array
            },

            getArrayPagination(query) {
                if (query.length > 0) {
                    let array = []
                    for (let item of this.users) {
                        let regexp = new RegExp(query.trim(), 'i');
                        if (regexp.test(item.name)) {
                            array.push(item)
                        }
                    }
                    this.searchArray = array
                }else{
                    this.searchArray = this.users
                }
            },

            // refresh(curr){
            //     fetch("currency/" + curr.id, {
            //         method: "PUT",
            //         headers: {
            //             "Content-Type": "application/json",
            //             "Accept": "application/json, text-plain, */*",
            //             "X-CSRF-TOKEN" :  document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            //         },
            //         body: JSON.stringify({
            //             title: "Edit category ",
            //             body: curr.charCode
            //         })
            //     })
            //         .then(response => (response.json()))
            //         .then(response => {
            //             let elemID = this.currencies.findIndex(item=>item.charCode === response.CharCode)
            //             this.currencies[elemID].value = Math.round(response.Value * 100) /100
            //             this.currencies[elemID].previous = Math.round (response.Previous * 100) /100
            //             this.searchArray = this.currencies
            //             this.$refs['reRender'].splitArray()
            //
            //         })
            // },

            // deleteCat(user){
            //     let act = confirm('Точно удалить ' + user.name)
            //     if(act) {
            //         fetch("currency/" + user.id, {
            //             method: "DELETE",
            //             headers: {
            //                 "Content-Type": "application/json",
            //                 "Accept": "application/json, text-plain, */*",
            //                 "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            //             },
            //         })
            //         let elemID = this.users.findIndex(item=>item.id === user.id)
            //         this.users.splice(elemID, 1)
            //         this.searchArray = this.users
            //         this.$refs['reRender'].splitArray()
            //     }
            //     else
            //         return false
            // },

            // newCurrency(){
            //     fetch('currency/create')
            //         .then(response => (response.json()))
            //         .then(response => this.currencyAll = response.currencyAll)
            // },
            //
            // saveCreateStatus(){
            //     this.$refs['addCurrency'].add()
            // },
        },

        created() {
            console.log(this.users)
            // this.searchArray = this.users
        }
    }
</script>

<style scoped>

</style>
