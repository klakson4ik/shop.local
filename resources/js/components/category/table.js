import TablePaginationComponent from "../reusedComponents/TablePaginationComponent";

export default {
    component :{TablePaginationComponent},
    data() {
        return {
            items : []
        }
    },
    methods : {
        fillCat(array) {
            this.items = [];
            for (let cat of array) {
                this.items.push({
                        title: cat.title,
                        id: cat.id,
                        parent_id: cat.parent_id
                    }
                )
            }
        },
    }
}
