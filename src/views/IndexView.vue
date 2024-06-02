

<template>
  <div>
    <h1>Home</h1>
    <p>Welcome to the Home page!</p>
  </div>
  <p v-if="logedIn"> Bienvenido {{ user}}</p>
 
</template>
<script>
import axios from 'axios';
export default {
  data() {
    return {
      logedIn: false,
      user: null,
      errorMessage: '',
    };
  },
  created() {
    
      this.getUser();
    
   
  },
methods: {
  async getUser(){
    const token = localStorage.getItem('authToken');

// Configuración global de Axios para incluir el token en todas las solicitudes
      axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    try {
      const response = await axios.get('/api/user');
      console.log(response.data);
      this.logedIn = true;
      this.user = response.data;
    } catch (error) {
      console.error('Error getting user:', error.response.data);
      this.errorMessage = error.response.data.message || 'Error getting user. Please try again later.';
    }
  },
      
      
      
},
};



</script>
