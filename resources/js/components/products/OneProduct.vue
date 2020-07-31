<template>
    <div class="wrapper">
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
    .wrapper{
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr 1fr 1fr 1fr 1fr;
        border: 1px solid black;
        width: 25vw;
        height: 25vw;
        min-height: 320px;
        min-width: 320px;
        justify-self: center;
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

    @media only screen and (max-width : 1102px){
        .wrapper{
            width: 35vw;
            height: 35vw;
        }

    }
    @media only screen and (max-width : 750px){
        .wrapper{
            width: 50vw;
            height: 50vw;
        }

    }

</style>
