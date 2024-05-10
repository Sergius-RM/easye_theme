<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$number = get_sub_field('number_of_posts');
$category = get_sub_field('from_category');
$category_array = array( $category );
$orderby = get_sub_field('order_by');
$order = get_sub_field('sorting_order');

$args = array(
    'post_type'         => 'post',
    'posts_per_page'    => $number,
    // 'category' => $category,
    'orderby'           => $orderby,
    'order'             => $order,
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'terms'    => $category_array[0],
        )
    )
);

$text = get_the_excerpt();
$words = 20;
$excerpt_lenght = 20;
$more = '…';
$excerpt = wp_trim_words( $text, $words, $more );
?>

<!-- Related Articles Area Start -->
<section class="highlighted_articles">
    <div class="container">
        <div class="section-title">
            <?php if( get_sub_field('h2_header') ): ?>
                <h2><?php echo get_sub_field('h2_header'); ?></h2>
            <?php endif; ?>
        </div>
        <div class="row justify-content-center">

            <?php $wpex_query = new WP_Query( $args );
            foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
            <div class="col-xl-4 col-md-6" id="post-<?php the_ID(); ?>">
                <div class="articles-item">
                    <div class="image">
                        <?php if (has_post_thumbnail( $post->ID ) ): ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'image_full' ); ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
                        <?php else: ?>
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/post_thumbnail.png" alt="<?php the_title(); ?>" />
                        <?php endif; ?>
                    </div>

                    <div class="articles-content">
                        <h4><a href="<?php the_permalink(); ?>"><?php echo substr(strip_tags(get_the_title()), 0, 60); ?></a></h4>

                        <p><?php echo custom_excerpt($excerpt_lenght); ?></p>

                        <a href="<?php the_permalink(); ?>" class="learn-more"><?php esc_html_e('Lue lisää'); ?> <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            <?php
            endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
</div>
</section>
<!-- Related Articles Area END  -->
