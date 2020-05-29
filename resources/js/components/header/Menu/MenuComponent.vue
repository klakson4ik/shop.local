<template>
    <div class="container-fluid ">
        <div class="row d-flex justify-content-start">
            <div class="col" v-for="each of root" @mouseover="each.is_visible = true" @mouseleave="each.is_visible = false">
                <a class="nav-link" href="#" >{{each.item.title}}</a>
                <menu-tree-component v-if="each.is_visible === true"
                :children="each.item.children"/>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "headerComponent",
        props : ['categoryNested'],
        data() {
            return {
                root : []
            }
        },

        created() {
            for (let item in this.categoryNested){
                if (this.categoryNested[item]['parent_id'] == null)
                    this.root.push({
                        item :this.categoryNested[item],
                        is_visible : false
                    })
            }
        }
    }

</script>

<style scoped>

</style>
