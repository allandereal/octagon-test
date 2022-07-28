import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import routes from './router/index.js'
import App from './App.vue'
import './index.css'



const router = createRouter({
    history: createWebHistory(),
    routes,
})

createApp(App).use(router).mount('#app')
