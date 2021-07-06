import lightgallery from 'lightgallery.js';

export function lightbox() {
    let galleries = document.querySelectorAll('.gallery');

    galleries.forEach(gallery => {
        lightGallery(gallery, {
            selector: '.gallery-item',
            speed: 500,
        });
    })
}
