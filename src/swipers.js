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
     * @param {Swiper} swiper The swiper instance.
     */
    function updateNavigationButtons(swiper) {
        if (swiper.navigation) {
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

    // init Swiper:
    const swiperHeader = new Swiper(".swiper-header", {
        // configure Swiper to use modules
        // modules: [Navigation],
        watchOverflow: true,

        // Navigation arrows
        /*
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        on: {
            init: updateNavigationButtons,
            resize: updateNavigationButtons,
        },
        */
    });

    // init Swiper:
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

    // init Swiper:
    const swiperInner = new Swiper(".swiper-inner", {
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
        loop: true,
        grabCursor: true,
        keyboard: {
            enabled: false,
        },
        mousewheel: false,
        slidesPerView: 1,
        watchOverflow: true,

        breakpoints: {
            576: {
                slidesPerView: 1,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
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
                if (this.params.slidesPerView === 3) {
                    const centerIndex = this.activeIndex + 1;
                    this.slides[centerIndex].classList.add("active");
                }
            },
            slideChange: function () {
                if (this.params.slidesPerView === 3) {
                    this.slides.forEach((slide) => {
                        slide.classList.remove("active");
                    });
                    const centerIndex = this.activeIndex + 1;
                    this.slides[centerIndex].classList.add("active");
                }
            },
            resize: function () {
                updateNavigationButtons(this);
                if (this.params.slidesPerView === 3) {
                    const centerIndex = this.activeIndex + 1;
                    this.slides.forEach((slide) => {
                        slide.classList.remove("active");
                    });
                    this.slides[centerIndex].classList.add("active");
                } else {
                    this.slides.forEach((slide) => {
                        slide.classList.remove("active");
                    });
                }
            },
        },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        pagination: {
            el: ".swiper-pagination",
        },
    });
});
