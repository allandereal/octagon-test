<script setup>
import InputField from './forms/InputField.vue'
import  { useAuthStore }  from '../store/auth.js'
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router';

const authStore = useAuthStore()
const router = useRouter()

const formFields = reactive({
  'phone': null,
  'password': null,
})

const login = () => {
  authStore.loginUser(formFields).then((response) => {
      router.push({name: 'profile'});
  });
}

</script>

<template>
<div class="flex items-center justify-center h-screen">
  <div>
    <img class="my-6" src="/vite.svg">
    <h1 class="text-gray-800 mt-4 text-3xl tracking-tighter font-bold">Sign in</h1>
    <p class="my-2 text-sm">
      <span class="text-gray-600">Don't have an account?</span>
      <router-link class="text-indigo-600 ml-2 hover:underline" :to="{ name: 'signup'}">Sign up</router-link>
    </p>
    <form @submit.prevent="login">
      <InputField label="Phone number *" name="phone" type="text" v-model="formFields.phone" />
      <InputField label="Password *" name="password" type="password" v-model="formFields.password" />
      <button class="bg-indigo-700 text-white w-full my-4 py-2 rounded-full hover:bg-indigo-700">Sign in</button>
    </form>
  </div>
</div>
</template>
