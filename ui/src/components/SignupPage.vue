<script setup>
import InputField from './forms/InputField.vue'
import  { useAuthStore }  from '../store/auth.js'
import { ref } from 'vue'

defineProps({
  //msg: String
})

const formFields = ref({
  'first_name': null,
  'last_name': null,
  'phone': null,
  'password': null,
})

const authStore = useAuthStore()

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

    <InputField label="First name *" type="text" v-model="formFields.first_name" />
    <InputField label="Last name *" type="text" v-model="formFields.last_name" />
    <InputField label="Phone number *" type="text" v-model="formFields.phone" />
    <InputField label="Password *" type="password" v-model="formFields.password" />
    <button class="bg-indigo-700 text-white w-full my-2 py-2 rounded-full hover:bg-indigo-700">Sign up</button>
  </div>
</div>
</template>