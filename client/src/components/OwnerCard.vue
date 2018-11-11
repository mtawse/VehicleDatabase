<template>
  <v-layout row>
    <v-flex sm12>
      <v-card>
        <v-card-title primary-title>
          <div>
            <h3>Owner Details</h3>
          </div>
        </v-card-title>
        <v-card-text>
          <v-list>
            <v-list-tile v-for="(value, key)  in formattedOwner" :key="key">
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
  name: 'OwnerCard',
  props: ['owner'],
  computed: {
    formattedOwner: function() {
      return {
        Name: this.owner.full_name,
        Company: this.owner.company,
        Profession: this.owner.profession,
      };
    },
  },
};
</script>

<style>
</style>
