<template>
  <v-layout row>
    <v-flex sm12>
      <v-card>
        <v-card-title primary-title>
          <h3>Vehicle Details</h3>
        </v-card-title>
        <v-card-text>
          <v-list>
            <template v-for="(item, index) in formattedVehicle">
              <v-list-tile :key="index">
                <v-list-tile-content>
                  <v-list-tile-title>{{ item.label }}</v-list-tile-title>
                </v-list-tile-content>
                <v-list-tile-content class="font-weight-medium align-end">
                    {{ item.value }}
                </v-list-tile-content>
              </v-list-tile>
              <v-divider
                v-if="index + 1 < formattedVehicle.length"
                :key="`divider-${index}`">
              </v-divider>
            </template>
          </v-list>
        </v-card-text>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
export default {
  name: 'VehicleCard',
  props: ['vehicle', 'manufacturer', 'model'],
  computed: {
    formattedVehicle: function() {
      console.log(this.vehicle);
      return [
        {
          label: 'Manufacturer',
          value: this.manufacturer.name,
        },
        {
          label: 'Model',
          value: this.model.name,
        },
        {
          label: 'License Plate',
          value: this.vehicle.license_plate,
        },
        {
          label: 'Type',
          value: this.vehicle.type,
        },
        {
          label: 'Fuel Type',
          value: this.vehicle.fuel_type,
        },
        {
          label: 'Usage',
          value: this.vehicle.usage,
        },
        {
          label: 'Colour',
          value: this.vehicle.colour,
        },
        {
          label: 'Transmission',
          value: this.vehicle.transmission,
        },
        {
          label: 'HGV',
          value: this.vehicle.is_hgv ? 'Yes' : 'No',
        },
        {
          label: 'Number of Seats',
          value: this.vehicle.no_seats,
        },
        {
          label: 'Boot',
          value: this.vehicle.has_boot ? 'Yes' : 'No',
        },
        {
          label: 'Sunroof',
          value: this.vehicle.has_sunroof ? 'Yes' : 'No',
        },
        {
          label: 'Trailer',
          value: this.vehicle.has_trailer ? 'Yes' : 'No',
        },
        {
          label: 'GPS',
          value: this.vehicle.has_gps ? 'Yes' : 'No',
        },
        {
          label: 'Number of Wheels',
          value: this.vehicle.no_wheels,
        },
        {
          label: 'Weight Category',
          value: this.vehicle.weight_category,
        },
        {
          label: 'Engine CC',
          value: this.vehicle.engine_cc,
        },
      ];
    },
  },
};
</script>

<style>
</style>
