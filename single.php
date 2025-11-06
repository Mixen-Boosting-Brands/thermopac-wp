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
                            <h1><?php the_title(); ?></h1>
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
                <?php
                $categories = get_the_category();
                if (!empty($categories)): ?>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="category" href="<?php echo esc_url(
                            get_category_link($categories[0]->term_id),
                        ); ?>">
                            <?php echo esc_html($categories[0]->name); ?>
                        </a>
                    </li>
                </ul>
                <?php endif;
                ?>

                <h1><?php the_title(); ?></h1>

                <?php the_content(); ?>

                <?php
                $tags = get_the_tags();
                if ($tags): ?>
                <ul class="list-inline">
                    <?php foreach ($tags as $tag): ?>
                    <li class="list-inline-item">
                        <a class="badge tag" href="<?php echo esc_url(
                            get_tag_link($tag->term_id),
                        ); ?>">
                            <?php echo esc_html($tag->name); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif;
                ?>
            </div>
        </div>
    </div>
</section>

<?php
    endwhile;
endif; ?>

<?php get_footer(); ?>
