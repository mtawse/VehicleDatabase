<template>
  <v-layout row>
    <v-flex sm12>
      <v-card>
        <v-card-title primary-title>
            <h3>Owner Details</h3>
        </v-card-title>
        <v-card-text>
          <v-list>
            <template v-for="(item, index) in formattedOwner">
              <v-list-tile :key="index">
                <v-list-tile-content>
                  <v-list-tile-title>{{ item.label }}</v-list-tile-title>
                </v-list-tile-content>
                <v-list-tile-content class="font-weight-medium align-end">
                    {{ item.value }}
                </v-list-tile-content>
              </v-list-tile>
              <v-divider
                v-if="index + 1 < formattedOwner.length"
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
  name: 'OwnerCard',
  props: ['owner'],
  data() {
    return {
      items: [],
    };
  },
  computed: {
    formattedOwner: function() {
      return [
        {
          label: 'Name',
          value: this.owner.full_name,
        },
        {
          label: 'Compnay',
          value: this.owner.company,
        },
        {
          label: 'Profession',
          value: this.owner.profession,
        },
      ];
    },
  },
};
</script>

<style>
</style>
