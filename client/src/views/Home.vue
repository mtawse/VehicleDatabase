
<template>
  <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12>
            <div class="text-xs-center">
            <h1>Welcome to the Vehicles Database</h1>
            <template v-if="!isLoggedIn">
              <v-btn :to="{ name: 'login'}">Login</v-btn>
            </template>
            <template v-else>
              <v-btn :to="{ name: 'manufacturers'}">View all Manufacturers</v-btn>
              <v-btn :to="{ name: 'vehicles'}">View all Vehicles</v-btn>
            </template>
            </div>
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
