<?php get_header(); ?>
    <div class="container">
        <div class="row mt-5">
            <h1 class="text-center mb-5"><?php _e('News','BootSTheme');?></h1>
            <?php
            $query = new WP_Query(array(
                "post_type"      => "news",
                "meta_key"       => "_crb_create_date",
                "orderby"        => "meta_value_num",
                "order"          => "DESC"
            ));
             if ( $query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-md-4 mx-auto mb-5">
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
                            echo date('d.m.Y', carbon_get_post_meta($post->ID, 'crb_create_date'))  ;
                            ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
                 <div class="text-center mt-5">  <?php the_posts_pagination()?> </div>
             <?php else: ?>
                 <p><?php _e('No news','BootSTheme')?></p>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer();