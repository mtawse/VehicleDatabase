<template>
  <v-data-table
    :headers="headers"
    :items="manufacturers"
    hide-actions
    class="elevation-1"
  >
    <template slot="items" slot-scope="props">
      <td>
        <router-link
          :to="{ name: 'manufacturer', params: { id: props.item.id }}"
        >
          {{ props.item.name }}
        </router-link>
      </td>
    </template>
  </v-data-table>
</template>

<script>
export default {
  name: 'ManufacturersTable',
  props: ['manufacturers'],
  data() {
    return {
      headers: [{ text: 'Manufacturer', value: 'name' }],
    };
  },
};
</script>

<style>
</style>
