<template>
    <div>
        <select>
            <option selected>Open this select menu</option>
            <option v-for="curr of currenciesData" :value="curr.charCode" @change="changeCurrency(curr.charCode)">{{curr.charCode}}</option>
        </select>
    </div>
</template>

<script>
    export default {
        name: "CurrencySelectComponent",
        props : ['currenciesData'],
        data() {
            return {
            }
        },
        methods: {
            changeCurrency(curr) {
                console.log(curr)
            }
        },
    }
</script>

<style scoped>

</style>
