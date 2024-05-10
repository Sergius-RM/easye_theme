<?php
/**
 * Template name: Online Order
 *
 */

get_header();
?>

<?php if ( have_rows( 'sections' ) ) : ?>
    <?php while ( have_rows('sections' ) ) : the_row();

        if ( get_row_layout() == 'page_header' ) :
            get_template_part('template-parts/sections/section', 'page_header');
            ?>
        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>

<!-- Two Columns Section Start -->
<section class="order_section">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-12 col-lg-10 two_columns_content mx-auto">

                <?php if (get_field('order_content')):?>
                    <div class="order_content">
                        <?php the_field('order_content'); ?>
                    </div>
                <?php endif;?>

                <?php if (get_field('order_gform')):?>
                    <div class="order_form text-center">
                        <?php $form_id = get_field('order_gform');?>
                        <?php echo do_shortcode('[gravityform id="'. $form_id .'" title="false" description="false" ajax="true"]');?>
                    </div>
                <?php endif;?>

            </div>

        </div>
    </div>
</section>
<!-- Two Columns Section End -->
<?php
get_footer();