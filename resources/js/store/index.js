import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)


//Modules
import catagories from './modules/catagories'
import brands from './modules/brands'

export default new Vuex.Store({
    modules:{
        catagories,
        brands
    }
})