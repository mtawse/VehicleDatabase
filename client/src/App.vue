<template>
<v-app>
  <div id="app">
    <router-view></router-view>
  </div>
</v-app>
</template>
<script>
export default {
  name: 'app',
};
</script>
<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>
