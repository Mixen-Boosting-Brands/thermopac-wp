<?php get_header(); ?>

<section id="header-home" class="pb-30">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="swiper-header rounded">
                    <div class="swiper-wrapper">
                        <div
                            class="swiper-slide"
                            style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/banner-blog.png') no-repeat;"
                        >
                            <div class="overlay"></div>
                            <h1>Sustainability and News</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-30">
    <div class="container">
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h1
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="0"
                    >
                        At Thermopac sustainability isn’t just part of our process — it shapes everything we design, manufacture, and deliver. <span>Through innovation in thermoforming and material efficiency</span>, we’re committed to creating packaging solutions that perform beautifully while protecting the planet.
                    </h1>
                    <p
                        data-aos="fade-up"
                        data-aos-duration="1500"
                        data-aos-delay="100"
                    >
                        From tooling to forming, our operations are engineered for minimal waste and maximum efficiency. We continuously invest in precision equipment and process optimization to reduce energy consumption, material usage, and CO₂ emissions — without compromising quality or performance.
                    </p>
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
            <div class="col text-center">
                <?php // Pagination

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
