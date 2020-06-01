export default {
    props : ['categoryNested'],
    data() {
        return {
            array : []
        }
    },

    created() {
        for (let item in this.categoryNested){
            this.array.push({
                item :this.categoryNested[item],
                is_visible : false
            })

        }
    }
}
