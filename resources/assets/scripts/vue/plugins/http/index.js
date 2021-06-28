import Vue from 'vue';

import axios from 'axios';
import VueAxios from 'vue-axios';

axios.defaults.withCredentials = true
let development = process.env.NODE_ENV !== 'production'

axios.defaults.baseURL = development ? 'http://localhost:3000' : process.env.MIX_APP_URL;

Vue.use(VueAxios, axios);

export default {
    root: process.env.MIX_APP_URL
};
