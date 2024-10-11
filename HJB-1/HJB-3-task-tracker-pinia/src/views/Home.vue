
<template>
  <AddTask v-show="showAddTask" @add-task="addTask" />
  <Tasks
    @toggle-reminder="toggleReminder"
    @delete-task="deleteTask"
    :tasks="tasks"
  />
</template>

<script>
import { useTaskStore } from '@/store/taskStore'
import { storeToRefs } from 'pinia'
import Tasks from '../components/Tasks'
import AddTask from '../components/AddTask'

export default {
  name: 'Home',
  props: {
    showAddTask: Boolean,
  },
  components: {
    Tasks,
    AddTask,
  },
  setup() {
    const taskStore = useTaskStore()
    const { tasks } = storeToRefs(taskStore)

    return { taskStore, tasks }
  },
  methods: {
    addTask(task) {
      this.taskStore.addTask(task)
    },
    deleteTask(id) {
      this.taskStore.deleteTask(id)
    },
    toggleReminder(id) {
      this.taskStore.toggleReminder(id)
    },
  },
  mounted() {
    this.taskStore.fetchTasks()
  },
}
</script>