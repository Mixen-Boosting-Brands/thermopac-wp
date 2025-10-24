<?php
/*
Template Name: Markets
*/
get_header(); ?>

<section id="header-inner" class="pb-30">
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Slider main container -->
                <div class="swiper-header rounded">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slide -->
                        <?php
                        $background_image_url = get_the_post_thumbnail_url(
                            get_the_ID(),
                            "full",
                        );
                        if (!$background_image_url) {
                            $background_image_url =
                                get_template_directory_uri() .
                                "/assets/images/slide-1.png";
                        }
                        ?>
                        <div
                            class="swiper-slide"
                            style="
                                background: url('<?php echo esc_url(
                                    $background_image_url,
                                ); ?>')
                                    no-repeat;
                            "
                        >
                            <div class="overlay"></div>
                            <h1><?php the_title(); ?></h1>
                        </div>
                    </div>
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
                    <?php
                    $superior_headline = get_field("superior_headline");
                    if ($superior_headline): ?>
                    <h1
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="0"
                    >
                        <?php echo $superior_headline; ?>
                    </h1>
                    <?php endif;
                    ?>
                </div>
            </div>
            <?php if (have_rows("images")): ?>
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
                        <?php while (have_rows("images")):
                            the_row(); ?>
                            <?php $image_url = get_sub_field("image"); ?>
                            <?php if ($image_url): ?>
                            <!-- Slide -->
                            <div class="swiper-slide">
                                <div class="card">
                                    <img
                                        src="<?php echo esc_url($image_url); ?>"
                                        alt=""
                                        class="img-fluid"
                                        loading="lazy"
                                    />
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php
                        endwhile; ?>
                    </div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <?php endif; ?>
            <div class="row mb-4">
                <div class="col text-center">
                    <?php
                    $inferior_headline = get_field("inferior_headline");
                    if ($inferior_headline): ?>
                    <h1
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="0"
                    >
                        <?php echo $inferior_headline; ?>
                    </h1>
                    <?php endif;
                    ?>

                    <?php
                    $inferior_text = get_field("inferior_text");
                    if ($inferior_text): ?>
                    <p
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="100"
                    >
                        <?php echo $inferior_text; ?>
                    </p>
                    <?php endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- section
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
</section -->

<section id="markets" class="cards pt-30 pb-60">
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
            </div>
        </div>
        <?php if (have_rows("markets")): ?>
        <div class="row">
            <?php
            $delay_count = 0;
            while (have_rows("markets")):

                the_row();
                $delay_count += 100;

                // Get all sub fields
                $icon = get_sub_field("icon");
                $name = get_sub_field("name");
                $text = get_sub_field("text");
                $modal_image = get_sub_field("image");
                $modal_description = get_sub_field("description");

                // --- Conditional Logic ---
                $is_thermoforming = $name === "Thermoforming";
                if ($is_thermoforming) {
                    $link_href = esc_url(get_permalink(12));
                    $link_attributes = ""; // No modal attributes needed
                } else {
                    $link_href = "javascript:void(0);";
                    $link_attributes = sprintf(
                        'data-bs-toggle="modal" data-bs-target="#serviceModal" data-bs-name="%s" data-bs-image="%s" data-bs-description="%s"',
                        esc_attr($name),
                        esc_url($modal_image),
                        base64_encode($modal_description),
                    );
                }
                ?>
            <div
                class="col-lg-3 mb-4 mb-lg-0 text-center"
                data-aos="fade-up"
                data-aos-duration="1500"
                data-aos-delay="<?php echo $delay_count; ?>"
            >
                <div class="card">
                    <a href="<?php echo $link_href; ?>" <?php echo $link_attributes; ?>>
                        <img
                            src="<?php echo esc_url($icon); ?>"
                            class="card-img-top mb-3"
                            alt="<?php echo esc_attr($name); ?>"
                        />
                    </a>
                    <div class="card-body">
                        <a href="<?php echo $link_href; ?>" <?php echo $link_attributes; ?>>
                            <h4 class="card-title mb-3"><?php echo $name; ?></h4>
                        </a>
                        <!-- p class="card-text my-4">
                            <php echo $text; >
                        </p -->
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

<?php get_footer(); ?>
