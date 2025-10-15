<?php
/*
Template Name: Home
*/
get_header(); ?>

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
                                    <h1><?php the_sub_field("title"); ?></h1>
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
                    <?php
                    $about_us_headline = get_field("about_us_headline");
                    if ($about_us_headline): ?>
                    <h1
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="0"
                    >
                        <?php echo $about_us_headline; ?>
                    </h1>
                    <?php endif;
                    ?>
                    <?php
                    $about_us_text = get_field("about_us_text");
                    if ($about_us_text): ?>
                    <p
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="100"
                    >
                        <?php echo $about_us_text; ?>
                    </p>
                    <a
                        class="btn btn-primary btn-lg rounded-pill"
                        href="<?php echo esc_url(get_permalink(33)); ?>"
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="300"
                        >Learn more</a
                    >
                    <?php endif;
                    ?>
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
                                <?php
                                $our_services_headline = get_field(
                                    "our_services_headline",
                                );
                                if ($our_services_headline): ?>
                                <h1
                                    data-aos="fade-up"
                                    data-aos-duration="1500"
                                    data-aos-delay="0"
                                >
                                    <?php echo $our_services_headline; ?>
                                </h1>
                                <?php endif;
                                ?>
                            </div>
                            <div class="col-12 col-md-6">
                                <?php
                                $our_services_text = get_field(
                                    "our_services_text",
                                );
                                if ($our_services_text): ?>
                                <p
                                    data-aos="fade-up"
                                    data-aos-duration="1500"
                                    data-aos-delay="100"
                                >
                                    <?php echo $our_services_text; ?>
                                </p>
                                <?php endif;
                                ?>
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
                                <?php
                                $args = [
                                    "post_type" => "services",
                                    "posts_per_page" => -1,
                                ];
                                $services_query = new WP_Query($args);
                                if ($services_query->have_posts()):
                                    while ($services_query->have_posts()):

                                        $services_query->the_post();
                                        $featured_img_url = get_the_post_thumbnail_url(
                                            get_the_ID(),
                                            "full",
                                        );
                                        ?>
                                    <div class="swiper-slide rounded" style="background: url('<?php echo esc_url(
                                        $featured_img_url,
                                    ); ?>') no-repeat;">
                                        <a href="<?php the_permalink(); ?>"></a>
                                        <div class="overlay"></div>
                                        <div class="caption">
                                            <h1><?php the_title(); ?></h1>
                                            <p><?php the_field(
                                                "subtitle",
                                            ); ?></p>
                                        </div>
                                    </div>
                                <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
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
                            href="#contact"
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

<section id="markets" class="cards pt-30 pb-60">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <?php
                $our_markets_headline = get_field("our_markets_headline");
                if ($our_services_headline): ?>
                <h1
                    data-aos="fade-up"
                    data-aos-duration="1500"
                    data-aos-delay="0"
                >
                    <?php echo $our_markets_headline; ?>
                </h1>
                <?php endif;
                ?>
                <?php
                $our_markets_text = get_field("our_markets_text");
                if ($our_markets_text): ?>
                <p
                    data-aos="fade-up"
                    data-aos-duration="1500"
                    data-aos-delay="100"
                >
                    <?php echo $our_markets_text; ?>
                </p>
                <?php endif;
                ?>
            </div>
        </div>
        <?php if (have_rows("markets")): ?>
        <div class="row">
            <?php
            $delay_count = 0;
            while (have_rows("markets")):

                the_row();
                $delay_count += 100;
                $icon = get_sub_field("icon");
                $name = get_sub_field("name");
                $text = get_sub_field("text");
                ?>
            <div
                class="col-lg-3 mb-4 mb-lg-0 text-center"
                data-aos="fade-up"
                data-aos-duration="1500"
                data-aos-delay="<?php echo $delay_count; ?>"
            >
                <div class="card">
                    <a href="<?php echo esc_url(get_permalink(39)); ?>">
                        <img
                            src="<?php echo esc_url($icon); ?>"
                            class="card-img-top mb-3"
                            alt="<?php echo esc_attr($name); ?>"
                        />
                    </a>
                    <div class="card-body">
                        <a href="<?php echo esc_url(get_permalink(39)); ?>">
                            <h4 class="card-title mb-3"><?php echo $name; ?></h4>
                        </a>
                        <p class="card-text my-4">
                            <?php echo $text; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
            endwhile;
            ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<section id="news-and-events" class="posts">
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
?>
?>
 ?>
 ?>
 ?>
 ?>
 ?>
 ?>
 ?>
 ?>
 ?>
 ?>
 ?>
 ?>
 ?>
 ?>