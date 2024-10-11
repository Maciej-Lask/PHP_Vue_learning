<template>
  <div class="bg-white p-4 shadow rounded">
    <img :src="photo.thumbnailUrl" :alt="photo.title" class="w-full h-auto mb-2"/>
    <h3 class="text-sm font-semibold">{{ photo.title }}</h3>
  </div>
</template>

<script setup>
defineProps({
  photo: {
    type: Object,
    required: true
  }
})
</script>

<style scoped>
</style>
