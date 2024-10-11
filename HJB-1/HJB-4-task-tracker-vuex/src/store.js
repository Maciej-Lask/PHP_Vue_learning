import { createStore } from 'vuex';

const store = createStore({
  state() {
    return {
      tasks: [],
    };
  },
  mutations: {
    setTasks(state, tasks) {
      state.tasks = tasks;
    },
    addTask(state, task) {
      state.tasks.push(task);
    },
    deleteTask(state, id) {
      state.tasks = state.tasks.filter((task) => task.id !== id);
    },
    toggleReminder(state, id) {
      const task = state.tasks.find((task) => task.id === id);
      if (task) {
        task.reminder = !task.reminder;
      }
    },
  },
  actions: {
    async fetchTasks({ commit }) {
      const res = await fetch('api/tasks');
      const data = await res.json();
      commit('setTasks', data);
    },
    async addTask({ commit }, task) {
      const res = await fetch('api/tasks', {
        method: 'POST',
        headers: {
          'Content-type': 'application/json',
        },
        body: JSON.stringify(task),
      });
      const data = await res.json();
      commit('addTask', data);
    },
    async deleteTask({ commit }, id) {
      const res = await fetch(`api/tasks/${id}`, {
        method: 'DELETE',
      });
      if (res.status === 200) {
        commit('deleteTask', id);
      } else {
        alert('Error deleting task');
      }
    },
    async toggleReminder({ commit }, id) {
      const res = await fetch(`api/tasks/${id}`);
      const task = await res.json();
      const updateTask = { ...task, reminder: !task.reminder };

      const updateRes = await fetch(`api/tasks/${id}`, {
        method: 'PUT',
        headers: {
          'Content-type': 'application/json',
        },
        body: JSON.stringify(updateTask),
      });
      const data = await updateRes.json();
      commit('toggleReminder', data.id);
    },
  },
});

export default store;
