import Vue from 'vue'
import Vuex from 'vuex'
import categoryModule from './modules/category'

Vue.use(Vuex)

export default new Vuex.Store({
    modules : {
        categoryModule
    }
})
