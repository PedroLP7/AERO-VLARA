<script setup>
import { RouterLink, RouterView } from 'vue-router'

</script>

<template>
  <header>
    <h1>Vue 3 App</h1>

    <div >
      

      <nav>
        <RouterLink to="/">Landing</RouterLink>
        <RouterLink to="/index">Index</RouterLink>
      
        
      </nav>
    </div>
  </header>

  <RouterView />
</template>

<style scoped>

</style>
