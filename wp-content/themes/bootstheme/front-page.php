<?php get_header(); ?>
    <div class="container">
        <div class="row mt-5 ">
            <h2 class="text-center mb-5"><?php _e('Recent news','BootSTheme'); ?></h2>
            <?php
            $news_query = new WP_Query(array(
                "post_type" => "news",
                'posts_per_page' => '3',
                "meta_key" => "_crb_create_date",
                "orderby" => "meta_value_num",
                "order" => "DESC"
            ));
            if ($news_query->have_posts()) : while ($news_query->have_posts()) : $news_query->the_post();
                ?>
                <div class="col-md-4 mx-auto">
                    <div class="card h-100">
                        <?php
                        $thumbnail_id = carbon_get_post_meta($post->ID, 'crb_image');
                        $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full');
                        ?>
                        <img class="card-img-top" src="<?php echo $thumbnail_url; ?>" alt="<?php echo carbon_get_post_meta($post->ID, 'crb_title'); ?>"/>
                        <div class="card-body">
                            <h2 class="card-title text-center">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo carbon_get_post_meta($post->ID, 'crb_title'); ?>
                                </a>
                            </h2>
                        </div>
                        <div class="card-footer">
                            <?php
                            _e('Create date: ','BootSTheme');
                            echo date('d.m.Y', carbon_get_post_meta($post->ID, 'crb_create_date'));
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
                wp_reset_postdata();
                ?>
            <?php else: ?>
                <p><?php _e('No news','BootSTheme') ?></p>
            <?php endif; ?>
        </div>
        <div class="row mt-5 ">
            <h2 class="text-center mb-5"><?php _e('Best offers','BootSTheme'); ?></h2>
            <?php
            $product_query = new WP_Query(array(
                "post_type" => "product",
                'posts_per_page' => '3',
                "meta_key" => "_crb_price",
                "orderby" => "meta_value_num",
                "order" => "ASC"
            ));
            if ($product_query->have_posts()) : while ($product_query->have_posts()) : $product_query->the_post();
                ?>
                <div class="col-md-4 mx-auto">
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
            <?php
            endwhile;
                wp_reset_postdata();
                ?>
            <?php else: ?>
                <p><?php _e('No products','BootSTheme') ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer();