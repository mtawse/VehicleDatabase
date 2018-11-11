<template>
  <div></div>
</template>

<script>
import store from '../store';

export default {
  mounted() {
    localStorage.removeItem('token');
    store.commit('logoutUser');
    this.$router.push({ name: 'login' });
  },
};
</script>

<style>
</style>
