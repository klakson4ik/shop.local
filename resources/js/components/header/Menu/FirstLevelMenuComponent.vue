<template>
    <div >
        <ul v-for="child of array" @mouseover="child.is_visible = true" @mouseleave="child.is_visible = false" >
            <li class="bg-primary mg-1">
                <a class="nav-link text-center text-light" href="#">{{child.item.title}}</a>
                <menu-tree-component
                    v-if="child.is_visible === true"
                    :categoryNested="child.item.children"/>
            </li>
        </ul>
    </div>
</template>

<script>

    import menuMixin from "./menuMixin";

    export default {
        name: "FirstLevelMenuComponent",
        mixins : [menuMixin],
    }
</script>

<style scoped>

</style>
