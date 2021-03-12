window.onload=(function(){
    require("./bootstrap");
    window.Vue = require('vue');
    Vue.component('orla-component', require('./components/orla.vue').default);

    const orla = new Vue({
        el: '#orla',
        methods: {
            
        }
    });
});