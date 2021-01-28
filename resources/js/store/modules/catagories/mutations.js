import * as mutations from '../../mutation-types'

export default {
    [mutations.SET_CATAGORIES](state,payload){
        state.catagories = payload
    }
}