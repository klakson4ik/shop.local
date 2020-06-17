<template>
    <div class="input-group w-25">
        <input type="text" class="form-control" placeholder="Найти..." v-model="pattern" aria-label="" aria-describedby="basic-addon1">
        <div class="input-group-append">
            <button class="btn btn-success" type="button">Search</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "GeneralSearchComponent",
        props : ['searchingList'],
        data: () => {
            return {
                pattern : ''
            }
        },

        watch : {
            pattern: function (val) {
                // this.$emit('searchQuery', val)
            },
            searchingList : function () {
                console.log(this.searchingList)

            }
        }
    }
</script>

<style scoped>

</style>
