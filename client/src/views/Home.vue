<template>
  <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs8 offset-xs2>
          <h1>Welcome to the Vehicles Database</h1>
            <v-btn :to="{ name: 'vehicles'}">View all vehicles</v-btn>
          </v-flex>
        </v-layout>
  </v-container>
</template>

<script>
export default {
  name: 'home',
};
</script>
