import Vuetify from 'vuetify';
import Vue from 'vue';
import { expect } from 'chai';
import { mount } from '@vue/test-utils';
import ManufacturersTable from '@/components/ManufacturersTable.vue';

Vue.use(Vuetify);

describe('ManufacturersTable', () => {
  it('renders all manufactuers passed in as a prop', () => {
    const manufacturers = [{ name: 'Volvo' }, { name: 'Audi' }, { name: 'BMW' }];
    const wrapper = mount(ManufacturersTable, {
      stubs: ['router-link', 'router-view'],
      propsData: { manufacturers },
    });
    manufacturers.forEach(manufacturer => {
      expect(wrapper.text()).to.include(manufacturer.name);
    });
  });
});
