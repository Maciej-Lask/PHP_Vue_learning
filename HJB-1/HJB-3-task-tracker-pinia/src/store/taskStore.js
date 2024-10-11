import { defineStore } from 'pinia';

export const useTaskStore = defineStore('taskStore', {
  state: () => ({
    tasks: [],
    loading: false,
  }),
  getters: {
    favs() {
      return this.tasks.filter((t) => t.isFav);
    },
    favCount() {
      return this.tasks.reduce((p, c) => {
        return c.isFav ? p + 1 : p;
      }, 0);
    },
    totalCount: (state) => {
      return state.tasks.length;
    },
  },
  actions: {
    async fetchTasks() {
      this.loading = true;
      try {
        const res = await fetch('api/tasks');
        if (!res.ok) throw new Error('Error fetching tasks');
        const data = await res.json();
        this.tasks = data;
      } catch (error) {
        console.error('Fetch Tasks Error:', error);
      } finally {
        this.loading = false;
      }
    },
    async addTask(task) {
      try {
        const res = await fetch('api/tasks', {
          method: 'POST',
          body: JSON.stringify(task),
          headers: { 'Content-Type': 'application/json' },
        });
        if (!res.ok) throw new Error('Error adding task');
        const newTask = await res.json();
        this.tasks.push(newTask); 
      } catch (error) {
        console.error('Add Task Error:', error);
      }
    },
    async deleteTask(id) {
      try {
        const res = await fetch('api/tasks/' + id, {
          method: 'DELETE',
        });
        if (!res.ok) throw new Error('Error deleting task');
        this.tasks = this.tasks.filter((t) => t.id !== id);
      } catch (error) {
        console.error('Delete Task Error:', error);
      }
    },
    async toggleReminder(id) {
      const task = this.tasks.find((t) => t.id === id);
      const newReminder = !task.reminder;
      try {
        const res = await fetch('api/tasks/' + id, {
          method: 'PATCH',
          body: JSON.stringify({ reminder: newReminder }),
          headers: { 'Content-Type': 'application/json' },
        });
        if (!res.ok) throw new Error('Error toggling reminder');
        task.reminder = newReminder;
      } catch (error) {
        console.error('Toggle Reminder Error:', error);
      }
    },
  },
});
