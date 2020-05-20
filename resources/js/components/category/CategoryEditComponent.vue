<template>

    <div class="container">
        <div v-for="cat of cats" :key="cats.title">
            <div v-if="cat.status==='active'">
                <div class="row" >
                    <div class="col">
                        <input type="text" class="p-1 mb-2 shadow form-control" :value="cat.title">
                    </div>
                </div>
                <div class="row" >
                    <div class="col">
                        <button type="button" class="btn btn-primary mt-4" @click="modalVisible=true, checkedCat= cat ">Привязать к другой категории</button>
                    </div>
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

        <div v-if="modalVisible===true">
            <category-template-popup-component
                title="Привязка категории"
            >
                <category-snap-to-another-component
                    :checkedCat = "checkedCat"
                />
                <template #footer>
                    <button-component
                        btnName="Отменить"
                        @click="closeModal"
                    />
                    <button-component
                        btnName="Привязать"
                        @click="save"
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
        props : ['item'],
        data: () => {
            return {
                checkedCat  : '',
                modalVisible : false,
                cats : [
                    {
                        title: "",
                        status: "",
                        id : ""
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
                        id: this.categories[elemId].id,
                    })
                    this.fillParentCats(this.categories[elemId].parent_id);
                }else{
                    return false
                }
            },
            closeModal(){
                this.modalVisible = false
            },
            save(){
                this.$store.dispatch('SNAP_TO_CATEGORY_STATUS', true)
            }

        },
        // mounted() {
        //     this.$store.subscribe((mutation , getters) => {
        //         if(mutation.type === 'LOAD_CATEGORIES'){
        //             console.log(this.categories)
        //         }
        //     })
        // }
    }
</script>

<style scoped>

</style>
