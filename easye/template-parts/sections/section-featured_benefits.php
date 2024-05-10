<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Featured Benefits Section Start -->
<section class="featured_benefits_section">
    <div class="container">
        <div class="row align-items-center mx-auto section_two_columns">

            <div class="col-lg-6 featured_benefits_content <?php if ( get_sub_field('swap_text_position') == true ) { echo 'text-end'; } ?>">
                <h2><?php the_sub_field('h2_header'); ?></h2>
                <p><?php the_sub_field('content'); ?></p>
            </div>

            <div class="col-lg-6 featured_benefits_list <?php if ( get_sub_field('swap_blocks') == true ) { echo 'order-first'; } ?>">
                <?php if( have_rows('benefits') ): ?>
                    <ul>
                    <?php while( have_rows('benefits') ) : the_row(); ?>
                        <li class="d-flex align-items-center">
                            <?php if ( get_sub_field('icon') ):?>
                                <?php $quick_order_image = get_sub_field('icon');?>
                                <img src="<?php echo $quick_order_image;?>">
                            <?php endif; ?>
                            <h4><?php the_sub_field('name'); ?></h4>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<!-- Featured Benefits Section End -->