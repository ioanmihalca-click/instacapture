import PhotoSwipeLightbox from 'photoswipe/lightbox';
import PhotoSwipe from 'photoswipe';

let lightboxInstances = {};

window.initPhotoSwipe = function() {
    const galleries = document.querySelectorAll('.pswp-gallery');
    galleries.forEach((gallery) => {
        if (lightboxInstances[gallery.id]) {
            lightboxInstances[gallery.id].destroy();
            delete lightboxInstances[gallery.id];
        }
        
        const lightbox = new PhotoSwipeLightbox({
            gallery: `#${gallery.id}`,
            children: 'a',
            pswpModule: PhotoSwipe
        });
        
        lightbox.init();
        lightboxInstances[gallery.id] = lightbox;
    });
};

// Initialize PhotoSwipe on page load
document.addEventListener('DOMContentLoaded', initPhotoSwipe);