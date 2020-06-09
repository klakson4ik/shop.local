<template>

    <div class="container">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" @click="showModal('create'), newCurrency()">Добавить валюту</button>
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
                <th>Валюта</th>
                <th>Код</th>
                <th>Текущий курс</th>
                <th>Предыдущий курс</th>
                <th>Действие</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="(currency, index) of currencyArray" :key="currencyArray.id">
                <th scope="row">{{index+1}}</th>
                <td>{{currency.name}}</td>
                <td>{{currency.charCode}}</td>
                <td>{{currency.value}}</td>
                <td>{{currency.previous}}</td>
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


        <div v-if="modalVisible===true && modal.create === true">
            <template-popup-component
                title = "Новая валюта"
            >
                <currency-create-component
                    title="Создание валюты"
                    ref ="addCurrency"
                    :currencyAll = "currencyAll"
                    @close = "closeModalCreate"
                />
                <template #footer>
                    <button-component
                        btnName="Закрыть"
                        @click="closeModalCreate"
                    />
                    <button-component
                        btnName="Добавить"
                        @click="saveCreateStatus"
                    />
                </template>
            </template-popup-component>
        </div>

<!--        <div v-if="modalVisible===true && modal.edit === true">-->
<!--            <template-popup-component-->
<!--                title = "Редактирование категории">-->
<!--                <currency-edit-component-->
<!--                    title="Редактирование категорий"-->
<!--                    @close="closeModalEdit"-->
<!--                    @saveEditCategory="saveEditCategory"-->
<!--                />-->
<!--                <template #footer>-->
<!--                    <button-component-->
<!--                        btnName="Отменить"-->
<!--                        @click="closeModalEdit"-->
<!--                    />-->
<!--                    <button-component-->
<!--                        btnName="Сохранить"-->
<!--                        @click="saveEditStatus"-->
<!--                    />-->
<!--                </template>-->
<!--            </template-popup-component>-->
<!--        </div>-->
    </div>
</template>

<script>

    import TemplatePopupComponent from "../reusedComponents/TemplatePopupComponent";
    import ButtonComponent from "../reusedComponents/ButtonComponent";
    import CurrencyCreateComponent from "./CurrencyCreateComponent";

    export default {
        name: "CurrencyIndexComponent",
        components: {TemplatePopupComponent, ButtonComponent, CurrencyCreateComponent },
        props : ['currencies'],
        data: () => {
            return {
                modalVisible : false,
                searchArray : [],
                currencyArray : [],
                currencyAll : [],
                modal : {
                    'create': false,
                    'edit': false,
                    'delete' : false
                },
            }
        },
        computed: {
        },
        methods: {
            fillArray(array){
                this.currencyArray = array
            },
            getArrayPagination(query) {
                if (query.length > 0) {
                    let array = []
                    for (let item of this.currencies) {
                        let regexp = new RegExp(query.trim(), 'i');
                        if (regexp.test(item.title)) {
                            array.push(item)
                        }
                    }
                    this.searchArray = array
                }else{
                    this.searchArray = this.currencies
                }
            },
            // editItem(cat){
            //     this.$store.dispatch('LOAD_CHECKED_CAT', cat)
            //     this.editCat.push({
            //         id: cat.id,
            //         parent_id: cat.parent_id
            //     })
            //
            // },
            // deleteCat(cat){
            //     let act = confirm('Точно удалить ' + cat.title)
            //     if(act) {
            //         fetch("category/" + cat.id, {
            //             method: "DELETE",
            //             headers: {
            //                 "Content-Type": "application/json",
            //                 "Accept": "application/json, text-plain, */*",
            //                 "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            //             },
            //         })
            //         let elemID = this.categories.findIndex(item=>item.id === cat.id)
            //         delete this.categories[elemID]
            //         this.$refs['reRender'].splitArray()
            //     }
            //     else
            //         return false
            // },

            showModal(act){
                this.modalVisible = true
                this.modal[act] = true
            },
            newCurrency(){
                fetch('currency/create')
                    .then(response => (response.json()))
                    .then(response => this.currencyAll = response.currencyAll)
            },
            closeModalCreate(){
                this.modal.create = false
                this.modalVisible = false
            },
            // closeModalEdit(){
            //     this.modal.edit = false
            //     this.modalVisible = false
            //     let elemID = this.categories.findIndex(item=>item.id === this.editCat[0].id)
            //     this.categories[elemID].parent_id = this.editCat[0].parent_id
            //     this.$refs['reRender'].splitArray()
            // },
            // saveEditCategory(){
            //     this.modal.edit = false
            //     this.modalVisible = false
            //     // this.$refs['reRender'].splitArray()
            // },
            // saveEditStatus(){
            //     this.$store.dispatch('EDITING_CATEGORY_STATUS', true)
            // },
            saveCreateStatus(){
                this.$refs['addCurrency'].add()
            },

        },

        created() {
            this.searchArray = this.currencies
            console.log(this.currencies)
        }
    }
</script>

<style scoped>

</style>
