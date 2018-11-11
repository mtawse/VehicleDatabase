<template>
  <v-container>
    <v-layout row wrap>
      <v-flex xs12>
        <h1>All Vehicles</h1>
         <VehiclesTable :vehicles="vehicles"></VehiclesTable>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import HTTP from '../http';
import VehiclesTable from '@/components/VehiclesTable.vue';

export default {
  name: 'Vehicles',
  components: {
    VehiclesTable,
  },
  data() {
    return {
      vehicles: [],
    };
  },
  created() {
    HTTP()
      .get('vehicles')
      .then((response) => {
        this.vehicles = response.data.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>

<style>
</style>
