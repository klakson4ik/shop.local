<template>
    <div class="container">
        <div class="item img"><img src="#" alt="Сервер недоступен"></div>
        <div class="item title"><a :href="'products/' + product.alias"></a>{{product.title}}</div>
        <div class="item price"><p>{{product.price}}</p></div>
        <div class="item description" ><pre>{{product.description}}</pre></div>
    </div>
</template>

<script>
    export default {
        name: "OneProduct",
        props : ['product'],
        data() {
            return {
            }
        },

    }
</script>

<style scoped>
    .container{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr;
    }

    .img{
        grid-column: 1 / 2;
        grid-row: 1 / 4;
    }
</style>
