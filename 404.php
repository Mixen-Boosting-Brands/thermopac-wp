<?php get_header(); ?>

<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>

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
                            <h1>Error 404</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="post py-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1>Error 404</h1>

                We're sorry, but the page you're looking for doesn't exist.
            </div>
        </div>
    </div>
</section>

<?php
    endwhile;
endif; ?>

<?php get_footer(); ?>
