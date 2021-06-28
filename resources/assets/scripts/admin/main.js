import {editor} from './editor/init';
import {deleteConfirmModal} from './delete-confirm-modal//init';
import {select2} from './select2/init'

window.addEventListener('DOMContentLoaded', () => {
    editor();
    deleteConfirmModal();
    select2();
})
