<template>


    <div class="container">
        <div v-for="cat of cats" :key="cats.title">
            <div class="row" v-if="cat.status==='active'">
                <div class="col">
                    <input type="text" class="p-1 mb-2 shadow form-control" :value="cat.title">
                </div>
            </div>
            <div v-else>
                <div class="row" >
                    <div class="col">
                        <p class="border  shadow border-primary p-1 mb-1">{{cat.title}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-center" >
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2 d-flex justify-content-center">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary mt-4" @click="modalVisible=true">Привязать к другой категории</button>
        <div v-if="modalVisible===true">
            <category-template-popup-component

            >
                <category-snap-to-another-component
                />

                <template #footer>
                    <button-component
                        btnName="Отменить"
                        @click="closeModal"
                    />
                    <button-component
                        btnName="Сохранить"
                    />
                </template>
            </category-template-popup-component>
        </div>
    </div>
</template>

<script>

    import CategoryTemplatePopupComponent from "./CategoryTemplatePopupComponent";
    import CategorySnapToAnotherComponent from "./СategorySnapToAnotherComponent";


    export default {
        name: "CategoryEditComponent",
        components: {CategoryTemplatePopupComponent , CategorySnapToAnotherComponent},
        props : {
            item : {
                type: Object,

            },
        },
        data: () => {
            return {
                modalVisible : false,
                cats : [
                    {
                        title: "",
                        status: ""
                    }
                ],
            }
        },
        computed: {
            categories(){
                return this.$store.getters.getCategories
            }
        },
        created() {
            this.cats[0].title = this.item.name
            this.cats[0].status = 'active'
            this.fillParentCats(this.item.parent_id)
        },
        methods : {
            fillParentCats(id){
                if(id != null) {
                    let elemId = this.categories.findIndex(item=>item.id == id)
                    this.cats.unshift({
                        title: this.categories[elemId].title,
                    })
                    this.fillParentCats(this.categories[elemId].parent_id);
                }else{
                    return false
                }
            },
            closeModal(){
                this.modalVisible = false
            }

        }
    }
</script>

<style scoped>

</style>
