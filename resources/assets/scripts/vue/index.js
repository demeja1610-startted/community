import Vue from 'vue';
import plugins from './plugins'
import Example from "./components/Example";
import Example2 from "./components/Example2";
import store from './store'

export default function VueTemplates () {
    new Vue({
        el: '#app',
        ...plugins,
        store,
        components: {
            Example,
            Example2
        },
    });
}
