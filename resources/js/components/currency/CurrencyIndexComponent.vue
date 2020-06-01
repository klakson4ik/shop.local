<template>
    <div></div>
</template>

<script>
    export default {
        name: "CurrencyIndexComponent",
        props : ['currencies'],

        created() {
            console.log(this.currencies)
        }
    }
</script>

<style scoped>

</style>
