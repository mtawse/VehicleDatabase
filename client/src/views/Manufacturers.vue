<template>
  <v-container>
    <v-layout row wrap>
      <v-flex xs12 sm8 offset-sm2>
        <h1>All Manufacturers</h1>
         <ManufacturersTable :manufacturers="manufacturers"></ManufacturersTable>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import HTTP from '../http';
import ManufacturersTable from '@/components/ManufacturersTable.vue';

export default {
  name: 'Manufacturers',
  components: {
    ManufacturersTable,
  },
  data() {
    return {
      manufacturers: [],
    };
  },
  created() {
    HTTP()
      .get('manufacturers')
      .then(response => {
        this.manufacturers = response.data.data;
      })
      .catch(error => {
        console.log(error);
      });
  },
};
</script>

<style>
</style>
