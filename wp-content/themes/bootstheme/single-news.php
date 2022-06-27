<?php get_header(); ?>
    <div class="container">
        <div class="row mt-5 ">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <?php
                        $thumbnail_id = carbon_get_post_meta($post->ID, 'crb_image');
                        $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'fool');
                        ?>
                        <img class="card-img-top" src="<?php echo $thumbnail_url; ?>" alt="<?php echo carbon_get_post_meta($post->ID, 'crb_title'); ?>"/>
                        <div class="card-body">
                            <h1 class="card-title text-center"><?php echo carbon_get_post_meta($post->ID, 'crb_title'); ?></h1>
                            <p class="card-text"><?php echo carbon_get_post_meta($post->ID, 'crb_text'); ?></p>
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
        </div>
    </div>
<?php get_footer();