<?php
/*
Template Name: Home
*/
get_header(); ?>

<section id="header-home" class="pb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
            <?php if (have_rows("slider")): ?>
                <?php while (have_rows("slider")):
                    the_row(); ?>
                <div class="video-container">
                    <video class="video-bg" autoplay muted loop playsinline>
                        <source src="<?php echo esc_url(
                            get_sub_field("video"),
                        ); ?>" type="video/mp4">
                            Your browser doesn't support HTML5.
                      </video>
                      <div class="overlay"></div>
                      <h1><?php echo get_sub_field("title"); ?></h1>
                </div>
                <?php
                endwhile; ?>
            <?php endif; ?>
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
                <?php
                $about_us_image = get_field("about_us_image");
                if ($about_us_image): ?>
                <figure>
                    <img
                        class="img-fluid mt-3 mt-lg-0"
                        src="<?php echo esc_url($about_us_image); ?>"
                        alt="About us image"
                        data-aos="zoom-in"
                        data-aos-duration="1500"
                        data-aos-delay="400"
                    />
                </figure>
                <?php endif;
                ?>
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
                        class="col-10 offset-1 col-md-9 offset-md-1 col-lg-8 offset-lg-2"
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

                                        // --- START: MODIFICATION ---
                                        // Determine the correct URL based on the post title.
                                        $service_link = "";
                                        if (
                                            get_the_title() === "Thermoforming"
                                        ) {
                                            // If it's "Thermoforming", link to its own permalink.
                                            $service_link = get_permalink();
                                        } else {
                                            // For all other services, link to the main services page anchor.
                                            $service_link =
                                                get_permalink(35) . "#services";
                                        }

                                        // --- END: MODIFICATION ---
                                        ?>
                                    <div class="swiper-slide rounded" style="background: url('<?php echo esc_url(
                                        $featured_img_url,
                                    ); ?>') no-repeat;">
                                        <a href="<?php echo esc_url(
                                            $service_link,
                                        );
                                        // Use the new variable here
                                        ?>"></a>
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
                            Sustainability <span>and News</span>
                        </h1>
                        <p
                            data-aos="fade-up"
                            data-aos-duration="1500"
                            data-aos-delay="100"
                        >
                            From tooling to forming, our operations are engineered for minimal waste and maximum efficiency. We continuously invest in precision equipment and process optimization to reduce energy consumption, material usage and CO₂ emissions — without compromising quality or performance.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $args = [
                        "post_type" => "post",
                        "posts_per_page" => 3,
                        "orderby" => "date",
                        "order" => "DESC",
                    ];

                    $latest_posts = new WP_Query($args);

                    if ($latest_posts->have_posts()):
                        while ($latest_posts->have_posts()):
                            $latest_posts->the_post();
                            get_template_part("template-parts/post-card");
                        endwhile;
                        wp_reset_postdata();
                    else:
                         ?>
                    <div class="col">
                        <p>No news found.</p>
                    </div>
                    <?php
                    endif;
                    ?>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <a
                            class="btn btn-primary btn-lg rounded-pill"
                            href="<?php echo get_post_type_archive_link(
                                "post",
                            ); ?>"
                            data-aos="fade-up"
                            data-aos-duration="1500"
                            data-aos-delay="300"
                            >View more</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
