<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Quick Order Section Start -->
<section class="quick_order_section wrap_two_columns">
    <div class="container">
        <div class="row align-items-center mx-auto section_two_columns">

            <div class="col-lg-6 quick_order_content">
                <h2><?php the_sub_field('h2_header'); ?></h2>
                <p><?php the_sub_field('content'); ?></p>
                <?php if (get_sub_field('button_id')):?>
                    <a class="cta_btn" <?php if (get_sub_field('button_id')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link'); ?>">
                        <?php the_sub_field('button_text'); ?>
                    </a>
                <?php endif;?>
            </div>

            <div class="col-lg-6 quick_order_image <?php if ( get_sub_field('swap_blocks') == true ) { echo 'order-first'; } ?>">
                <?php if ( get_sub_field('image') ):?>
                    <?php $quick_order_image = get_sub_field('image');?>
                    <img src="<?php echo $quick_order_image;?>">
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<!-- Quick Order Section End -->