import VueTemplates from "./vue";
import header from "./components/header/init";
import authModal from "./components/auth-modal/init";
import './utils'
import customSelect from './additions/select';
import 'choices.js/public/assets/scripts/choices.min';


window.addEventListener('DOMContentLoaded', () => {
    VueTemplates();
    header();
    authModal();
    customSelect();
});
