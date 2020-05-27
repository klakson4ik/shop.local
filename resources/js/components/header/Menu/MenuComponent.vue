<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active" v-for="each of root">
                    <a class="nav-link" href="#" @mouseover="treeDrop = !treeDrop">{{each.title}}</a>
                    <menu-tree-component v-if="treeDrop === true"/>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "headerComponent",
        props : ['categoryNested'],
        data() {
            return {
                treeDrop : false,
                root : []
            }
        },

        created() {
            for (let item in this.categoryNested){
                if (this.categoryNested[item]['parent_id'] == null)
                    this.root.push(this.categoryNested[item])
            }
        }
    }

</script>

<style scoped>

</style>
