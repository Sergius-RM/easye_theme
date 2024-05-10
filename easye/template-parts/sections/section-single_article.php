<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>
    <!-- Page Banner Start -->
    <section class="blog-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 mx-auto">
                    <?php if (get_field('blog_custom_thumbnail') ): ?>
                        <?php $custom_thumbnail = get_field('blog_custom_thumbnail');?>
                        <img src="<?php echo $custom_thumbnail;?>">
                    <?php elseif (has_post_thumbnail() ): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'image_full' ); ?>
                        <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Banner End -->

    <!-- Blog Details Area Start -->
    <section class="blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 mx-auto">

                    <div class="banner-inner">
                        <div class="content-writer">
                            <div class="post-meta">
                                <span class="posted-date">
                                    <span><?php echo get_the_date('n.j.Y'); ?></span>
                                </span>
                            </div>
                        </div>

                        <?php if (get_field('blog_custom_title') ): ?>
                            <h1 class="page-title"><?php the_field('blog_custom_title');?></h1>
                        <?php else: ?>
                            <h1 class="page-title"><?php the_title(); ?></h1>
                        <?php endif; ?>
                    </div>

                    <div class="blog-details-content">
                        <?php the_content();?>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- Blog Details Area End -->