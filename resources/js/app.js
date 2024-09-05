import "./bootstrap";
import { tsParticles } from "tsparticles-engine";
import { loadLinksPreset } from "tsparticles-preset-links";

import PhotoSwipeLightbox from "photoswipe/lightbox";
import "photoswipe/style.css";

function isPhonePortrait() {
    return window.matchMedia("(max-width: 600px) and (orientation: portrait)").matches;
}

function initPhotoSwipe() {
    const lightbox = new PhotoSwipeLightbox({
        gallery: "#gallery--dynamic-zoom-level",
        children: "a",
        showHideAnimationType: "zoom",
        showAnimationDuration: 500,
        hideAnimationDuration: 500,
        pswpModule: () => import("photoswipe"),
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

        pswpModule: () => import("photoswipe"),
    });

    lightbox.on('beforeOpen', async () => {
        const links = document.querySelectorAll('#gallery--dynamic-zoom-level a');
        for (const link of links) {
            if (!link.dataset.pswpWidth || !link.dataset.pswpHeight) {
                const publicId = link.getAttribute('data-public-id');
                if (publicId) {
                    try {
                        // Updated URL to match the new route
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

// Initialize PhotoSwipe after DOM content is loaded
document.addEventListener("DOMContentLoaded", initPhotoSwipe);

// Re-initialize PhotoSwipe after Livewire updates
document.addEventListener("livewire:load", () => {
    Livewire.hook("message.processed", (message, component) => {
        initPhotoSwipe();
    });
});

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

// Initialize particles on first load
document.addEventListener("DOMContentLoaded", initParticles);

// Reinitialize particles when the page content changes (for SPA navigation)
document.addEventListener("livewire:navigated", initParticles);
