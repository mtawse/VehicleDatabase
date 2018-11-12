<template>
  <v-container>
    <v-layout row wrap>
      <v-flex xs12 sm8 offset-sm2>
        <h1>{{ manufacturer.name }}</h1>
         <VehiclesTable :vehicles="vehicles"></VehiclesTable>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import HTTP from '../http';
import VehiclesTable from '@/components/VehiclesTable.vue';

export default {
  props: ['id'],
  components: {
    VehiclesTable,
  },
  data() {
    return {
      manufacturer: {},
      vehicles: [],
    };
  },
  created() {
    HTTP()
      .get(`manufacturers/${this.id}/vehicles`)
      .then(response => {
        this.manufacturer = response.data.data;
        this.vehicles = this.manufacturer.vehicles;
      })
      .catch(error => {
        console.log(error);
      });
  },
};
</script>

<style>
</style>
