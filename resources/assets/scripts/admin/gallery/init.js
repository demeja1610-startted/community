import lightgallery from 'lightgallery.js';

export function gallery() {
    let galleries = document.querySelectorAll('.gallery');

    galleries.forEach(gallery => {
        lightGallery(gallery, {
            selector: '.gallery-item',
            speed: 500,
        });
    })
}
