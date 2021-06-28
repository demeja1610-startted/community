import ClassicEditor from '@ckeditor/ckeditor5-build-classic/build/ckeditor';
import '@ckeditor/ckeditor5-build-classic/build/translations/ru';

export function editor() {
    let editors = document.querySelectorAll('.editor');

    if(editors.length) {
        editors.forEach(editor => {
            ClassicEditor
                .create(editor, {
                    language: 'ru',
                })
                .catch(e => {
                    console.error(e);
                });
        })
    }
}
