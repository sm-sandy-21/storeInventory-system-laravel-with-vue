<template>
  <div class="card-body">
          <form action="" method="POST">
              <div  class="form-group row">
                   <label >Catagory Name</label>
                    <select class="form-control mb-2 mr-sm-2" v-model="formData.catagories_id" >
                        <option v-for="(item,index) in catagories" :key="index" :value="item.id">
                                {{ item.catagoryName }}
                        </option>
                    </select>

                    <label >Brands Name</label>
                    <select class="form-control mb-2 mr-sm-2" v-model="formData.brands_id" >
                        <option v-for="(item,index) in brands" :key="index" :value="item.id">
                                {{ item.brandName }}
                        </option>
                    </select>

                    <!-- <Select2new v-model="formData.catagories_id" :options="catagories" :settings="{ settingOption: value, settingOption: value }" @change="myChangeEvent($event)" @select="mySelectEvent($event)" >
                       
                    </Select2new> -->
                   
                      
              </div>
           
             <div class="form-group row">
                 <label >productName</label>
                 <input type="text" name="productName" required class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Add product Name">      
  
             </div >
            
            <button type="submit" class="btn btn-primary mb-2">Add product Name</button>
           
          </form>
          <a href=""><button style="margin-top: 10px" class="btn btn-dark mb-2">Back To All products</button></a> 
        </div>
</template>

<script>
import store from '../../store/index'
import * as actions from '../../store/action-types'
import { mapGetters } from 'vuex'
import Select2new from 'v-select2-component'

export default {
    components: {Select2new},
    data(){
        return{
            formData: {
                catagories_id: 0,
                brands_id:0
            }
        }
    },
    mounted(){
        store.dispatch(actions.GET_CATAGORIES)
        store.dispatch(actions.GET_BRANDS)

    },
     computed: {
    
    ...mapGetters({
        'catagories' : 'getCatagories',
        'brands' : 'getBrands'
    })
  }


}
</script>

<style>
/* label {
    margin-bottom: 11px;
    margin-left: 15px;
    background: 1px #44413e;
    padding: 5px;
    border-radius: 5px;
    color: aqua;
} */
</style>