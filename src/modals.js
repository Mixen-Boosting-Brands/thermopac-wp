// core version + navigation, pagination modules:
import Swiper from "swiper";
import {
    Navigation,
    Pagination,
    Autoplay,
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

            // --- MODIFICATION START ---
            // Extract info from data-bs-* attributes
            const name = button.getAttribute("data-bs-name");
            // Get the JSON string of image URLs
            const imagesJson = button.getAttribute("data-bs-images");
            const encodedDescription = button.getAttribute(
                "data-bs-description"
            );

            // Update the modal's content
            const modalTitle = serviceModal.querySelector("#serviceModalLabel");
            const modalDescription =
                serviceModal.querySelector("#modalDescription");
            const swiperWrapper = serviceModal.querySelector(
                ".modal-swiper .swiper-wrapper"
            );
            // --- MODIFICATION END ---

            // Update title
            if (modalTitle) {
                modalTitle.textContent = name || "";
            }

            // --- MODIFICATION START: Populate Swiper slider ---
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
                        // Handle case with no images or single image passed incorrectly
                        swiperWrapper.innerHTML =
                            '<p class="text-center">No images available.</p>';
                    }
                } catch (e) {
                    console.error("Failed to parse images JSON:", e);
                    swiperWrapper.innerHTML =
                        '<p class="text-center">Error loading images.</p>';
                }
            }
            // --- MODIFICATION END ---

            // Update description (with safety check)
            if (modalDescription) {
                let description = "";
                // Only decode if the description string is not empty
                if (encodedDescription) {
                    try {
                        description = atob(encodedDescription);
                    } catch (e) {
                        console.error(
                            "Failed to decode base64 description:",
                            e
                        );
                        description =
                            "There was an error displaying this content.";
                    }
                }
                modalDescription.innerHTML = description;
            }
        });

        // Initialize Swiper AFTER the modal has finished showing.
        // This ensures Swiper can correctly calculate its dimensions.
        serviceModal.addEventListener("shown.bs.modal", function () {
            modalSwiper = new Swiper(".modal-swiper", {
                // Optional parameters
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        });

        // Destroy Swiper instance when the modal is hidden
        // This is crucial to prevent issues when reopening the modal
        serviceModal.addEventListener("hide.bs.modal", function () {
            if (modalSwiper) {
                modalSwiper.destroy(true, true);
                modalSwiper = null;
            }
        });
    }
});
