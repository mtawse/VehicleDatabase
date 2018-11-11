import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    baseUrl: '/api',
    isLoggedIn: !!localStorage.getItem('token'),
  },
  mutations: {
    loginUser(state) {
      state.isLoggedIn = true;
    },
    logoutUser(state) {
      state.isLoggedIn = false;
    },
  },
  actions: {},
});
