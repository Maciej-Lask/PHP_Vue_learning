<template>
  <div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Photos</h2>
    <div v-if="photos.length" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
      <AlbumCard v-for="photo in paginatedPhotos" :key="photo.id" :photo="photo" />
    </div>
    <p v-else>No photos available for this album.</p>

    <PaginationRoot v-if="photos.length > itemsPerPage" class="flex justify-center items-center space-x-1 mt-4">
      <PaginationPrev
        :disabled="currentPage === 1"
        @click="handlePageChange(currentPage - 1)"
        class="px-2 py-1 rounded border hover:bg-gray-100"
      />
      <PaginationList class="flex items-center space-x-1">
        <div
          v-for="page in paginationRange"
          :key="page"
          :class="[
            'px-2 py-1 rounded cursor-pointer transition-all duration-300',
            page === currentPage
              ? 'bg-blue-600 text-white font-semibold'
              : 'bg-white text-gray-800 border border-gray-300 hover:bg-blue-50',
          ]"
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
</template>

<script setup>
import { ref, computed, watch } from 'vue';
import { useRouter, useRoute } from 'nuxt/app';
import {
  PaginationRoot,
  PaginationPrev,
  PaginationList,
  PaginationNext
} from 'radix-vue';
import AlbumCard from '~/components/AlbumCard.vue';

const { id } = useRoute().params;

const { data: photos, error } = await useFetch(`https://jsonplaceholder.typicode.com/albums/${id}/photos`);

if (error.value) {
  throw createError({ statusCode: 404, statusMessage: 'Album not found', fatal: true });
}

const itemsPerPage = 10;
const route = useRoute();
const router = useRouter();

const currentPage = ref(parseInt(route.query.page) || 1);

const totalPages = computed(() =>
  Math.ceil(photos.value.length / itemsPerPage)
);

const paginatedPhotos = computed(() => {
  const start = (currentPage.value - 1) * itemsPerPage;
  const end = start + itemsPerPage;
  return photos.value.slice(start, end);
});

const paginationRange = computed(() => {
  const range = [];
  const delta = 2;
  for (let i = Math.max(1, currentPage.value - delta); i <= Math.min(totalPages.value, currentPage.value + delta); i++) {
    range.push(i);
  }
  return range;
});

const handlePageChange = (page) => {
  if (page >= 1 && page <= totalPages.value) {
    router.push({ query: { page } });
  }
};

watch(() => route.query.page, (newPage) => {
  currentPage.value = parseInt(newPage) || 1;
});
</script>
