import Vue from "vue";
import plugins from './plugins'
import Example from "./components/Example";
import store from './store'

export default function VueTemplates () {
    new Vue({
        el: '#example',
        ...plugins,
        store,
        components: {
            Example
        },
        render: h => h(Example)
    });
}
