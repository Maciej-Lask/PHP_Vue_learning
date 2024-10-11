<template>
  <div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Gallery</h2>

    <div v-if="error" class="text-red-600 font-semibold mb-4">
      Failed to load albums: {{ error.message }}
    </div>

    <div v-else>
      <p class="mb-4">List of albums</p>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div
          v-for="album in paginatedAlbums"
          :key="album.id"
          class="bg-white p-4 shadow rounded"
        >
          <h3 class="text-xl font-semibold">{{ album.title }}</h3>
          <NuxtLink
            :to="'/album/' + album.id"
            class="text-blue-500 hover:underline"
          >
            View Photos
          </NuxtLink>
        </div>
      </div>

      <PaginationRoot class="flex justify-center mt-4">
        <PaginationPrev
          :disabled="currentPage === 1"
          @click="handlePageChange(currentPage - 1)"
          class="mr-2 px-2 py-1 rounded border hover:bg-gray-100"
        />
        <PaginationList class="flex items-center space-x-1">
          <div
            v-for="page in paginationRange"
            :key="page"
            :class="[page === currentPage
              ? 'bg-blue-600 text-white font-semibold'
              : 'bg-white text-gray-800 border border-gray-300 hover:bg-blue-50',
              'px-3 py-1 rounded-md cursor-pointer transition-all duration-300']"
            @click="handlePageChange(page)"
          >
            {{ page }}
          </div>
        </PaginationList>
        <PaginationNext
          :disabled="currentPage === totalPages"
          @click="handlePageChange(currentPage + 1)"
          class="ms-2 px-2 py-1 rounded border hover:bg-gray-100"
        />
      </PaginationRoot>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue';
import { useRouter, useRoute, useFetch } from 'nuxt/app';
import {
  PaginationRoot,
  PaginationPrev,
  PaginationList,
  PaginationNext,
} from 'radix-vue';

const itemsPerPage = 21;
const route = useRoute();
const router = useRouter();

const currentPage = ref(parseInt(route.query.page) || 1);



const { data: albums, error } = useFetch('https://jsonplaceholder.typicode.com/albums');

const totalPages = computed(() => {
  return albums.value ? Math.ceil(albums.value.length / itemsPerPage) : 0;
});

const paginatedAlbums = computed(() => {
  const start = (currentPage.value - 1) * itemsPerPage;
  return albums.value ? albums.value.slice(start, start + itemsPerPage) : [];
});

const paginationRange = computed(() => {
  const delta = 1;
  return Array.from(
    { length: delta * 2 + 1 },
    (_, i) => i + Math.max(1, currentPage.value - delta)
  ).filter((page) => page <= totalPages.value);
});

const handlePageChange = (page) => {
  if (page >= 1 && page <= totalPages.value) {
    router.push({ query: { page } });
    currentPage.value = page;
  }
};

watch(() => route.query.page, (newPage) => {
  currentPage.value = parseInt(newPage) || 1;
});
</script>