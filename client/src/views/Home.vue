<template>
  <v-container>
    <h1>Welcome to the Vehicles Database</h1>
    <router-link :to="{ name: 'vehicles'}">View all vehicles</router-link>
  </v-container>
</template>

<script>
export default {
  name: 'home',
};
</script>
