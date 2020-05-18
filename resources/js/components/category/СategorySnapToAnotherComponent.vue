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
                <td><input type="radio" name="snap" class="ml-4 shadow" :checked="checkedCat = cat">
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
                checkedCat: '',
            }
        },
        computed: {
            categories(){
                return this.$store.getters.getCategories
            }
        },
    }
</script>

<style scoped>

</style>
