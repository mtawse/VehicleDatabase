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
      <td>{{ props.item.manufacturer.name }}</td>
      <td>{{ props.item.model.name }}</td>
      <td>{{ props.item.type }}</td>
      <td>{{ props.item.fue_type }}</td>
      <td>{{ props.item.usage }}</td>
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
        { text: 'Usage', value: 'usage' },
        { text: 'Colour', value: 'colour' },
      ],
    };
  },
};
</script>

<style>
</style>
