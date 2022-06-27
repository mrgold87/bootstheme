<?php get_header(); ?>
<div class="container">
    <div class="row mt-5 ">
        <?php while (have_posts()) : the_post(); ?>
            <div class="col">
                <div class="card-body">
                    <h1 class="card-title mb-5"><?php the_title(); ?></h1>
                    <div class="card-text"><?php the_content(''); ?></div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>
