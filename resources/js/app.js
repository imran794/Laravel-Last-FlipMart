

require('./bootstrap');

window.Vue = require('vue').default;



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('send-message', require('./components/SendMessage.vue').default);


const app = new Vue({
    el: '#app',
});
