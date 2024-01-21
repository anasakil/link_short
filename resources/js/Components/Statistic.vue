<script setup>
defineProps(["unique_visitors", "total", "most_clicked"]);
</script>
<template>
  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
    <!-- Unique Visitors -->
    <div class="bg-white overflow-hidden rounded-lg shadow-md">
      <div class="p-6">
        <p class="text-sm font-semibold text-gray-600 mb-2">Unique Visitors</p>
        <p class="text-lg font-bold text-gray-700">{{ unique_visitors }}</p>
      </div>
    </div>

    <!-- Count Link -->
    <div class="bg-white overflow-hidden rounded-lg shadow-md">
      <div class="p-6">
        <p class="text-sm font-semibold text-gray-600 mb-2">Count Link</p>
        <p class="text-lg font-bold text-gray-700">{{ total }}</p>
      </div>
    </div>

    <!-- Most Clicked Link -->
    <div class="bg-white overflow-hidden rounded-lg shadow-md">
      <div class="p-6">
        <p class="text-sm font-semibold text-gray-600 mb-2">Most Clicked Link</p>
        <p class="text-lg font-bold text-blue-700">{{ most_clicked }}</p>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Add your custom styles here if needed */
</style>
