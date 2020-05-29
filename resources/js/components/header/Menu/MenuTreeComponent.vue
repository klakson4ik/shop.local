<template>
    <div >
        <ul v-for="child of children" @mouseover="child['is_visible'] = true" @mouseleave="child['is_visible'] = false" >
            <li>
                <a class="nav-link" href="#"  >{{child.title}}</a>
                <menu-tree-component
                    v-if="child['is_visible'] === true"
                    :children="child.children"/>
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
                treeDrop : false,
            }
        },
        methods: {
            log() {
                console.log(this.children)
            }
        },
        created() {
            for (let item in this.children){
                this.children[item]['is_visible'] = false
            }
            this.log()
        }

    }
</script>

<style scoped>

</style>
