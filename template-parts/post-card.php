<div
    class="col-lg-4 mb-4"
    data-aos="fade-up"
    data-aos-duration="1500"
>
    <div class="card">
        <a class="card-img-top-link" href="<?php the_permalink(); ?>">
            <?php
            $categories = get_the_category();
            if (!empty($categories)): ?>
            <span class="badge rounded-pill text-bg-light">
                <?php echo esc_html($categories[0]->name); ?>
            </span>
            <?php endif;
            ?>

            <?php if (has_post_thumbnail()) {
                $thumbnail_url = get_the_post_thumbnail_url(
                    get_the_ID(),
                    "large",
                );
            } else {
                $thumbnail_url =
                    get_template_directory_uri() .
                    "/assets/images/thumb-news.png";
            } ?>
            <img
                src="<?php echo esc_url($thumbnail_url); ?>"
                class="card-img-top"
                alt="<?php the_title_attribute(); ?>"
            />
        </a>
        <div class="card-body">
            <a href="<?php the_permalink(); ?>">
                <h5 class="card-title"><?php the_title(); ?></h5>
            </a>
            <p class="card-text"><?php the_excerpt(); ?></p>
        </div>
        <div class="card-footer">
            <time><?php echo get_the_date(); ?></time>
        </div>
    </div>
</div>
