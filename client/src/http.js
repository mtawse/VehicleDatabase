import axios from 'axios';
import store from './store';

export default () =>
  axios.create({
    baseURL: store.state.baseUrl,
    timeout: 1000,
    headers: {
      Authorization: `Bearer ${localStorage.getItem('token')}`,
    },
  });
