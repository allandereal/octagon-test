<script setup>
import { ref } from 'vue'

defineProps({
  msg: String
})

const count = ref(0) 
</script>

<template>
<div class="flex items-center justify-center h-screen">
  <div>
    <img class="py-6" src="/vite.svg">
    <h1 class="text-gray-800 pt-4 text-3xl tracking-tighter font-bold">Sign in</h1>
    <p class="py-2 text-sm">
      <span class="text-gray-600">Don't have an account?</span>
      <a class="text-indigo-600 ml-2 hover:underline" href="/">Sign up</a>
    </p>
    <div class="py-4">
      <label class="block text-gray-600 text-sm font-semibold mb-2" for="username">
        Phone number *
      </label>
      <input type="text" class="rounded-lg border-gray-300 ring-1 ring-gray-100">
    </div>
    <div class="py-2">
      <label class="block text-gray-600 text-sm font-semibold mb-2" for="username">
        Password *
      </label>
      <input type="password" class="rounded-lg border-gray-300 ring-1 ring-gray-100">
    </div>
    <div class="py-4 flex items-center justify-between">
      <label class="md:w-2/3 block text-gray-600 font-semibold">
        <input class="mr-2 rounded leading-tight" type="checkbox">
        <span class="text-sm">
          Remember me
        </span>
      </label>
      <a class="text-indigo-600 text-sm " href="/">Forgot password?</a>
    </div>
  </div>
</div>
</template>
