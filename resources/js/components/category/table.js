import TablePaginationComponent from "../reusedComponents/TablePaginationComponent";
import SearchComponent from "../reusedComponents/SearchComponent";

export default {
    component :{TablePaginationComponent, SearchComponent},
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
