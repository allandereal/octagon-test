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

        async fetchUser(state){
            try {
            const response = await axios.get(import.meta.env.VITE_API_URL + "profile");
            this.setUser(response.data.data);
          } catch {
            localStorage.removeItem("authToken");
          }
        },

        async loginUser(data) {
            this.setFormErrors({})
            return await axios.post(import.meta.env.VITE_API_URL + "login", data)
            .then((response) => {
              this.setUser(response.data.user);
              localStorage.setItem("authToken", response.data.token);
            });
        },

        async signupUser(data) {
          this.setFormErrors({});
          return await axios.post(import.meta.env.VITE_API_URL + "signup", data);
        },

        async logoutUser() {
          await axios.post(import.meta.env.VITE_API_URL + "logout");
          this.setUser(null);
          localStorage.removeItem("authToken");
        },
    }
  });