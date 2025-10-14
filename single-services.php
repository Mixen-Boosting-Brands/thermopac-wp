<?php get_header(); ?>

<section id="header-inner" class="pb-30">
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Slider main container -->
                <div class="swiper-header rounded">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slide -->
                        <div
                            class="swiper-slide"
                            style="
                                background: url('<?php echo esc_url(
                                    get_template_directory_uri(),
                                ); ?>/assets/images/slide-1.png')
                                    no-repeat;
                            "
                        >
                            <div class="overlay"></div>
                            <h1>Design</h1>
                        </div>
                    </div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-60 pb-30">
    <div class="container">
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h1
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="0"
                    >
                        Design <span>& engineering</span><br />
                        are the foundation of every succesfull packaging
                        solution
                    </h1>
                </div>
            </div>
            <div class="row mb-5">
                <!-- Slider main container -->
                <div
                    class="swiper-inner"
                    data-aos="fade-up"
                    data-aos-duration="1500"
                    data-aos-delay="100"
                >
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slide -->
                        <div class="swiper-slide">
                            <div class="card">
                                <img
                                    src="<?php echo esc_url(
                                        get_template_directory_uri(),
                                    ); ?>/assets/images/about-us/slider-1/slide-1.png"
                                    alt=""
                                    class="img-fluid"
                                    loading="lazy"
                                />
                            </div>
                        </div>

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <div class="card">
                                <img
                                    src="<?php echo esc_url(
                                        get_template_directory_uri(),
                                    ); ?>/assets/images/about-us/slider-1/slide-1.png"
                                    alt=""
                                    class="img-fluid"
                                    loading="lazy"
                                />
                            </div>
                        </div>

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <div class="card">
                                <img
                                    src="<?php echo esc_url(
                                        get_template_directory_uri(),
                                    ); ?>/assets/images/about-us/slider-1/slide-1.png"
                                    alt=""
                                    class="img-fluid"
                                    loading="lazy"
                                />
                            </div>
                        </div>

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <div class="card">
                                <img
                                    src="<?php echo esc_url(
                                        get_template_directory_uri(),
                                    ); ?>/assets/images/about-us/slider-1/slide-1.png"
                                    alt=""
                                    class="img-fluid"
                                    loading="lazy"
                                />
                            </div>
                        </div>

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <div class="card">
                                <img
                                    src="<?php echo esc_url(
                                        get_template_directory_uri(),
                                    ); ?>/assets/images/about-us/slider-1/slide-1.png"
                                    alt=""
                                    class="img-fluid"
                                    loading="lazy"
                                />
                            </div>
                        </div>

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <div class="card">
                                <img
                                    src="<?php echo esc_url(
                                        get_template_directory_uri(),
                                    ); ?>/assets/images/about-us/slider-1/slide-1.png"
                                    alt=""
                                    class="img-fluid"
                                    loading="lazy"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col text-center">
                    <h1
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="0"
                    >
                        From initial concept
                        <span class="no-underline"
                            >through to final production</span
                        >
                    </h1>
                    <p
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="100"
                    >
                        Using innovative design tools and advanced
                        manufacturing processes, our experienced
                        engineering team partners with you to develop a
                        fully integrated solution tailored to your exact
                        specifications.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section
    class="video py-30"
    data-aos="fade-up"
    data-aos-duration="1500"
    data-aos-delay="0"
>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center">
                <div class="container-video">
                    <p>Video</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
