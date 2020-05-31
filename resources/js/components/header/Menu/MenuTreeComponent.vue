<template>
    <div >
        <ul v-for="child of array" @mouseover="child.is_visible = true" @mouseleave="child.is_visible = false" >
            <li class="bg-primary mg-1">
                <a class="nav-link text-center text-light" href="#"  >{{child.item.title}}</a>
                <menu-tree-component
                    v-if="child.is_visible === true"
                    :children="child.item.children"/>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "MenuTreeComponent",
        props : ['children'],
        data() {
            return {
                array : []
            }
        },
        created() {
            for (let item in this.children){
                this.array.push({
                    item :this.children[item],
                    is_visible : false
                })
            }
        }

    }
</script>

<style scoped>

</style>
