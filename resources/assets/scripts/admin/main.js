import {editor} from './editor/init';
import {confirmModal} from './confirm-modal//init';
import {select2} from './select2/init'
import {gallery} from './gallery/init'
import {inputFile} from './input-file/init'

window.addEventListener('DOMContentLoaded', () => {
    editor();
    confirmModal();
    select2();
    inputFile();
    gallery();
})
