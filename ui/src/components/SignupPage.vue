<script setup>
import InputField from './forms/InputField.vue'
import  { useAuthStore }  from '../store/auth.js'
import { useRouter } from 'vue-router';
import { onBeforeMount, reactive } from 'vue'

const router = useRouter()

onBeforeMount(() => {
  authStore.setFormErrors({})
});

const formFields = reactive({
  'first_name': null,
  'last_name': null,
  'phone': null,
  'password': null,
})

const authStore = useAuthStore()

const signup = () => {
  authStore.signupUser(formFields).then((response) => {
    if(response.status == 201){
      router.push({name: 'login'});
    }
  }).catch((error) => {
    console.log(error)
  })
}

</script>

<template>
<div class="flex items-center justify-center h-screen">
  <div>
    <img class="my-6" src="/vite.svg">
    <h1 class="text-gray-800 mt-4 text-3xl tracking-tighter font-bold">Sign up</h1>
    <p class="my-2 text-sm">
      <span class="text-gray-600">Already have an account?</span>
      <router-link class="text-indigo-600 ml-2 hover:underline" :to="{ name: 'login'}">Sign in</router-link>     
    </p>
    <form @submit.prevent="signup">
      <InputField label="First name *" name="first_name" type="text" v-model="formFields.first_name" />
      <InputField label="Last name *" name="last_name" type="text" v-model="formFields.last_name" />
      <InputField label="Phone number *" name="phone" type="text" v-model="formFields.phone" />
      <InputField label="Password *" name="password" type="password" v-model="formFields.password" />
      <button class="bg-indigo-700 text-white w-full my-2 py-2 rounded-full hover:bg-indigo-700" >Sign up</button>
    </form>
  </div>
</div>
</template>
