import store from '../store';

export default {
  computed: {
    isLoggedIn() {
      return store.state.isLoggedIn;
    },
  },
};
