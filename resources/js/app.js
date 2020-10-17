require('./bootstrap');


window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-info-component', require('./components/UserInfoComponent.vue').default);
Vue.component('store-image-component', require('./components/StoreImageComponent.vue').default);


const app = new Vue({
  el: '#app',
});