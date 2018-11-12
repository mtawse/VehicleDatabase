import Vuetify from 'vuetify';
import Vue from 'vue';
import { expect } from 'chai';
import { mount } from '@vue/test-utils';
import VehiclesTable from '@/components/VehiclesTable.vue';

Vue.use(Vuetify);

describe('VehiclesTable', () => {
  it('renders all vehicles passed in as a prop', () => {
    const vehicles = [
      { license_plate: 'ABC 123', manufacturer: { name: 'Acme' }, model: { name: 'Series 1' } },
      { license_plate: 'DEF 456', manufacturer: { name: 'Acme' }, model: { name: 'Series 1' } },
      { license_plate: 'GHI 789', manufacturer: { name: 'Acme' }, model: { name: 'Series 1' } },
    ];
    const wrapper = mount(VehiclesTable, {
      stubs: ['router-link', 'router-view'],
      propsData: { vehicles },
    });
    vehicles.forEach(vehicle => {
      expect(wrapper.text()).to.include(vehicle.license_plate);
      expect(wrapper.text()).to.include(vehicle.manufacturer.name);
      expect(wrapper.text()).to.include(vehicle.model.name);
    });
  });
});
