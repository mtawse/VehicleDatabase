<template>
<v-app>
  <div id="app">
    <Navigation></Navigation>
    <router-view></router-view>
  </div>
</v-app>
</template>

<script>
import Navigation from '@/components/Navigation.vue';

export default {
  name: 'app',
  components: {
    Navigation,
  },
  computed: {
    isLoggedIn() {
      return store.state.isLoggedIn;
    },
  },
};
</script>
<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>
