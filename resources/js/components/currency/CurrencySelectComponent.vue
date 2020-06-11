<template>
    <div>
<!--        <div @click="logs">1111</div>-->
        <select v-model="changeCurr">
            <option selected>{{changeCurr}}</option>
            <option v-for="curr of currenciesData" :value="curr.charCode">{{curr.charCode}}</option>
        </select>
    </div>
</template>

<script>
    export default {
        name: "CurrencySelectComponent",
        props : ['currenciesData'],
        data() {
            return {
                changeCurr : ''
            }
        },
        watch : {
            changeCurr : function(){
                fetch('/currency?curr=' + this.changeCurr)
            }
        }

    }
</script>

<style scoped>

</style>
