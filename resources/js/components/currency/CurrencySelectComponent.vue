<template>
    <div>
<!--        <div @click="logs">1111</div>-->
        <select v-model="changeCurr" name="currency">
            <option v-for="curr of currenciesData" :value="curr.charCode">{{curr.charCode}}</option>
        </select>
    </div>
</template>

<script>
    export default {
        name: "CurrencySelectComponent",
        props : ['currenciesData','currencyCookie'],
        data() {
            return {
                changeCurr : this.currencyCookie
            }
        },
        watch : {
            changeCurr : function(){
                fetch('currencyWidget?curr=' + this.changeCurr)
            },
        }

    }
</script>

<style scoped>

</style>
