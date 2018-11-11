<template>
      <v-container>
        <v-layout row wrap>
            <v-flex xs8 offset-xs2>
                <h1>Login</h1>
              <v-form @keyup.native.enter="login">
                <v-text-field
                    label="Email"
                    placeholder="Email"
                    v-model="email"
                    :value="email"
                ></v-text-field>

                <v-text-field
                    label="Password"
                    placeholder="Password"
                    type="password"
                    autocomplete="new-password"
                    v-model="password"
                    :value="password"
                ></v-text-field>

                <v-alert type="error" :value="loginError">
                    {{ loginErrorMessage }}
                </v-alert>

                <v-btn @click="login">
                    Login
                </v-btn>
              </v-form>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import HTTP from '../http';
import store from '../store';

export default {
  data() {
    return {
      email: '',
      password: '',
      loginError: false,
      loginErrorMessage:
        'Login failed.  Please check your credentials and try again',
    };
  },
  methods: {
    login() {
      this.loginError = false;
      HTTP()
        .post('/auth/login', {
          email: this.email,
          password: this.password,
        })
        .then(response => {
          store.commit('loginUser');
          localStorage.setItem('token', response.data.access_token);
          this.$router.push({ name: 'home' });
        })
        .catch(error => {
          console.log(error);
          this.loginError = true;
        });
    },
  },
};
</script>

<style>
</style>
