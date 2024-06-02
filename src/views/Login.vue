<template>
  




  <form @submit.prevent="login">
  <div class="mb-3">
    <label for="userName" class="form-label">User Name</label>
    <input type="text" v-model="userName" class="form-control" id="userName" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" v-model="password" class="form-control" id="exampleInputPassword1">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      userName: '',
      password: '',
      errorMessage: '',
      logedIn: false,
      //gestionar el loggeo , igual hay que meter vuex
    };
  },
  methods: {
    async login() {
      try {
        const response = await axios.post('/api/login', {
          userName: this.userName,
          password: this.password,
        });
        console.log('Login successful:', response.data);

        // Almacenar solo el token como una cadena
        localStorage.setItem('authToken', response.data.token);

        this.$router.push('/home'); // Redirige al usuario a la página de inicio
        this.logedIn = true;
      } catch (error) {
        if (error.response) {
          console.error('Error logging in:', error.response.data);
          this.errorMessage = error.response.data.message || 'Login failed. Please check your credentials.';
        } else {
          console.error('Error logging in:', error.message);
          this.errorMessage = 'An error occurred. Please try again later.';
        }
      }
    },
    async logout() {
      try {
        // const token = localStorage.getItem('authToken'); 
        const response = await axios.post('/api/logout');
        console.log('Logout successful:', response.data);
      } catch (error) {
        console.error('Error logging out:', error.message);
      }
    
      
       
      localStorage.removeItem('authToken'); // Elimina el token de localStorage
      this.$router.push('/'); // Redirige al usuario a la página de inicio
    },
    
    
  },
};
</script>

<style scoped>
/* Add your styles here */
</style>
