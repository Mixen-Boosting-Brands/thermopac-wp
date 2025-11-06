<?php
/*
Template Name: About Us
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

<?php get_footer(); ?>
