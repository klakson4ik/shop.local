<template>
    <div class="container">
        <div class="item title"><a :href="'products/' + product.alias"></a>{{product.title}}</div>
        <div class="item img"><img src="#" alt="Сервер недоступен"></div>
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
        grid-template-columns: 1fr;
        grid-template-rows: 1fr 1fr 1fr 1fr 1fr;
        border: 1px solid black;
        width: 25vw;
        height: 25vw;
        min-height: 320px;
        min-width: 320px;
    }

    .img{
        grid-row: 2  / 3
    }
    .title{
        grid-row: 1
    }
    .description{
        grid-row: 4;
    }
    .price{
        grid-row: 5;
    }

    @media only screen and (min-width : 1280px){

    }

</style>
