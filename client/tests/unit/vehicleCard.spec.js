import Vuetify from 'vuetify';
import Vue from 'vue';
import { expect } from 'chai';
import { mount } from '@vue/test-utils';
import VehicleCard from '@/components/VehicleCard.vue';

Vue.use(Vuetify);

describe('VehicleCard', () => {
  it('renders vehicle, manufaturer and model details when they are passed as props', () => {
    const vehicle = {
      license_plate: 'AB12 TF5',
    };
    const manufacturer = {
      name: 'Audi',
    };
    const model = {
      name: 'Series 1',
    };
    const wrapper = mount(VehicleCard, {
      propsData: { vehicle, manufacturer, model },
    });
    expect(wrapper.text()).to.include(manufacturer.name);
    expect(wrapper.text()).to.include(model.name);
    expect(wrapper.text()).to.include(vehicle.license_plate);
  });
});
