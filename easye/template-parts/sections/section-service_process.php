<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- FService Process Section Start -->
<section class="service_process_section wrap_two_columns">
    <div class="container">
        <div class="row align-items-center mx-auto section_two_columns">
        <h2 class="text-center"><?php the_sub_field('h2_header'); ?></h2>

            <?php if( have_rows('service_process') ): ?>
                <ul>
                <?php $itemcount = 1;?>
                <?php while( have_rows('service_process') ) : the_row(); ?>
                    <?php if ($itemcount > 2):?><?php  $itemcount = 1;?><?php endif;?>
                    <li class="col-lg-6 d-flex align-items-center <?php if ( $itemcount == 1 ) { echo 'right-side'; } ?>">
                        <?php if ( get_sub_field('icon') ):?>
                            <?php $quick_order_image = get_sub_field('icon');?>
                            <img src="<?php echo $quick_order_image;?>">
                        <?php endif; ?>
                        <div class="service_content <?php if ( $itemcount == 2 ) { echo 'order-first text-end'; } ?>">
                            <h4><?php the_sub_field('name'); ?></h4>
                            <p><?php the_sub_field('content'); ?></p>
                        </div>
                    </li>
                    <?php $itemcount++;?>
                <?php endwhile; ?>
                </ul>
            <?php endif; ?>

        </div>
    </div>
</section>
<!-- Service Process Section End -->