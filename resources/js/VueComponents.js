import Vue from "vue";

//menu
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('menu-component', require('./components/header/Menu/MenuComponent.vue').default);
Vue.component('menu-tree-component', require('./components/header/Menu/MenuTreeComponent.vue').default);
Vue.component('first-level-menu-component', require('./components/header/Menu/FirstLevelMenuComponent').default);

//categories
Vue.component('category-create-component', require('./components/category/CategoryCreateComponent.vue').default);
Vue.component('category-index-component', require('./components/category/CategoryIndexComponent.vue').default);
Vue.component('category-template-popup-component', require('./components/reusedComponents/TemplatePopupComponent.vue').default);
Vue.component('category-snap-to-another-component', require('./components/category/СategorySnapToAnotherComponent.vue').default)

//Search
Vue.component('general-search-component', require('./components/header/Search/GeneralSearchComponent.vue').default);


//currency
Vue.component('currency-index-component', require('./components/currency/CurrencyIndexComponent.vue').default);
Vue.component('currency-create-component', require('./components/currency/CurrencyCreateComponent.vue').default);
Vue.component('currency-select-component', require('./components/currency/CurrencySelectComponent.vue').default);


//reusedComponent
Vue.component('table-pagination-component', require('./components/reusedComponents/TablePaginationComponent.vue').default)
Vue.component('dropdown-component', require('./components/reusedComponents/DropdownComponent.vue').default)
Vue.component('button-component', require('./components/reusedComponents/ButtonComponent.vue').default)
Vue.component('search-component', require('./components/reusedComponents/SearchComponent.vue').default)



