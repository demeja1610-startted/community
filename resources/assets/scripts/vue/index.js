import Vue from 'vue';
import plugins from './plugins'

/* Components */
import Socket from "./components/Socket";
import LKSettings from "./components/LK/LKSettings";

/* Store */
import store from './store'

export default function VueTemplates() {
    // const app = document.getElementById('app');
    const settings = document.getElementById('lk-settings');
    // if (app) {
    //     new Vue({
    //         el: '#app',
    //         ...plugins,
    //         store,
    //         components: {
    //             Socket
    //         },
    //     });
    // }

    if (settings) {
        new Vue({
            el: '#lk-settings',
            ...plugins,
            store,
            components: {
                LKSettings
            },
        });
    }


}
