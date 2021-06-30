import {editor} from './editor/init';
import {confirmModal} from './confirm-modal//init';
import {select2} from './select2/init'

window.addEventListener('DOMContentLoaded', () => {
    editor();
    confirmModal();
    select2();
})
