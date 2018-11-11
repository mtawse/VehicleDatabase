<template>
  <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs8 offset-xs2>
          <h1>Welcome to the Vehicles Database</h1>
            <v-btn v-if="isLoggedIn" :to="{ name: 'vehicles'}">View all vehicles</v-btn>
            <v-btn v-else :to="{ name: 'login'}">Login</v-btn>
          </v-flex>
        </v-layout>
  </v-container>
</template>

<script>
import Auth from '../mixins/Auth';

export default {
  name: 'home',
  mixins: [Auth],
};
</script>
