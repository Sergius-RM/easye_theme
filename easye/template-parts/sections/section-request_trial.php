<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$sectionID = get_sub_field( 'section_id');
$overlay = get_sub_field('section_overlay');

$header = get_sub_field( 'contactus_title_h2');
$sub = get_sub_field( 'contactus_subtitle_h4');
$content = get_sub_field('contactus_content_area');


$pt = get_sub_field('padding_top');
$pb = get_sub_field('padding_bottom');
$mt = get_sub_field('margin_top');
$mb = get_sub_field('margin_bottom');
?>

<!-- Request Trial Section Start -->
<section <?php if ($sectionID): ?>id="<?php echo $sectionID;?>"<?php endif; ?> class="featured_benefits_section contactus_section bg-<?php if ($overlay): ?><?php echo $overlay; ?><?php else: ?>white<?php endif; ?> <?php if ($pt): ?>pt-<?php echo $pt; ?><?php endif; ?> <?php if ($pb): ?>pb-<?php echo $pb; ?><?php endif; ?> <?php if ($mt): ?>mt-<?php echo $mt; ?><?php endif; ?> <?php if ($mb): ?>mb-<?php echo $mb; ?><?php endif; ?>" style="margin-top: -50px;">
    <div class="container">
        <div class="row align-items-center mx-auto section_two_columns">
            <div class="col-lg-6 <?php if ( get_sub_field('swap_text_position') == true ) { echo 'text-end'; } ?>">
                <?php if ($header): ?>
                <div class="featured_benefits_content">
                    <?php if ($sub): ?>
                        <h4 class="sub-title"><?php echo $sub;?></h4>
                    <?php endif; ?>
                    <?php if ($header): ?>
                        <h2><?php echo $header;?></h2>
                    <?php endif; ?>
                    <?php if ($content): ?>
                        <p><?php echo $content;?></p>
                    <?php endif;?>
                </div>
                <?php endif;?>

                <?php if( have_rows('statements') ): ?>
                <div class="featured_benefits_list" style="margin-top: 50px;">
                    <ul>
                        <?php while( have_rows('statements') ) : the_row(); ?>
                            <li class="d-flex align-items-center">
                                <?php if ( get_sub_field('icon') ):?>
                                    <?php $quick_order_image = get_sub_field('icon');?>
                                    <img src="<?php echo $quick_order_image;?>">
                                <?php endif; ?>
                                <h4><?php the_sub_field('name'); ?></h4>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-6 contactus_form <?php if ( get_sub_field('swap_blocks') == true ) { echo 'order-first'; } ?>">
                <?php if (get_sub_field('contactus_shortcode_form')):?>
                    <?php $form_id = get_sub_field('contactus_shortcode_form');?>
                    <?php echo do_shortcode('[gravityform id="'. $form_id .'" title="false" description="false" ajax="true"]');?>
                <?php endif;?>
            </div>

        </div>
    </div>
</section>
<!-- Request Trial Section End -->