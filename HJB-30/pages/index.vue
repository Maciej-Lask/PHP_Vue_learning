<template>
  <h2>Home</h2>
  <div class="text-center">
    <div class="flex flex-col justify-center gap-8">
        <NuxtLink to="/album" class="font-bold text-blue-500 border border-blue-500 px-4 py-2  hover:bg-blue-500 hover:text-white">View our amazing albums</NuxtLink>
        <h3>For example</h3>

        <NuxtLink to="/album/1" class="font-bold text-blue-500 border border-blue-500 px-4 py-2 hover:bg-blue-500 hover:text-white ">Album 1</NuxtLink>
        <NuxtLink to="/album/2" class="font-bold text-blue-500 border border-blue-500 px-4 py-2 hover:bg-blue-500 hover:text-white">Album 2</NuxtLink>
        <NuxtLink to="/album/4" class="font-bold text-blue-500 border border-blue-500 px-4 py-2 hover:bg-blue-500 hover:text-white">Album 4</NuxtLink>
      </div>
  </div>
</template>

<style scoped>
  h2 {
    margin-bottom: 20px;
    font-size: 36px;
  }
  p {
    margin: 20px 0;
  }
</style>