<template>
    <div class="container-fluid menu ">
        <div class="row root">
            <div class="d-flex align-items-start">
                <div class="col bg-primary mg-1" v-for="each of root" @mouseover="each.is_visible = true" @mouseleave="each.is_visible = false">
                    <a class="nav-link text-center text-light " href="#" >{{each.item.title}}</a>
                    <menu-tree-component v-if="each.is_visible === true"
                    :children="each.item.children"/>
                </div>
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
    .menu{
        z-index: 2;
    }
</style>
