<?php get_header(); ?>
    <div class="container">
        <div class="row mt-5">
            <?php
            while (have_posts()) :
            the_post();
            ?>
            <h1 class="text-center mb-5"><?php echo carbon_get_post_meta($post->ID, 'crb_name'); ?></h1>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text"><?php echo carbon_get_post_meta($post->ID, 'crb_description'); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <?php
                            _e('Equipment: ','BootSTheme');
                            echo carbon_get_post_meta($post->ID, 'crb_equipment');
                            ?>
                        </li>
                        <li class="list-group-item">
                            <?php
                            _e('Manufacturer: ','BootSTheme');
                            echo carbon_get_post_meta($post->ID, 'crb_manufacturer');
                            ?>
                        </li>
                        <li class="list-group-item">
                            <?php
                            _e('Price: ','BootSTheme');
                            echo carbon_get_post_meta($post->ID, 'crb_price') . ' &#8381;';
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <?php
            $thumbnail_ids = carbon_get_post_meta(get_the_ID(), 'crb_media_gallery');
            foreach ($thumbnail_ids as $thumbnail_id):
                ?>
                <div class="col-md-4">
                    <div class="card  h-100">
                        <img src="<?php echo wp_get_attachment_image_url($thumbnail_id, 'full'); ?>" alt="<?php echo carbon_get_post_meta($post->ID, 'crb_name'); ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endwhile; ?>
    </div>
<?php get_footer();