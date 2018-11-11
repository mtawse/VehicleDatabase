import Vue from 'vue';
import Router from 'vue-router';
import Auth from './mixins/Auth';
import store from './store';
import Home from './views/Home.vue';
import Vehicle from './views/Vehicle.vue';
import Vehicles from './views/Vehicles.vue';
import Login from './views/Login.vue';
import LogoutComponent from './components/LogoutComponent.vue';

Vue.use(Router);

const router = new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  mixins: [Auth],
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
      meta: { public: true },
    },
    {
      path: '/vehicles',
      name: 'vehicles',
      component: Vehicles,
    },
    {
      path: '/vehicles/:id',
      name: 'vehicle',
      component: Vehicle,
      props: true,
    },
    {
      path: '/login',
      name: 'login',
      component: Login,
      meta: { public: true },
    },
    {
      path: '/logout',
      name: 'logout',
      component: LogoutComponent,
    },
  ],
});

router.beforeEach((to, from, next) => {
  // check if the route requires authentication and user is not logged in
  if (to.matched.some(route => !route.meta.public) && !store.state.isLoggedIn) {
    // redirect to login page
    next({ name: 'login' });
    return;
  }

  // if logged in redirect to home
  if (to.path === '/login' && store.state.isLoggedIn) {
    next({ name: 'home' });
    return;
  }

  next();
});

export default router;
