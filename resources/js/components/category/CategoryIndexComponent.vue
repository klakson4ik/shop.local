<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" @click="showModal('create')">Добавить категорию</button>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Категория</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(cat, index) of items" :key="items.index">
                <th scope="row">{{index+1}}</th>
                <td class="d-flex justify-content-start">{{cat.name}}</td>
                <td>
                    <i class="fa fa-wrench " aria-hidden="true" @click="showModal('edit'),editItem(cat)" ></i>
                </td>
                <td>
                    <i class="fa fa-trash" aria-hidden="true" @click="deleteCat(cat)" ></i>
                </td>

            </tr>
            </tbody>
        </table>
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <table-pagination-component
                        :categories="categories"
                        @fillCat = "fillCat"
                    />
                </div>
            </div>
        </div>



        <div v-if="modalVisible===true">
            <category-template-popup-component
            >
                <div v-if="modal.create === true">
                    <category-create-component
                    />
                </div>

                <div  v-if="modal.edit === true">
                    <category-edit-component
                    :item = "editValue"
                    />
                </div>

                <template #footer v-if="modal.create === true">
                    <button-component
                        btnName="Закрыть"
                        @click="closeModal"
                    />
                    <button-component
                        btnName="Создать категорию"
                        @click="saveCategories"
                    />
                </template>
<!--                <template #footer v-if="modal.edit === true">-->
<!--                    <button-component-->
<!--                        btnName="Закрыть"-->
<!--                        @click="closeModal"-->
<!--                    />-->
<!--                    <button-component-->
<!--                        btnName="Сохранить"-->
<!--                        @click="saveCategories"-->
<!--                    />-->
<!--                </template>-->

            </category-template-popup-component>
        </div>

    </div>
</template>




<script>
    import categoryCreateComponent from "./CategoryCreateComponent";
    import CategoryTemplatePopupComponent from "./CategoryTemplatePopupComponent";
    import CategoryEditComponent from "./CategoryEditComponent";
    import ButtonComponent from "../reusedComponents/ButtonComponent";

    import tableMixin from  './table'

    export default {
        name: "categoryIndexComponent",
        mixins : [tableMixin],
        props: ['categories'],
        components: {categoryCreateComponent, CategoryTemplatePopupComponent, CategoryEditComponent, ButtonComponent },
        data: () => {
            return {
                modalVisible : false,
                editValue : '',
                modal : {
                    'create': false,
                    'edit': false,
                    'delete' : false
                },
            }
        },
        methods: {
            editItem(cat){
                this.editValue = cat
            },
            deleteCat(){

            },

            showModal(act){
                this.modalVisible = true
                this.modal[act] = true
            },
            closeModal(){
                for (let each in this.modal){
                    this.modal[each] = false
                }
                this.modalVisible = false
            },
            saveCategories(){
                this.$store.dispatch('CREATING_SUB_CATEGORY_STATUS', true)
            }

        },
        created() {
            this.$store.dispatch('LOAD_CATEGORIES', this.categories)
        }
    }
</script>

<style scoped>

</style>
