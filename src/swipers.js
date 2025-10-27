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
    /**
     * Updates navigation buttons visibility based on whether the swiper is locked.
     * This function is now "safer" and checks if navigation elements exist before using them.
     * @param {Swiper} swiper The swiper instance.
     */
    function updateNavigationButtons(swiper) {
        // Check if navigation is configured and the elements exist before trying to access their style
        if (
            swiper.navigation &&
            swiper.navigation.nextEl &&
            swiper.navigation.prevEl
        ) {
            const { nextEl, prevEl } = swiper.navigation;

            if (swiper.isLocked) {
                nextEl.style.display = "none";
                prevEl.style.display = "none";
            } else {
                nextEl.style.display = "";
                prevEl.style.display = "";
            }
        }
    }

    // --- ROBUST SWIPER HEADER INITIALIZATION ---
    // This will now handle headers both with and without navigation buttons.
    document.querySelectorAll(".swiper-header").forEach((headerContainer) => {
        const nextBtn = headerContainer.querySelector(".swiper-button-next");
        const prevBtn = headerContainer.querySelector(".swiper-button-prev");

        // Base configuration
        const swiperHeaderConfig = {
            modules: [Navigation],
            watchOverflow: true,
            on: {
                init: updateNavigationButtons,
                resize: updateNavigationButtons,
            },
        };

        // Conditionally add the navigation object ONLY if the buttons are found in the HTML
        if (nextBtn && prevBtn) {
            swiperHeaderConfig.navigation = {
                nextEl: nextBtn,
                prevEl: prevBtn,
            };
        }

        new Swiper(headerContainer, swiperHeaderConfig);
    });

    // NOTE: The swiperServices initialization remains here in case it's used on other pages.
    const swiperServices = new Swiper(".swiper-services", {
        // configure Swiper to use modules
        modules: [
            Navigation,
            Pagination,
            Autoplay,
            Mousewheel,
            Keyboard,
            Scrollbar,
        ],
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        direction: "horizontal",
        allowTouchMove: true,
        spaceBetween: 0,
        loop: false,
        grabCursor: true,
        keyboard: {
            enabled: false,
        },
        mousewheel: false,
        slidesPerView: 1,
        watchOverflow: true,
        watchSlidesProgress: true,

        breakpoints: {
            576: {
                slidesPerView: 1,
                spaceBetween: 15,
                centeredSlides: false,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
                centeredSlides: false,
            },
            992: {
                slidesPerView: 2.5,
                spaceBetween: 20,
                centeredSlides: true,
            },
        },

        on: {
            init: function () {
                updateNavigationButtons(this);
                // Force update to ensure proper rendering
                setTimeout(() => {
                    this.updateSlides();
                    this.updateProgress();
                    this.updateSlidesClasses();
                }, 100);

                // Add active class logic for centered slides
                if (window.innerWidth >= 992) {
                    setTimeout(() => {
                        updateCenteredSlide(this);
                    }, 200);
                }
            },
            slideChangeTransitionEnd: function () {
                if (window.innerWidth >= 992) {
                    updateCenteredSlide(this);
                }
            },
            resize: function () {
                updateNavigationButtons(this);
                // Force update on resize
                setTimeout(() => {
                    this.updateSlides();
                    this.updateProgress();
                    this.updateSlidesClasses();
                }, 100);

                if (window.innerWidth >= 992) {
                    updateCenteredSlide(this);
                } else {
                    this.slides.forEach((slide) => {
                        slide.classList.remove("active");
                    });
                }
            },
        },

        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    // Function to handle centered slide logic
    function updateCenteredSlide(swiper) {
        swiper.slides.forEach((slide) => {
            slide.classList.remove("active");
        });

        // Find the currently active/centered slide
        const activeSlide = swiper.slides[swiper.activeIndex];
        if (activeSlide) {
            activeSlide.classList.add("active");
        }
    }

    // Function to handle centered slide logic
    function updateCenteredSlide(swiper) {
        swiper.slides.forEach((slide) => {
            slide.classList.remove("active");
        });
        const activeSlide = swiper.slides[swiper.activeIndex];
        if (activeSlide) {
            activeSlide.classList.add("active");
        }
    }

    // --- REPEATER-SAFE SWIPER INNER INITIALIZATION ---
    // Select ALL instances of the inner swiper
    const swiperInnerInstances = document.querySelectorAll(".swiper-inner");

    // Loop through each instance and initialize it separately
    swiperInnerInstances.forEach((swiperContainer) => {
        // Find the navigation buttons INSIDE the current swiper container
        const nextBtn = swiperContainer.querySelector(".swiper-button-next");
        const prevBtn = swiperContainer.querySelector(".swiper-button-prev");
        const paginationEl =
            swiperContainer.querySelector(".swiper-pagination");

        new Swiper(swiperContainer, {
            modules: [
                Navigation,
                Pagination,
                Autoplay,
                Mousewheel,
                Keyboard,
                Scrollbar,
            ],
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            direction: "horizontal",
            allowTouchMove: true,
            spaceBetween: 0,
            loop: false,
            grabCursor: true,
            keyboard: {
                enabled: false,
            },
            mousewheel: false,
            slidesPerView: 1,
            watchOverflow: true,

            breakpoints: {
                576: { slidesPerView: 1, spaceBetween: 15 },
                768: { slidesPerView: 2, spaceBetween: 20 },
                992: {
                    slidesPerView: 2.5,
                    spaceBetween: 30,
                    centeredSlides: true,
                },
                1200: {
                    slidesPerView: 2.5,
                    spaceBetween: 40,
                    centeredSlides: true,
                },
            },

            on: {
                init: function () {
                    updateNavigationButtons(this);
                    if (this.params.centeredSlides) {
                        updateCenteredSlide(this);
                    }
                },
                slideChange: function () {
                    if (this.params.centeredSlides) {
                        updateCenteredSlide(this);
                    }
                },
                resize: function () {
                    updateNavigationButtons(this);
                    if (this.params.centeredSlides) {
                        updateCenteredSlide(this);
                    } else {
                        this.slides.forEach((slide) => {
                            slide.classList.remove("active");
                        });
                    }
                },
            },

            // Use the specific button elements we found for THIS swiper instance
            navigation: {
                nextEl: nextBtn,
                prevEl: prevBtn,
            },

            pagination: {
                el: paginationEl,
            },
        });
    });
});
