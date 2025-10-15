<?php get_header(); ?>

<section id="header-inner" class="pb-30">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="swiper-header rounded">
                    <div class="swiper-wrapper">
                        <div
                            class="swiper-slide"
                            style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/slide-1.png') no-repeat;"
                        >
                            <div class="overlay"></div>
                            <h1><?php single_cat_title(); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="posts py-60">
    <div class="container">
        <div class="row">
            <?php if (have_posts()):
                while (have_posts()):
                    the_post();
                    get_template_part("template-parts/post-card");
                endwhile;
            else:
                 ?>
                <div class="col text-center">
                    <p>No posts found in this category.</p>
                </div>
            <?php
            endif; ?>
        </div>

        <div class="row">
            <div class="col">
                <?php // Paginación
                the_posts_pagination([
                    "mid_size" => 2,
                    "prev_text" => __("&laquo; Previous", "textdomain"),
                    "next_text" => __("Next &raquo;", "textdomain"),
                ]); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
