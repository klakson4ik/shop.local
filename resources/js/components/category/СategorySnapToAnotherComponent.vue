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
                <td><input type="radio" name="snap" class="ml-4 shadow" :checked="checked= cat">
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
        props: ['checkedCat'],
        data: () => {
            return {
                checked: '',
            }
        },
        computed: {
            categories(){
                return this.$store.getters.getCategories
            }
        },
        methods : {
            save(){
                // console.log(this.checkedCat )
                console.log(this.checked)
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
