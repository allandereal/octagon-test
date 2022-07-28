import { defineStore } from "pinia"
import axios from "axios";

export const useAuthStore = defineStore('auth', {
    state: () => ({
        formErrors: [],
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

        setUser(state, user){
            state.user = user;
        },

        fetchUser(state){
            axios.get(process.env.API_URL + "user")
            .then(response => {
                this.setUser(response.data)
            })
            .catch(() => {
                localStorage.removeItem("authToken");
            });
        },

        loginUser(data) {
            setFormErrors({})
            return axios.post(process.env.API_URL + "login", data)
              .then(response => {
                setUser(response.data.user);
                localStorage.setItem("authToken", response.data.token);
              });
          },
          signupUser(data) {
            this.setFormErrors({});
            return axios.post(process.env.API_URL + "signup", data)
              .then(response => {
                setUser(response.data.user);
                localStorage.setItem("authToken", response.data.token);
              });
          },
          logoutUser() {
            axios.post(process.env.API_URL + "logout").then(() => {
              setUse(null);
              localStorage.removeItem("authToken");
            });
          },
    }
  });