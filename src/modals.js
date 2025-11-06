// core version + navigation, pagination modules:
import Swiper from "swiper";
import {
    Navigation,
    Pagination,
    Autoplay, // Make sure Autoplay is imported
    Thumbs,
    EffectFade,
    Scrollbar,
    Mousewheel,
    Keyboard,
} from "swiper/modules";
// import Swiper and modules styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/scrollbar";

document.addEventListener("DOMContentLoaded", function () {
    const serviceModal = document.getElementById("serviceModal");
    let modalSwiper = null; // Variable to hold the Swiper instance

    if (serviceModal) {
        serviceModal.addEventListener("show.bs.modal", function (event) {
            // Button that triggered the modal
            const button = event.relatedTarget;
            if (!button) {
                console.error(
                    "Modal triggered without a relatedTarget button."
                );
                return;
            }

            // --- MODIFICATION IS HERE ---
            // Extract info from data-bs-* attributes
            const name = button.getAttribute("data-bs-name");
            const imagesJson = button.getAttribute("data-bs-images");
            // This is now the raw (but properly escaped) HTML from PHP.
            const description = button.getAttribute("data-bs-description");

            // Update the modal's content
            const modalTitle = serviceModal.querySelector("#serviceModalLabel");
            const modalDescription =
                serviceModal.querySelector("#modalDescription");
            const swiperWrapper = serviceModal.querySelector(
                ".modal-swiper .swiper-wrapper"
            );

            // Update title
            if (modalTitle) {
                modalTitle.textContent = name || "";
            }

            // Populate Swiper slider
            if (swiperWrapper && imagesJson) {
                // Clear any previous slides
                swiperWrapper.innerHTML = "";

                try {
                    const imageUrls = JSON.parse(imagesJson);
                    if (Array.isArray(imageUrls) && imageUrls.length > 0) {
                        imageUrls.forEach((url) => {
                            const slide = document.createElement("div");
                            slide.className = "swiper-slide";
                            slide.innerHTML = `<img src="${url}" class="img-fluid" alt="${name || "Service Image"}">`;
                            swiperWrapper.appendChild(slide);
                        });
                    } else {
                        swiperWrapper.innerHTML =
                            '<p class="text-center">No images available.</p>';
                    }
                } catch (e) {
                    console.error("Failed to parse images JSON:", e);
                    swiperWrapper.innerHTML =
                        '<p class="text-center">Error loading images.</p>';
                }
            }

            // Update description (with no decoding needed)
            if (modalDescription) {
                // We just set the innerHTML directly. No atob(), no try/catch.
                modalDescription.innerHTML = description || "";
            }
        });

        // Initialize Swiper AFTER the modal has finished showing.
        serviceModal.addEventListener("shown.bs.modal", function () {
            modalSwiper = new Swiper(".modal-swiper", {
                modules: [Navigation, Autoplay],
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                loop: true,
                navigation: {
                    nextEl: ".modal-swiper .swiper-button-next",
                    prevEl: ".modal-swiper .swiper-button-prev",
                },
            });
        });

        // Destroy Swiper instance when the modal is hidden
        serviceModal.addEventListener("hide.bs.modal", function () {
            if (modalSwiper) {
                modalSwiper.destroy(true, true);
                modalSwiper = null;
            }
        });
    }
});
