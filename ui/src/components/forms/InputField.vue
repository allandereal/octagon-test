<script setup>
import { ref } from 'vue'

defineProps({
  label: String,
  type: String,
  modelValue: String
})

const emit = defineEmits(['update:modelValue'])

const updateValue = (e) => {
    emit('update:modelValue', e.target.value)
}

</script>
<template>
    <div class="my-4">
      <label class="block text-gray-600 text-sm font-semibold mb-2" for="username">
        {{ label }}
      </label>
      <input v-bind:type="type" :value="modelValue" @input="updateValue" class="rounded-lg border-gray-300 ring-1 ring-gray-100">
    </div>
</template>
