<template>
  <div>
    <form @submit.prevent="login">
      <input type="text" v-model="userName" placeholder="Username" required />
      <input type="password" v-model="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
    <div v-if="errorMessage">{{ errorMessage }}</div>

    <button @click="logout">Logout</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      userName: '',
      password: '',
      errorMessage: '',
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

        this.$router.push('/index'); // Redirige al usuario a la página de inicio
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
      localStorage.removeItem('authToken'); // Elimina el token de localStorage
      this.$router.push('/'); // Redirige al usuario a la página de inicio
    },
    
  },
};
</script>

<style scoped>
/* Add your styles here */
</style>
