<?php
/*
Template Name: Markets
*/
get_header(); ?>

<section id="header-home" class="pb-30">
    <div class="container">
        <div class="row">
            <?php
            $banner_desktop = get_field("banner_desktop");
            if ($banner_desktop): ?>
            <div class="col d-none d-md-block text-center">
                <img class="img-fluid" src="$banner_desktop" alt="" />
            </div>
            <?php endif;
            ?>
            <div class="col d-md-none">
                <!-- Slider main container -->
                <div class="swiper-header swiper-markets rounded">
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
                $modal_description = get_sub_field("description");

                // Get the repeater field for images
                $modal_images = get_sub_field("images");
                $image_urls = [];
                if ($modal_images) {
                    foreach ($modal_images as $img) {
                        $image_urls[] = $img["image"];
                    }
                }
                $modal_images_json = json_encode($image_urls);

                // --- Conditional Logic ---
                $is_thermoforming = $name === "Thermoforming";
                if ($is_thermoforming) {
                    $link_href = esc_url(get_permalink(12));
                    $link_attributes = ""; // No modal attributes needed
                } else {
                    $link_href = "javascript:void(0);";
                    // MODIFICATION: Replaced base64_encode() with esc_attr()
                    // This is safer and avoids the encoding issue.
                    $link_attributes = sprintf(
                        'data-bs-toggle="modal" data-bs-target="#serviceModal" data-bs-name="%s" data-bs-images=\'%s\' data-bs-description="%s"',
                        esc_attr($name),
                        esc_attr($modal_images_json),
                        esc_attr($modal_description), // <--- CHANGE IS HERE
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

<?php get_footer(); ?>
