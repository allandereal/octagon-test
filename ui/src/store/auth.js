import { defineStore } from "pinia"
import axios from "axios";

export const useAuthStore = defineStore('auth', {
    state: () => ({
        formErrors: {},
        user: null,
    }),
    getters: {
        getFormErrors: (state) => state.formErrors,
        getUser: (state) => state.user
    },
    actions: {
        setFormErrors(errors) {
            this.formErrors = errors;
        },

        setUser(user){
            this.user = user;
        },

        async fetchUser(){
            return await axios.post(import.meta.env.VITE_API_URL + "profile", {token: localStorage.getItem("authToken")})
            .then((response) => {
              this.setUser(response.data.data);
            });
        },
 
        async loginUser(data) {
            this.setFormErrors({})
            return await axios.post(import.meta.env.VITE_API_URL + "login", data)
            .then((response) => {
              this.setUser(response.data.user);
              localStorage.setItem("authToken", response.data.token);
              localStorage.setItem("accessToken", response.data.access_token);
            }).catch((error) => {
              console.log(error)
            })
        },

        async signupUser(data) {
          this.setFormErrors({});
          return await axios.post(import.meta.env.VITE_API_URL + "signup", data)
          .catch((error) => {
            console.log(error)
          })
        },

        async logoutUser() {
          await axios.post(import.meta.env.VITE_API_URL + "logout", {token: localStorage.getItem("authToken")});

          this.setUser(null);
          localStorage.removeItem("authToken");
          localStorage.removeItem("accessToken");
        },
    }
  });