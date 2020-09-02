window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

Vue.component('hello-world', require('./components/HelloWorld.vue').default);

const app = new Vue({
    el: '#app',
});
