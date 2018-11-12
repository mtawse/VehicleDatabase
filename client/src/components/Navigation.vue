<template>
  <v-toolbar>
    <router-link to="/" class=toolbar-title>
      <v-toolbar-title>Vehicles Database</v-toolbar-title>
    </router-link>
    <v-spacer></v-spacer>
    <v-toolbar-items class="hidden-sm-and-down">
      <v-btn v-if="!isLoggedIn" flat to="/login">Login</v-btn>
      <v-btn v-if="isLoggedIn" flat to="/manufacturers">Manufacturers</v-btn>
      <v-btn v-if="isLoggedIn" flat to="/vehicles">Vehicles</v-btn>
      <v-btn v-if="isLoggedIn" flat to="/logout">Logout</v-btn>
    </v-toolbar-items>
  </v-toolbar>
</template>

<script>
import Auth from '../mixins/Auth';

export default {
  name: 'Navigation',
  mixins: [Auth],
};
</script>

<style>
.toolbar-title {
  color: inherit;
  text-decoration: inherit;
}
</style>
