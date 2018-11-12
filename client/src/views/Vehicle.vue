<template>
    <v-container>
      <v-layout row wrap>
        <v-flex xs12 sm8 offset-sm2>
          <v-layout row wrap>
            <v-flex xs12>
              <h1>{{ vehicle.license_plate }}</h1>
            </v-flex>
        </v-layout>
        <v-layout row wrap>
          <v-flex xs12>

            <v-tabs>
              <v-tab>Vehicle</v-tab>
              <v-tab-item>
                <template v-if="vehicle">
                  <VehicleCard
                    :vehicle="vehicle"
                    :manufacturer="manufacturer"
                    :model="model"
                  ></VehicleCard>
                </template>
              </v-tab-item>

              <v-tab>Owner</v-tab>
              <v-tab-item>
                <template v-if="owner">
                  <OwnerCard :owner="owner"></OwnerCard>
                </template>
              </v-tab-item>
            </v-tabs>

          </v-flex>
        </v-layout>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import HTTP from '../http';
import VehicleCard from '@/components/VehicleCard.vue';
import OwnerCard from '@/components/OwnerCard.vue';

export default {
  props: ['id'],
  components: {
    VehicleCard,
    OwnerCard,
  },
  data() {
    return {
      vehicle: {},
      manufacturer: {},
      model: {},
      owner: {},
    };
  },
  created() {
    HTTP()
      .get(`vehicles/${this.id}`)
      .then(response => {
        this.vehicle = response.data.data;
        this.manufacturer = this.vehicle.manufacturer;
        this.model = this.vehicle.model;
        this.owner = this.vehicle.owner;
      })
      .catch(error => {
        console.log(error);
      });
  },
};
</script>

<style>
</style>
