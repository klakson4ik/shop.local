<template>
    <div>
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
                <td>{{cat.name}}</td>
                <td><input type="radio" name="snap" class="ml-4 shadow"  @change = "checked(cat)">
                </td>

            </tr>
            </tbody>
        </table>
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <table-pagination-component
                        @fillCat = "fillCat"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import tableMixin from  './table'

    export default {
        name: "CategorySnapToAnotherComponent",
        mixins : [tableMixin],
        data: () => {
            return {
                checkID: ''
            }
        },
        computed: {
            categories(){
                return this.$store.getters.getCategories
            },
        },
        methods : {
            save(){

                let checked = this.$store.getters.getCheckedCat
                let categories = this.categories
                let oldID = checked.id
                let oldParentID = checked.parent_id
                let oldCat = {
                    id : oldID,
                    parent_id : oldParentID
                }
                this.$store.dispatch('OLD_CATEGORY', oldCat)
                checked = categories.findIndex(item=>item.id == oldID)
                categories[checked].parent_id = this.checkID
                this.$emit('close')
            },
            checked(cat){
                this.checkID= cat.id
            }
        },
        mounted() {
            this.$store.subscribe((mutation , getters) => {
                if(mutation.type === 'SNAP_TO_CATEGORY_STATUS' && getters.categoryModule.snapToCategoryStatus === true){
                    this.save()
                }
            })
        }
    }
</script>

<style scoped>

</style>
