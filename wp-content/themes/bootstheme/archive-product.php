<?php get_header(); ?>
    <div class="container">
        <div class="row mt-5 ">
            <h1 class="text-center mb-5"><?php _e('Products','BootSTheme'); ?></h1>
            <?php
            $query = new WP_Query(array(
                "post_type" => "product",
                "meta_key" => "_crb_price",
                "orderby" => "meta_value_num",
                "order" => "ASC"
            ));

            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                ?>
                <div class="col-md-4 mx-auto mb-5">
                    <div class="card h-100">
                        <?php
                        $thumbnail_ids = carbon_get_post_meta($post->ID, 'crb_media_gallery');
                        $thumbnail_url = wp_get_attachment_image_url($thumbnail_ids[0], 'full');
                        ?>
                        <img class="card-img-top" src="<?php echo $thumbnail_url; ?>" alt="<?php echo carbon_get_post_meta($post->ID, 'crb_name'); ?>"/>
                        <div class="card-body">
                            <h2 class="card-title text-center">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo carbon_get_post_meta($post->ID, 'crb_name'); ?>
                                </a>
                            </h2>
                            <div class="mt-2 text-center">
                                <?php
                                _e('Price: ','BootSTheme');
                                echo carbon_get_post_meta($post->ID, 'crb_price') . ' &#8381;';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
                <div class="text-center mt-5">  <?php the_posts_pagination() ?> </div>
            <?php else: ?>
                <p><?php _e('No products','BootSTheme') ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer();