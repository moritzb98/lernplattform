import Vue from 'vue';
const state = {
  user: null,
  isAuthenticated: false
};

const getters = {
  isAuthenticated(state){
      return state.isAuthenticated;
  },
  currentUser(state){
      return state.user;
  }
};

   login({commit, dispatch}, credentials) {
     axios.get('/sanctum/csrf-cookie');
    const {data} =  axios.post("/login", credentials);
    commit('setAuth', data);
  },

   checkAuth({commit}) {
      const {data} =  axios.get('/api/user');
      commit('setAuth', data);
  }


const mutations = {
  setAuth(state, payload) {
    state.user = payload.user;
    state.isAuthenticated = Boolean(payload.user);
  }
};
