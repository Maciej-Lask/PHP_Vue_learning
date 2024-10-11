
// src/views/Home.vue
<template>
  <AddTask v-show="showAddTask" @add-task="addTask" />
  <Tasks
    @toggle-reminder="toggleReminder"
    @delete-task="deleteTask"
    :tasks="tasks"
  />
</template>

<script>
import { mapState, mapActions } from 'vuex';
import Tasks from '../components/Tasks';
import AddTask from '../components/AddTask';

export default {
  name: 'Home',
  props: {
    showAddTask: Boolean,
  },
  components: {
    Tasks,
    AddTask,
  },
  computed: {
    ...mapState(['tasks']),
  },
  methods: {
    ...mapActions(['fetchTasks', 'addTask', 'deleteTask', 'toggleReminder']),
  },
  async created() {
    await this.fetchTasks();
  },
};
</script>
