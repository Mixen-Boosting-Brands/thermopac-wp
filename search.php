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
                            <h1>Search Results for: "<?php echo esc_html(
                                get_search_query(),
                            ); ?>"</h1>
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
                    // ¡Reutilizamos la misma plantilla parcial una vez más!
                    get_template_part("template-parts/post-card");
                endwhile;
            else:
                 ?>
                <div class="col text-center">
                    <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
                </div>
            <?php
            endif; ?>
        </div>

        <div class="row mt-5">
            <div class="col text-center">
                <?php the_posts_pagination([
                    "mid_size" => 2,
                    "prev_text" => __("&laquo; Previous", "textdomain"),
                    "next_text" => __("Next &raquo;", "textdomain"),
                ]); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
