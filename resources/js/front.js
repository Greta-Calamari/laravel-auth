//  require('./bootstrap');

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

// import Vue from 'vue'
import VueAgile from 'vue-agile'
Vue.use(VueAgile)


import App from './views/App';
import router from './router.js';

 const app = new Vue({
	el: '#root',
	render: h => h(App), // renderizziamo App all'avvio di Vue
	router,
});
