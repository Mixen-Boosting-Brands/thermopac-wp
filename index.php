<?php get_header(); ?>

<section id="header-home" class="pb-30">
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Slider main container -->
                <div class="swiper-header rounded">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <?php if (have_rows("slider")): ?>
                            <?php while (have_rows("slider")):
                                the_row(); ?>
                                <div class="swiper-slide" style="background: url('<?php echo esc_url(
                                    get_sub_field("image"),
                                ); ?>') no-repeat;">
                                    <div class="overlay"></div>
                                    <h1><?php echo get_sub_field(
                                        "title",
                                    ); ?></h1>
                                </div>
                            <?php
                            endwhile; ?>
                        <?php endif; ?>
                    </div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="py-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-auto">
                <div>
                    <h1
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="0"
                    >
                        Your <span>trusted</span> Thermoforming
                    </h1>
                    <p
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="100"
                    >
                        We are an innovative company dedicated to
                        designing and manufacturing reliable and
                        cost-effective custom thermoformed packaging
                        solutions. Started operations in 2003 to supply
                        the thermoformed packaging needs of the maquila
                        industry.
                    </p>
                    <p
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="200"
                    >
                        Located in <strong>Juarez, Chihuahua</strong>,
                        neighboring city of El Paso, Texas.
                    </p>
                    <a
                        class="btn btn-primary btn-lg rounded-pill"
                        href="#"
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="300"
                        >Learn more</a
                    >
                </div>
            </div>
            <div class="col-lg-6 my-auto text-center">
                <figure>
                    <img
                        class="img-fluid mt-3 mt-lg-0"
                        src="<?php echo esc_url(
                            get_template_directory_uri(),
                        ); ?>/assets/images/20-years.png"
                        alt="20 years of experience"
                        data-aos="zoom-in"
                        data-aos-duration="1500"
                        data-aos-delay="400"
                    />
                </figure>
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="row">
            <div
                class="col container-inner container-services rounded py-60"
            >
                <div class="row mb-4">
                    <div
                        class="col-10 offset-1 col-md-9 offset-md-1 col-lg-6 offset-lg-2"
                    >
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h1
                                    data-aos="fade-up"
                                    data-aos-duration="1500"
                                    data-aos-delay="0"
                                >
                                    Our Services
                                </h1>
                            </div>
                            <div class="col-12 col-md-6">
                                <p
                                    data-aos="fade-up"
                                    data-aos-duration="1500"
                                    data-aos-delay="100"
                                >
                                    Lorem ipsum dolor, sit amet
                                    consectetur adipisicing elit.
                                    Officiis aliquid sequi consequuntur
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <!-- Slider main container -->
                        <div
                            class="swiper-services rounded"
                            data-aos="fade-up"
                            data-aos-duration="1500"
                            data-aos-delay="200"
                        >
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slide -->
                                <div
                                    class="swiper-slide rounded"
                                    style="
                                        background: url(&quot;<?php echo esc_url(
                                            get_template_directory_uri(),
                                        ); ?>/assets/images/slide-1.png&quot;)
                                            no-repeat;
                                    "
                                >
                                    <a href="#"></a>
                                    <div class="overlay"></div>
                                    <div class="caption">
                                        <h1>
                                            Complete<br />Thermoforming
                                            Solutions
                                        </h1>
                                        <p>
                                            Protecting and adding value
                                        </p>
                                    </div>
                                </div>

                                <!-- Slide -->
                                <div
                                    class="swiper-slide rounded"
                                    style="
                                        background: url(&quot;<?php echo esc_url(
                                            get_template_directory_uri(),
                                        ); ?>/assets/images/slide-1.png&quot;)
                                            no-repeat;
                                    "
                                >
                                    <a href="#"></a>
                                    <div class="overlay"></div>
                                    <div class="caption">
                                        <h1>
                                            Complete<br />Thermoforming
                                            Solutions
                                        </h1>
                                        <p>
                                            Protecting and adding value
                                        </p>
                                    </div>
                                </div>

                                <!-- Slide -->
                                <div
                                    class="swiper-slide rounded"
                                    style="
                                        background: url(&quot;<?php echo esc_url(
                                            get_template_directory_uri(),
                                        ); ?>/assets/images/slide-1.png&quot;)
                                            no-repeat;
                                    "
                                >
                                    <a href="#"></a>
                                    <div class="overlay"></div>
                                    <div class="caption">
                                        <h1>
                                            Complete<br />Thermoforming
                                            Solutions
                                        </h1>
                                        <p>
                                            Protecting and adding value
                                        </p>
                                    </div>
                                </div>

                                <!-- Slide -->
                                <div
                                    class="swiper-slide rounded"
                                    style="
                                        background: url(&quot;<?php echo esc_url(
                                            get_template_directory_uri(),
                                        ); ?>/assets/images/slide-1.png&quot;)
                                            no-repeat;
                                    "
                                >
                                    <a href="#"></a>
                                    <div class="overlay"></div>
                                    <div class="caption">
                                        <h1>
                                            Complete<br />Thermoforming
                                            Solutions
                                        </h1>
                                        <p>
                                            Protecting and adding value
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <a
                            class="btn btn-lg rounded-pill"
                            href="#"
                            data-aos="fade-up"
                            data-aos-duration="1500"
                            data-aos-delay="400"
                        >
                            Contact Us
                            <i class="fa-regular fa-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="cards pt-30 pb-60">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h1
                    data-aos="fade-up"
                    data-aos-duration="1500"
                    data-aos-delay="0"
                >
                    Our <span>Markets</span>
                </h1>
                <p
                    data-aos="fade-up"
                    data-aos-duration="1500"
                    data-aos-delay="100"
                >
                    Click on the service that you'd like to know about.
                </p>
            </div>
        </div>
        <div class="row">
            <div
                class="col-lg-3 mb-4 mb-lg-0 text-center"
                data-aos="fade-up"
                data-aos-duration="1500"
                data-aos-delay="100"
            >
                <div class="card">
                    <a href="#">
                        <img
                            src="<?php echo esc_url(
                                get_template_directory_uri(),
                            ); ?>/assets/images/medical-icon@2x.png"
                            class="card-img-top mb-3"
                            alt="Medical"
                        />
                    </a>
                    <div class="card-body">
                        <a href="#">
                            <h4 class="card-title mb-3">Medical</h4>
                        </a>
                        <p class="card-text my-4">
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Beatae commodi sed totam
                            quo ipsum rerum, illo esse illum excepturi
                            fugiat omnis nihil enim velit natus
                            architecto tempora fuga perspiciatis.
                            Facere.
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="col-lg-3 mb-4 mb-lg-0 text-center"
                data-aos="fade-up"
                data-aos-duration="1500"
                data-aos-delay="200"
            >
                <div class="card">
                    <a href="#">
                        <img
                            src="<?php echo esc_url(
                                get_template_directory_uri(),
                            ); ?>/assets/images/automotive-icon@2x.png"
                            class="card-img-top mb-3"
                            alt="Automotive"
                        />
                    </a>
                    <div class="card-body">
                        <a href="#">
                            <h4 class="card-title mb-3">Automotive</h4>
                        </a>
                        <p class="card-text my-4">
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Beatae commodi sed totam
                            quo ipsum rerum, illo esse illum excepturi
                            fugiat omnis nihil enim velit natus
                            architecto tempora fuga perspiciatis.
                            Facere.
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="col-lg-3 mb-4 mb-lg-0 text-center"
                data-aos="fade-up"
                data-aos-duration="1500"
                data-aos-delay="300"
            >
                <div class="card">
                    <a href="#">
                        <img
                            src="<?php echo esc_url(
                                get_template_directory_uri(),
                            ); ?>/assets/images/retail-icon@2x.png"
                            class="card-img-top mb-3"
                            alt="Retail"
                        />
                    </a>
                    <div class="card-body">
                        <a href="#">
                            <h4 class="card-title mb-3">Retail</h4>
                        </a>
                        <p class="card-text my-4">
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Beatae commodi sed totam
                            quo ipsum rerum, illo esse illum excepturi
                            fugiat omnis nihil enim velit natus
                            architecto tempora fuga perspiciatis.
                            Facere.
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="col-lg-3 mb-4 mb-lg-0 text-center"
                data-aos="fade-up"
                data-aos-duration="1500"
                data-aos-delay="400"
            >
                <div class="card">
                    <a href="#">
                        <img
                            src="<?php echo esc_url(
                                get_template_directory_uri(),
                            ); ?>/assets/images/electronics-icon@2x.png"
                            class="card-img-top mb-3"
                            alt="Electronics"
                        />
                    </a>
                    <div class="card-body">
                        <a href="#">
                            <h4 class="card-title mb-3">Electronics</h4>
                        </a>
                        <p class="card-text my-4">
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Beatae commodi sed totam
                            quo ipsum rerum, illo esse illum excepturi
                            fugiat omnis nihil enim velit natus
                            architecto tempora fuga perspiciatis.
                            Facere.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="posts">
    <div class="container">
        <div class="row">
            <div
                class="col container-inner container-services rounded"
                style="padding-top: 60px; padding-bottom: 60px"
            >
                <div class="row mb-4">
                    <div class="col text-center">
                        <h1
                            data-aos="fade-up"
                            data-aos-duration="1500"
                            data-aos-delay="0"
                        >
                            News <span>and Events</span>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div
                        class="col-lg-4 mb-4"
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="100"
                    >
                        <div class="card">
                            <a class="card-img-top-link" href="#">
                                <span
                                    class="badge rounded-pill text-bg-light"
                                    >Corporate</span
                                >
                                <img
                                    src="<?php echo esc_url(
                                        get_template_directory_uri(),
                                    ); ?>/assets/images/thumb-news.png"
                                    class="card-img-top"
                                    alt="Build up healthy habits and
                                    strong peaceful life"
                                />
                            </a>
                            <div class="card-body">
                                <a href="#">
                                    <h5 class="card-title">
                                        Build up healthy habits and
                                        strong peaceful life
                                    </h5>
                                </a>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit.
                                    Provident est debitis explicabo
                                    amet, perferendis temporibus
                                    repudiandae ipsum dolore maiores
                                    veritatis delectus exercitationem
                                    recusandae! Quibusdam totam officia
                                    consequatur accusamus eligendi
                                    maiores! Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit. Lorem
                                    ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                </p>
                            </div>
                            <div class="card-footer">
                                <time>Oct 1st, 2025</time>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-4 mb-4"
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="200"
                    >
                        <div class="card">
                            <a class="card-img-top-link" href="#">
                                <span
                                    class="badge rounded-pill text-bg-light"
                                    >Corporate</span
                                >
                                <img
                                    src="<?php echo esc_url(
                                        get_template_directory_uri(),
                                    ); ?>/assets/images/thumb-news.png"
                                    class="card-img-top"
                                    alt="Build up healthy habits and
                                    strong peaceful life"
                                />
                            </a>
                            <div class="card-body">
                                <a href="#">
                                    <h5 class="card-title">
                                        Build up healthy habits and
                                        strong peaceful life
                                    </h5>
                                </a>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit.
                                    Provident est debitis explicabo
                                    amet, perferendis temporibus
                                    repudiandae ipsum dolore maiores
                                    veritatis delectus exercitationem
                                    recusandae! Quibusdam totam officia
                                    consequatur accusamus eligendi
                                    maiores!
                                </p>
                            </div>
                            <div class="card-footer">
                                <time>Oct 1st, 2025</time>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-4 mb-4"
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="300"
                    >
                        <div class="card">
                            <a class="card-img-top-link" href="#">
                                <span
                                    class="badge rounded-pill text-bg-light"
                                    >Corporate</span
                                >
                                <img
                                    src="<?php echo esc_url(
                                        get_template_directory_uri(),
                                    ); ?>/assets/images/thumb-news.png"
                                    class="card-img-top"
                                    alt="Build up healthy habits and
                                    strong peaceful life"
                                />
                            </a>
                            <div class="card-body">
                                <a href="#">
                                    <h5 class="card-title">
                                        Build up healthy habits and
                                        strong peaceful life
                                    </h5>
                                </a>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit.
                                    Provident est debitis explicabo
                                    amet, perferendis temporibus
                                    repudiandae ipsum dolore maiores
                                    veritatis delectus exercitationem
                                    recusandae! Quibusdam totam officia
                                    consequatur accusamus eligendi
                                    maiores! Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit.
                                </p>
                            </div>
                            <div class="card-footer">
                                <time>Oct 1st, 2025</time>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
