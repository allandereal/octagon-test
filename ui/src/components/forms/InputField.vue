<script setup>
import { ref } from 'vue'
import  { useAuthStore }  from '../../store/auth.js'

defineProps({
  label: String,
  type: String,
  name: String,
  modelValue: String
})

const authStore = useAuthStore()

const emit = defineEmits(['update:modelValue'])

const updateValue = (e) => {
    emit('update:modelValue', e.target.value)
}

</script>
<template>
    <div class="my-4">
      <label class="block text-gray-600 text-sm font-semibold mb-2">
        {{ label }}
      </label>
      <input v-bind:type="type" :value="modelValue" @input="updateValue" class="rounded-lg border-gray-300 ring-1 ring-gray-100">
      <div class="text-sm italic text-red-500" v-if="authStore.formErrors[name]">{{ authStore.formErrors[name][0] }}</div>
    </div>
</template>
