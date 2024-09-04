import './bootstrap';
import { tsParticles } from "tsparticles-engine";
import { loadLinksPreset } from "tsparticles-preset-links";



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
document.addEventListener('DOMContentLoaded', initParticles);

// Reinitialize particles when the page content changes (for SPA navigation)
document.addEventListener('livewire:navigated', initParticles);