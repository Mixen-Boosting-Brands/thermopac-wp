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

    // --- REPEATER-SAFE SWIPER INNER INITIALIZATION (MODIFIED) ---

    /**
     * Handles the client request to make the swiper static above a certain breakpoint.
     * - Disables all interaction (drag, nav, pagination) at 992px and up.
     * - Centers the 2nd slide (index 1) when static.
     * - Re-enables the swiper below 992px.
     * @param {Swiper} swiper The swiper instance.
     */
    function manageSwiperStateByBreakpoint(swiper) {
        const breakpoint = 992; // The pixel width to switch behavior

        if (window.innerWidth >= breakpoint) {
            // --- STATIC STATE (Large Screens) ---
            // If the swiper is currently enabled, disable it.
            if (swiper.enabled) {
                swiper.disable();
            }
            // Instantly move to the second slide (index is 0-based).
            // The second argument `0` means it happens instantly with no transition.
            swiper.slideTo(1, 0);
        } else {
            // --- INTERACTIVE STATE (Small Screens) ---
            // If the swiper is currently disabled, re-enable it.
            if (!swiper.enabled) {
                swiper.enable();
            }
        }
    }

    // Select ALL instances of the inner swiper
    const swiperInnerInstances = document.querySelectorAll(".swiper-inner");

    // Loop through each instance and initialize it separately
    swiperInnerInstances.forEach((swiperContainer) => {
        // Find the navigation buttons INSIDE the current swiper container
        const nextBtn = swiperContainer.querySelector(".swiper-button-next");
        const prevBtn = swiperContainer.querySelector(".swiper-button-prev");
        const paginationEl =
            swiperContainer.querySelector(".swiper-pagination");

        // There are only 3 slides, so we don't need a loop
        const loopValue = false;

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
            loop: loopValue,
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
                // This breakpoint now defines the look for when the swiper is ENABLED
                // between 992px and 1199px. Our custom function will disable it anyway.
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
                // Run checks on initialization
                init: function () {
                    updateNavigationButtons(this);
                    manageSwiperStateByBreakpoint(this);

                    // Only run slide update if centered and enabled
                    if (this.params.centeredSlides && this.enabled) {
                        updateCenteredSlide(this);
                    }
                },
                // Run checks on slide change
                slideChange: function () {
                    // Only run this logic if the swiper is enabled and centered
                    if (this.enabled && this.params.centeredSlides) {
                        updateCenteredSlide(this);
                    }
                },
                // Run checks on window resize
                resize: function () {
                    updateNavigationButtons(this);
                    manageSwiperStateByBreakpoint(this);

                    if (this.params.centeredSlides && this.enabled) {
                        updateCenteredSlide(this);
                    } else {
                        // Clean up active classes if not centered/enabled
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
