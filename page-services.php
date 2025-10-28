<?php
/*
Template Name: Services
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

<?php // Start the main 'service' repeater loop

if (have_rows("service")): ?>
    <?php while (have_rows("service")):

        the_row();

        // 1. Get the service name from the sub field.
        $service_name = get_sub_field("service_name");
        // 2. Create a URL-friendly slug to use as an ID.
        //    (e.g., "Design and Engineering" becomes "design-and-engineering")
        $service_id = sanitize_title($service_name);
        ?>

<section id="<?php echo esc_attr($service_id); ?>" class="service py-60">
    <div class="container">
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <?php // We already fetched the service name, so we can just use it.

        if ($service_name): ?>
                    <h1
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="0"
                    >
                        <?php echo $service_name; ?>
                    </h1>
                    <?php endif; ?>
                    <?php
                    // Use get_sub_field() for the headline
                    $superior_headline = get_sub_field("superior_headline");
                    if ($superior_headline): ?>
                    <h2
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="100"
                    >
                        <?php echo $superior_headline; ?>
                    </h2>
                    <?php endif;
                    ?>
                </div>
            </div>
            <?php // This nested repeater for 'images' works as intended

        if (have_rows("images")): ?>
            <div class="row mb-5">
                <!-- Slider main container -->
                <div
                    class="swiper-inner"
                    data-aos="fade-up"
                    data-aos-duration="1500"
                    data-aos-delay="200"
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
                    // Use get_sub_field() for the headline
                    $inferior_headline = get_sub_field("inferior_headline");
                    if ($inferior_headline): ?>
                    <h2
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="0"
                    >
                        <?php echo $inferior_headline; ?>
                    </h2>
                    <?php endif;
                    ?>

                    <?php
                    // Use get_sub_field() for the text
                    $inferior_text = get_sub_field("inferior_text");
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

    <?php
    endwhile; ?>
<?php endif;
// End the main 'service' repeater loop
?>

<?php get_footer(); ?>
