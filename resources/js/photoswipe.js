import PhotoSwipeLightbox from 'photoswipe/dist/photoswipe-lightbox.esm.js';
import PhotoSwipe from 'photoswipe/dist/photoswipe.esm.js';

window.photoswipe = function() {
    return {
        lightboxInstances: {},
        init() {
            this.initPhotoSwipe();
            this.setupLivewireListeners();
        },
        initPhotoSwipe() {
            const galleries = document.querySelectorAll('.pswp-gallery');
            galleries.forEach((gallery, index) => {
                if (this.lightboxInstances[gallery.id]) {
                    this.lightboxInstances[gallery.id].destroy();
                }
                const lightbox = new PhotoSwipeLightbox({
                    gallery: `#${gallery.id}`,
                    children: 'a',
                    pswpModule: PhotoSwipe
                });
                lightbox.init();
                this.lightboxInstances[gallery.id] = lightbox;
            });
        },
        setupLivewireListeners() {
            Livewire.hook('message.processed', (message, component) => {
                this.initPhotoSwipe();
            });
        }
    };
};