<template>
  <v-layout row>
    <v-flex sm12>
      <v-card>
        <v-card-title primary-title>
          <div>
            <h3>Vehicle Details</h3>
          </div>
        </v-card-title>
        <v-card-text>
          <v-list>
            <v-list-tile v-for="(value, key)  in formattedVehicle" :key="key">
              <v-list-tile-content>
                <v-list-tile-title>{{ key }}</v-list-tile-title>
              </v-list-tile-content>
              <v-list-tile-content class="font-weight-medium align-end">
                  {{ value }}
              </v-list-tile-content>
            </v-list-tile>
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
      return {
        Manufacturer: this.manufacturer.name,
        Model: this.model.name,
        'License Plate': this.vehicle.license_plate,
        Type: this.vehicle.fuel_type,
        'Fuel Type': this.vehicle.fuel_type,
        Usage: this.vehicle.usage,
        Colour: this.vehicle.colour,
        Transmission: this.vehicle.transmission,
        HGV: this.vehicle.is_hgv ? 'Yes' : 'No',
        'Number of seats': this.vehicle.no_seats,
        Boot: this.vehicle.has_boot ? 'Yes' : 'No',
        Sunroof: this.vehicle.sunroof ? 'Yes' : 'No',
        Trailer: this.vehicle.trailer ? 'Yes' : 'No',
        GPS: this.vehicle.has_gps ? 'Yes' : 'No',
        'Number of wheels': this.vehicle.no_wheels,
        'Weight Category': this.vehicle.weight_category,
        'Engine CC': this.vehicle.engine_cc,
      };
    },
  },
};
</script>

<style>
</style>
