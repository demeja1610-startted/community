import {editor} from './editor/init';
import {deleteConfirmModal} from './delete-confirm-modal//init';

window.addEventListener('DOMContentLoaded', () => {
    editor();
    deleteConfirmModal();
})
