<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" @click="modalVisible = true">Добавить пользователя</button>
            </div>
            <div class="col">
                <search-component
                    @searchQuery = "getArrayPagination"
                />
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Почта</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="(user, index) of userArray" :key="userArray.id">
                <th scope="row">{{index+1}}</th>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td>
                    <i class="fa fa-wrench " aria-hidden="true" @click="edit(user)"></i>
                </td>
                <td>
                    <i class="fa fa-trash" aria-hidden="true" @click="deleteUser(user)" ></i>
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


        <div v-if="modalVisible===true">
            <template-popup-component
                title = "Новый пользователь"
            >
                <user-create-component
                    ref ="addUser"
                />
                <template #footer>
                    <button-component
                        btnName="Отменить"
                        @click="modalVisible = false"
                    />
                    <button-component
                        btnName="Добавить"
                        @click="saveNewUser"
                    />
                </template>
            </template-popup-component>
        </div>

    </div>
</template>

<script>

    import TemplatePopupComponent from "../reusedComponents/TemplatePopupComponent";
    import ButtonComponent from "../reusedComponents/ButtonComponent";
    import TablePaginationComponent from "../reusedComponents/TablePaginationComponent";

    export default {
        name: "UserIndexComponent",
        comments : {TemplatePopupComponent, ButtonComponent, TablePaginationComponent},
        props : ['users'],
        data: () => {
            return {
                modalVisible : false,
                modalNewUserVisible : false,
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
            edit(user){
                this.modalNewUserVisible = true
            },
            edit1(user){
                fetch("user/" + user.id, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-CSRF-TOKEN" :  document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        title: "Edit category ",
                        body: user
                    })
                })
                    .then(response => (response.json()))
                    .then(response => {
                        this.$refs['reRender'].splitArray()
                    })
            },

            deleteUser(user){
                let act = confirm('Точно удалить ' + user.name)
                if(act) {
                    fetch("user/" + user.id, {
                        method: "DELETE",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                    })
                    let elemID = this.users.findIndex(item=>item.id === user.id)
                    this.users.splice(elemID, 1)
                    this.searchArray = this.users
                    this.$refs['reRender'].splitArray()
                }
                else
                    return false
            },

            // newCurrency(){
            //     fetch('currency/create')
            //         .then(response => (response.json()))
            //         .then(response => this.currencyAll = response.currencyAll)
            // },
            //
            saveNewUser(){
                this.$refs['addUser'].addUser()
            },
        },

        created() {
            this.searchArray = this.users
        }
    }
</script>

<style scoped>

</style>
