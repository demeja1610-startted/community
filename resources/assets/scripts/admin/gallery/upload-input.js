import { fileUpload } from "../file-upload/init";
import {notify} from '../notify/init';

export const uploadInput = () => {
    let inputs = document.querySelectorAll('.a-gallery-image-upload');

    inputs.forEach(input => {
        input.addEventListener('change', () => {
            if(input.files.lenght !== 0) {
                const url = input.getAttribute('data-url');
                const files = fileUpload(url, input.files, 'images');
                const overlay = document.querySelector('.a-gallery__overlay');
                const wrapper = document.querySelector('.a-gallery__images');

                overlay.classList.add('active');

                files.then((res) => {
                    res = res.data;

                    res.data.images.forEach(image => {
                        wrapper.insertAdjacentHTML('afterbegin', image.view);
                    })

                    notify(res.message, 'success', 3000);

                    endUpload(input);
                }).catch((err) => {
                    notify(err.response.data.error, err.response.status === 200 ? 'success' : 'error', false);
                    endUpload(input);
                })
            }
        })
    });
}

function endUpload(input) {
    const overlay = document.querySelector('.a-gallery__overlay');
    let namesWrappper = input.closest('.custom-file').querySelector('.custom-file__names');

    overlay.classList.remove('active');
    namesWrappper.innerHTML = input.getAttribute('data-text');
}
