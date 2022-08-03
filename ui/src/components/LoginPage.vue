<script setup>
import InputField from './forms/InputField.vue'
import { ref } from 'vue'

defineProps({
  //msg: String
})

const formFields = ref({
  'phone': null,
  'password': null,
})

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

    <InputField label="Phone number *" type="text" v-model="formFields.phone" />
    <InputField label="Password *" type="password" v-model="formFields.password" />
    <button class="bg-indigo-700 text-white w-full my-4 py-2 rounded-full hover:bg-indigo-700">Sign in</button>
  </div>
</div>
</template>
