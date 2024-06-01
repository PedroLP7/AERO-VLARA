import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

const app = createApp(App)
import axios from 'axios'
axios.defaults.withCredentials = true;
axios.defaults.baseURL = 'http://localhost:8000';


app.use(router)

app.mount('#app')
