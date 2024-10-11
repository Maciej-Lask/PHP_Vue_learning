import { createStore } from 'vuex';

const store = createStore({
  state() {
    return {
      firstName: 'John',
      lastName: 'Doe',
      email: 'john@gmail.com',
      gender: 'male',
      picture: 'https://randomuser.me/api/portraits/men/10.jpg',
    };
  },
  mutations: {
    setUser(state, user) {
      state.firstName = user.firstName;
      state.lastName = user.lastName;
      state.email = user.email;
      state.gender = user.gender;
      state.picture = user.picture;
    },
  },
  actions: {
    async fetchUser({ commit }) {
      const res = await fetch('https://randomuser.me/api');
      const { results } = await res.json();
      const user = {
        firstName: results[0].name.first,
        lastName: results[0].name.last,
        email: results[0].email,
        gender: results[0].gender,
        picture: results[0].picture.large,
      };
      commit('setUser', user);
    },
  },
});

export default store;
