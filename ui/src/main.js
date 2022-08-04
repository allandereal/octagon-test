import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import routes from './router/index.js'
import axios from 'axios'
import { createPinia } from 'pinia'
import  { useAuthStore }  from './store/auth.js'
import App from './App.vue'
import './index.css'

const router = createRouter({
    history: createWebHistory(),
    routes,
})

const pinia = createPinia()

createApp(App)
.use(router)
.use(pinia)
.mount('#app')

const authStore = useAuthStore()

axios.interceptors.request.use(function(config) {
    config.headers.common = {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer " + localStorage.getItem("accessToken")
    };
  
    return config;
});

axios.interceptors.response.use(
response => response,
error => {
    if (error.response.status === 422) {
        authStore.setFormErrors(error.response.data.errors);
    } else if (error.response.status === 401) {
        authStore.setUser(null);
        //localStorage.removeItem("authToken");
        router.push({ name: "login" });
    } else {
        return Promise.reject(error);
    }
});