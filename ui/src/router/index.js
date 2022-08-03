import LoginPage from '../components/LoginPage.vue'
import SignupPage from '../components/SignupPage.vue'
import ProfilePage from '../components/ProfilePage.vue'

function redirectAuthenticated(to, from, next){
    if(!localStorage.getItem("authToken") && to.name == 'profile'){
        next({ name: 'login' })
    } else if(localStorage.getItem("authToken") && to.name == 'login') {
        next({ name: 'profile' })
    } else {
        next()
    }
}

const routes = [
    { 
        path: '/',  
        component: ProfilePage, 
        name: 'profile',
        beforeEnter: [redirectAuthenticated]
    },
    { 
        path: '/login', 
        component: LoginPage, 
        name: 'login',
        beforeEnter: [redirectAuthenticated]
    },
    { path: '/signup', component: SignupPage, name: 'signup' },
]

export default routes