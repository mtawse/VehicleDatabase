<template>
  <v-toolbar>
    <router-link to="/" class=toolbar-title>
      <v-toolbar-title>Vehicles Database</v-toolbar-title>
    </router-link>
    <v-spacer></v-spacer>
    <v-toolbar-items class="hidden-sm-and-down">
      <template v-if="!isLoggedIn">
        <v-btn flat to="/login">Login</v-btn>
      </template>
      <template v-else>
        <v-btn flat to="/manufacturers">Manufacturers</v-btn>
        <v-btn flat to="/vehicles">Vehicles</v-btn>
        <v-btn flat to="/logout">Logout</v-btn>
      </template>
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
