import { tsParticles } from "tsparticles-engine";
import { loadLinksPreset } from "tsparticles-preset-links";

import 'photoswipe/style.css';

let photoswipeLoaded = false;
let lightbox = null;

async function loadPhotoSwipe() {
    if (photoswipeLoaded) return;

    const PhotoSwipeLightbox = (await import('photoswipe/lightbox')).default;
    const PhotoSwipe = (await import('photoswipe')).default;

    photoswipeLoaded = true;
    initPhotoSwipe(PhotoSwipeLightbox, PhotoSwipe);
}

function initPhotoSwipe(PhotoSwipeLightbox, PhotoSwipe) {
    if (lightbox) {
        lightbox.destroy();
        lightbox = null;
    }

    lightbox = new PhotoSwipeLightbox({
        gallery: "#gallery--dynamic-zoom-level",
        children: "a",
        pswpModule: PhotoSwipe,
        showHideAnimationType: "zoom",
        showAnimationDuration: 500,
        hideAnimationDuration: 500,

       initialZoomLevel: (zoomLevelObject) => {
    if (isPhonePortrait()) {
      return zoomLevelObject.vFill;
    } else {
      return zoomLevelObject.fit;
    }
  },
  secondaryZoomLevel: (zoomLevelObject) => {
    if (isPhonePortrait()) {
      return zoomLevelObject.fit;
    } else {
      return 1;
    }
  },

  maxZoomLevel: 1,
  arrowKeys: true,
  arrowPrev: true,
  arrowNext: true,
    });

    lightbox.on('beforeOpen', async () => {
        const links = document.querySelectorAll('#gallery--dynamic-zoom-level a');
        for (const link of links) {
            if (!link.dataset.pswpWidth || !link.dataset.pswpHeight) {
                const publicId = link.getAttribute('data-public-id');
                if (publicId) {
                    try {
                        const response = await fetch(`/image-info/${publicId}`);
                        const imageInfo = await response.json();
                        link.dataset.pswpWidth = imageInfo.width;
                        link.dataset.pswpHeight = imageInfo.height;
                    } catch (error) {
                        console.error('Error fetching image info:', error);
                    }
                }
            }
        }
    });

    lightbox.init();
}

function isPhonePortrait() {
    return window.matchMedia("(max-width: 600px) and (orientation: portrait)").matches;
}

const initParticles = async () => {
    await loadLinksPreset(tsParticles);

    await tsParticles.load("tsparticles", {
        preset: "links",
        background: {
            color: {
                value: "transparent",
            },
        },
        particles: {
            number: {
                value: 35,
                density: {
                    enable: true,
                    value_area: 800,
                },
            },
            color: {
                value: "#ffffff",
            },
            opacity: {
                value: 0.1,
            },
            links: {
                enable: true,
                distance: 150,
                color: "#ffffff",
                opacity: 0.5,
                width: 1,
            },
            move: {
                enable: true,
                speed: 1,
            },
            size: {
                value: { min: 1, max: 3 },
            },
        },
        interactivity: {
            events: {
                onhover: {
                    enable: true,
                    mode: "repulse",
                },
                onclick: {
                    enable: true,
                    mode: "push",
                },
            },
            modes: {
                repulse: {
                    distance: 100,
                    duration: 0.4,
                },
                push: {
                    particles_nb: 4,
                },
            },
        },
    });
};


// Function to check and initialize PhotoSwipe with retry mechanism
function checkAndInitPhotoSwipe(retries = 5) {
    console.log(`Checking for PhotoSwipe initialization. Retries left: ${retries}`);
    if (window.location.pathname.includes('portofoliu')) {
        if (document.querySelector("#gallery--dynamic-zoom-level")) {
            console.log('Gallery found. Initializing PhotoSwipe.');
            loadPhotoSwipe();
        } else if (retries > 0) {
            console.log('Gallery not found. Retrying...');
            setTimeout(() => checkAndInitPhotoSwipe(retries - 1), 200);
        } else {
            console.log('Gallery not found after all retries. PhotoSwipe initialization failed.');
        }
    } else {
        console.log('Not on portfolio page. Skipping PhotoSwipe initialization.');
    }
}

// Initialize everything on Livewire navigation
document.addEventListener('livewire:navigated', () => { 
    console.log('livewire:navigated event fired');
    initParticles();
    checkAndInitPhotoSwipe();
});

// Lazy load PhotoSwipe when needed
document.addEventListener("click", (event) => {
    if (event.target.closest("#gallery--dynamic-zoom-level")) {
        loadPhotoSwipe();
    }
});

// Handle Livewire updates
document.addEventListener("livewire:load", () => {
    Livewire.on('itemsLoaded', () => {
        console.log('itemsLoaded event fired');
        checkAndInitPhotoSwipe();
    });
    Livewire.on('portfolioLoaded', () => {
        console.log('portfolioLoaded event fired');
        checkAndInitPhotoSwipe();
    });
});

// Handle Livewire page updates
Livewire.hook("message.processed", (message, component) => {
    console.log('Livewire message processed');
    checkAndInitPhotoSwipe();
});

// Expose loadPhotoSwipe to window for manual triggering if needed
window.loadPhotoSwipe = loadPhotoSwipe;

// Optional: Add a manual trigger for debugging
window.manuallyInitPhotoSwipe = () => {
    console.log('Manually triggering PhotoSwipe initialization');
    checkAndInitPhotoSwipe();
};