<?php get_header(); ?>

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

<section class="pt-60 pb-30">
    <div class="container">
        <div class="row py-60">
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

                <?php
                $superior_headline_inferior_text = get_field(
                    "superior_headline_inferior_text",
                );
                if ($superior_headline_inferior_text): ?>
                <p
                    data-aos="fade-up"
                    data-aos-duration="1500"
                    data-aos-delay="100"
                >
                    <?php echo $superior_headline_inferior_text; ?>
                </p>
                <?php endif;
                ?>
            </div>
        </div>

        <div class="row pt-60 pb-30">
            <div class="col text-center">
                <h1>Our Products</h1>
                <?php
                $our_products_headline = get_field("our_products_headline");
                if ($superior_headline): ?>
                <h2
                    data-aos="fade-up"
                    data-aos-duration="1500"
                    data-aos-delay="0"
                >
                    <?php echo $our_products_headline; ?>
                </h2>
                <?php endif;
                ?>
            </div>
        </div>

        <?php if (have_rows("our_products_images")): ?>
        <div class="row py-30">
            <!-- Slider main container -->
            <div
                class="swiper-inner"
                data-aos="fade-up"
                data-aos-duration="1500"
                data-aos-delay="100"
            >
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <?php while (have_rows("our_products_images")):

                        the_row();

                        // Get fields for the VISIBLE SLIDE
                        $image_url = get_sub_field("image");
                        $product_name = get_sub_field("product_name");

                        // Get fields for the MODAL
                        $modal_images_repeater = get_sub_field("images");
                        $modal_description = get_sub_field("description");

                        // --- THIS IS THE FIX ---
                        // Prepare data for the modal's data attributes
                        $modal_image_urls = [];
                        if ($modal_images_repeater) {
                            foreach ($modal_images_repeater as $img_data) {
                                $modal_image_urls[] = $img_data["image"];
                            }
                        }
                        $modal_images_json = json_encode($modal_image_urls);
                        // We no longer need to base64_encode the description.

                        // Create the full attribute string using esc_attr() for safety.
                        $modal_attributes = sprintf(
                            'data-bs-toggle="modal" data-bs-target="#serviceModal" data-bs-name="%s" data-bs-images=\'%s\' data-bs-description="%s"',
                            esc_attr($product_name),
                            esc_attr($modal_images_json),
                            esc_attr($modal_description), // Directly use esc_attr() on the description
                        );

                        // --- END OF FIX ---
                        ?>
                        <?php if ($image_url): ?>
                        <!-- Slide -->
                        <div class="swiper-slide">
                            <!-- The card is now wrapped in an <a> tag which will trigger the modal -->
                            <a href="javascript:void(0);" <?php echo $modal_attributes; ?>>
                                <div class="card">
                                    <img
                                        src="<?php echo esc_url($image_url); ?>"
                                        alt="<?php echo esc_attr(
                                            $product_name,
                                        ); ?>"
                                        class="img-fluid"
                                        loading="lazy"
                                    />
                                    <div class="container-product-name">
                                        <h1><?php echo esc_html(
                                            $product_name,
                                        ); ?></h1>
                                    </div>
                                </div>
                            </a>
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

        <div class="row pt-30 pb-60">
            <div class="col text-center">
                <?php
                $our_products_inferior_text = get_field(
                    "our_products_inferior_text",
                );
                if ($our_products_inferior_text): ?>
                <p
                    data-aos="fade-up"
                    data-aos-duration="1500"
                    data-aos-delay="100"
                >
                    <?php echo $our_products_inferior_text; ?>
                </p>
                <?php endif;
                ?>
            </div>
        </div>

        <div class="row pt-60 pb-30">
            <div class="col text-center">
                <h1>Materials</h1>
                <?php
                $materials_headline = get_field("materials_headline");
                if ($materials_headline): ?>
                <h2
                    data-aos="fade-up"
                    data-aos-duration="1500"
                    data-aos-delay="0"
                >
                    <?php echo $materials_headline; ?>
                </h2>
                <?php endif;
                ?>
            </div>
        </div>

        <div class="row pt-30 pb-60">
            <?php if (have_rows("materials_images")): ?>
                <?php while (have_rows("materials_images")):
                    the_row(); ?>
                    <?php $image_url = get_sub_field("image"); ?>
                    <?php if ($image_url): ?>
                    <!-- Slide -->
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <img
                            src="<?php echo esc_url($image_url); ?>"
                            alt=""
                            class="img-fluid mb-3 mb-lg-0"
                            loading="lazy"
                        />
                    </div>
                    <?php endif; ?>
                <?php
                endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="row pt-60 pb-30">
            <div class="col text-center">
                <h1>Secondary Operations</h1>
                <?php
                $secondary_operations_headline = get_field(
                    "secondary_operations_headline",
                );
                if ($secondary_operations_headline): ?>
                <h2
                    data-aos="fade-up"
                    data-aos-duration="1500"
                    data-aos-delay="0"
                >
                    <?php echo $secondary_operations_headline; ?>
                </h2>
                <?php endif;
                ?>
            </div>
        </div>

        <?php if (have_rows("secondary_operations_images")): ?>
        <div class="row py-30">
            <!-- Slider main container -->
            <div
                class="swiper-inner"
                data-aos="fade-up"
                data-aos-duration="1500"
                data-aos-delay="100"
            >
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <?php while (have_rows("secondary_operations_images")):
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

        <div class="row pt-30 pb-60">
            <div class="col text-center">
                <?php
                $secondary_operations_inferior_text = get_field(
                    "secondary_operations_inferior_text",
                );
                if ($secondary_operations_inferior_text): ?>
                <p
                    data-aos="fade-up"
                    data-aos-duration="1500"
                    data-aos-delay="100"
                >
                    <?php echo $secondary_operations_inferior_text; ?>
                </p>
                <?php endif;
                ?>
            </div>
        </div>

        <div class="row pt-60 pb-30">
            <div class="col text-center">
                <h1>Quality</h1>
                <?php
                $quiality_headline = get_field("quiality_headline");
                if ($quiality_headline): ?>
                <h2
                    data-aos="fade-up"
                    data-aos-duration="1500"
                    data-aos-delay="0"
                >
                    <?php echo $quiality_headline; ?>
                </h2>
                <?php endif;
                ?>
            </div>
        </div>

        <div id="quality-images" class="row pt-30 pb-60">
            <?php
            $quality_images = get_field("quality_images");

            if ($quality_images):
                $count = count($quality_images);
                $col_class = "";
                switch ($count) {
                    case 1:
                        $col_class = "col-12 col-lg-12 text-center";
                        break;
                    case 2:
                        $col_class = "col-6 col-lg-6 text-center";
                        break;
                    case 3:
                        $col_class = "col-6 col-lg-4 text-center";
                        break;
                    default:
                        $col_class = "col-6 col-lg-3 text-center";
                        break;
                }

                while (have_rows("quality_images")):
                    the_row();
                    $image_url = get_sub_field("image");
                    if ($image_url): ?>
                        <div class="<?php echo esc_attr($col_class); ?>">
                            <img
                                src="<?php echo esc_url($image_url); ?>"
                                alt="Quality Seal"
                                class="img-fluid mb-3 mb-lg-0"
                                loading="lazy"
                            />
                        </div>
                    <?php endif;
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
