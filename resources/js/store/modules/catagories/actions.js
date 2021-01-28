import * as actions from '../../action-types'
import * as mutations from '../../mutation-types'


import Axios from 'axios'

export default {
    [actions.GET_CATAGORIES]({commit}){
        Axios.get('/api/catagories')
        .then(res =>{
            //console.log(res.data)
            if(res.data.success == true){
                commit(mutations.SET_CATAGORIES,res.data.data)
            }
            
        })
        .catch(err =>{
            console.log(err.message)
        })
    }
}