<template>
  <main>
    <!-- heading -->
    <header>
      <img src="https://pinia.vuejs.org/logo.svg" alt="pinia logo" />
      <h1>Pinia Tasks</h1>
    </header>
    <!-- add task form -->
    <div class="new-task-form">
      <TaskForm />
    </div>

    <!-- filter -->
    <nav class="filter">
      <button @click="filter = 'all'">All</button>
      <button @click="filter = 'favs'">Favs</button>
    </nav>
    <!-- loading spinner -->
     <div v-if="loading" class="loading">
      Loading tasks...
     </div>
    <!-- display tasks -->

    <div class="task-list" v-if="filter === 'all'">
      <!-- task count -->
      <h5>{{ totalCount }} tasks left</h5>
      <div v-for="task in tasks" :key="task.id">
        <TaskDetails :task="task" />
      </div>
    </div>
    <div class="task-list" v-if="filter === 'favs'">
      <h5>{{ favCount }} favorites left</h5>
      <div v-for="task in favs" :key="task.id">
        <TaskDetails :task="task" />
      </div>
    </div>
    <!-- <button @click="taskStore.$reset"> Reset state </button> -->
  </main>
</template>

<script>
import { useTaskStore } from './stores/TaskStore.js';
import TaskDetails from './components/TaskDetails.vue';
import TaskForm from './components/TaskForm.vue';
import { storeToRefs } from 'pinia';
import { ref } from 'vue';
export default {
  components: { TaskDetails, TaskForm },
  setup() {
    const taskStore = useTaskStore();

    const { tasks, loading , favs, totalCount, favCount } = storeToRefs(taskStore);
    taskStore.getTasks();

    const filter = ref('all');

    return { taskStore, filter, tasks, loading, favs, totalCount, favCount };
  },
};
</script>
