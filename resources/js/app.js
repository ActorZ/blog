

require('./bootstrap');

window.Vue = require('vue');
import Buefy from 'buefy';

Vue.use(Buefy);

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

//Vue.component('example-component', require('./components/ExampleComponent.vue'));


