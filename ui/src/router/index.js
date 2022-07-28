import LoginPage from '../components/LoginPage.vue'
import SignupPage from '../components/SignupPage.vue'
import ProfilePage from '../components/ProfilePage.vue'

const routes = [
    { path: '/', component: ProfilePage, name: 'profile' },
    { path: '/login', component: LoginPage, name: 'login' },
    { path: '/signup', component: SignupPage, name: 'signup' },
]

export default routes