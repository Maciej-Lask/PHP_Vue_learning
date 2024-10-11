<template>
  <div id="app">
    <img :src="userStore.picture" :class="userStore.gender" alt="user-avatar" />
    <h1>{{ userStore.firstName }} {{ userStore.lastName }}</h1>
    <h3>Email: {{ userStore.email }}</h3>
    <button @click="userStore.getUser">Get Random User</button>
  </div>
</template>

<script>
import { useUserStore } from './user-store'

export default {
  name: 'App',
  setup() {
    const userStore = useUserStore()
    return { userStore }
  }
}
</script>