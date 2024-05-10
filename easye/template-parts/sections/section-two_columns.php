<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Two Columns Section Start -->
<section class="two_columns_section wrap_two_columns">
    <div class="container">
        <div class="row align-items-center mx-auto section_two_columns">

            <div class="col-sm-6 col-md-6 col-lg-6 two_columns_content">
                <?php if (get_sub_field('header_subtitle')):?>
                    <h4><?php the_sub_field('header_subtitle'); ?></h4>
                <?php endif;?>
                <h2><?php the_sub_field('h2_header'); ?></h2>
                <?php the_sub_field('content'); ?>
                <?php if (get_sub_field('button_link')):?>
                    <a class="cta_btn" target="_blank" <?php if (get_sub_field('button_link')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link'); ?>">
                        <?php the_sub_field('button_text'); ?>
                    </a>
                <?php endif;?>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 two_columns_image <?php if ( get_sub_field('swap_blocks') == true ) { echo 'order-first'; } ?>">
                <?php if ( get_sub_field('image') ):?>
                    <?php $quick_order_image = get_sub_field('image');?>
                    <img src="<?php echo $quick_order_image;?>">
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<!-- Two Columns Section End -->