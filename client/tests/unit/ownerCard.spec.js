import Vuetify from 'vuetify';
import Vue from 'vue';
import { expect } from 'chai';
import { mount } from '@vue/test-utils';
import OwnerCard from '@/components/OwnerCard.vue';

Vue.use(Vuetify);

describe('OwnerCard', () => {
  it('renders owner full name when owner is passed as a prop', () => {
    const owner = {
      full_name: 'Martin Tawse',
    };
    const wrapper = mount(OwnerCard, {
      propsData: { owner },
    });
    expect(wrapper.text()).to.include(owner.full_name);
  });
});
