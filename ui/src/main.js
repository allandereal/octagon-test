import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import routes from './router/index.js'
import { createPinia } from 'pinia'
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
