<template lang="">
    <div>


        <!-- hola mundo vue  {{data}} -->
        <div>

            <p  v-if="!data">loading...</p>

          
                <p v-else> {{data}}</p>
                </div>


            
        
    </div>
</template>
<script>
import axios from 'axios';
export default {

    data() {
        return {
          data : null
        }
    },
    methods: {
        async  fetchDATA(){
           await  axios.get('http://127.0.0.1:8000/api/prueba')
         .then(response => {
              this.data = response.data
         })
            .catch(error => {
                console.log(error)
            })

        }
       
    },
    mounted() {
        this.fetchDATA()
    }
    
}
</script>
<style lang="">
    
</style>