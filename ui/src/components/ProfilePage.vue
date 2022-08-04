<script setup>
import  { useAuthStore }  from '../store/auth.js'
import { useRouter } from 'vue-router';
import { onBeforeMount } from 'vue';

const router = useRouter()

const authStore = useAuthStore()

onBeforeMount(() => {
  if(!authStore.getUser){
    authStore.fetchUser()
  }
});

const logout = () => {
  authStore.logoutUser().then(() => {
    router.push({name: 'login'});
  });
}

</script>

<template>
<div>
  <div class="w-full relative">
    <img class="h-40 lg:h-100 w-full object-cover" src="/cover.jpg" alt="profile Cover Image">
    <div class="shadow border-b-1 border-gray-200 pb-4 absolute top-0 mt-24 flex flex-col md:flex-row items-center md:items-end space-y-4 md:space-x-8 w-full mx-auto md:px-20">
      <img class="w-36 h-36 rounded-full border-4 border-white" src="/avatar.jpg" alt="profile Picture">
      <div class="text-center md:text-left">
        <h3 class="text-xl font-bold text-gray-700">{{ authStore.getUser.first_name }} {{ authStore.getUser.last_name }}<span class="font-light text-lg">'s profile</span></h3>
        <p class="text-gray-500 text-sm font-semibold">{{ authStore.getUser.phone }}</p>
        <a href="#logout" @click.prevent="logout" class="cursor-pointer text-sm text-indigo-600 hover:underline">Logout</a>
    
      </div>
    </div>
  </div>
</div>
</template>
