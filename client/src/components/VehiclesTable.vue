<template>
  <v-data-table
    :headers="headers"
    :items="vehicles"
    hide-actions
    class="elevation-1"
  >
    <template slot="items" slot-scope="props">
      <td>
        <router-link
          :to="{ name: 'vehicle', params: { id: props.item.id }}"
        >
          {{ props.item.license_plate }}
        </router-link>
      </td>
      <td>
        <router-link
          :to="{ name: 'manufacturer', params: { id: props.item.manufacturer.id }}"
        >
          {{ props.item.manufacturer.name }}
        </router-link>
      </td>
      <td>{{ props.item.model.name }}</td>
      <td>{{ props.item.type }}</td>
      <td>{{ props.item.fuel_type }}</td>
      <td>{{ props.item.colour }}</td>
    </template>
  </v-data-table>
</template>

<script>
export default {
  name: 'VehiclesTable',
  props: ['vehicles'],
  data() {
    return {
      headers: [
        { text: 'License Plate', value: 'license_plate' },
        { text: 'Manufacturer', value: 'manufacturer.name' },
        { text: 'Model', value: 'model.name' },
        { text: 'Type', value: 'type' },
        { text: 'Fuel Type', value: 'fuel_type' },
        { text: 'Colour', value: 'colour' },
      ],
    };
  },
};
</script>

<style>
</style>
