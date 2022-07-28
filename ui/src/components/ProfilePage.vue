<script setup>
import { ref } from 'vue'

defineProps({
  //msg: String
})

//onst count = ref(0) 
</script>

<template>
<div>
  <div class="w-full relative">
    <img class="h-40 lg:h-100 w-full object-cover" src="/cover.jpg" alt="profile Cover Image">
    <div class="shadow border-b-1 border-gray-200 pb-4 absolute top-0 mt-24 flex flex-col md:flex-row items-center md:items-end space-y-4 md:space-x-8 w-full mx-auto md:px-20">
      <img class="w-36 h-36 rounded-full border-4 border-white" src="/avatar.jpg" alt="profile Picture">
      <div class="text-center md:text-left">
        <h3 class="text-xl font-bold text-gray-700">Allan Ahumuza<span class="font-light text-lg">'s profile</span></h3>
        <p class="text-gray-500 text-sm font-semibold">+256 755 337120</p>
        <router-link class="text-sm text-indigo-600 hover:underline" :to="{ name: 'login'}">Logout</router-link>
    
      </div>
    </div>
  </div>
</div>
</template>
