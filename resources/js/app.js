require('./bootstrap');


window.Vue = require('vue');

window.events = new Vue();
window.flash = function(message) {
  window.events.$emit("flash", message);
};


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-info-component', require('./components/UserInfoComponent.vue').default);
Vue.component('store-image-component', require('./components/StoreImageComponent.vue').default);
Vue.component('manage-users-index-component', require('./components/ManageUsersIndexComponent.vue').default);
Vue.component('manage-users-edit-component', require('./components/ManageUsersEditComponent.vue').default);
Vue.component("flash", require("./components/Flash.vue").default);

const app = new Vue({
  el: '#app',
});