<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<!-- Footer Area Start -->
<footer id="site-footer" class="site-footer" role="contentinfo">
    <div class="container-fluid">
        <div class="row">

            <!-- Branding Area Start -->
            <div class="col-sm-4 col-md-3 col-xl-2 site-branding">

                <?php the_custom_logo();?>

                <div class="site_name">
                    <?php if (  get_field( 'footer_name', 'option') ) :?>
                        <?php $footername = get_field('footer_name', 'option'); ?>
                            <?php echo $footername;?>
                    <?php else:?>
                        <?php $site_name = get_bloginfo( 'name' );?>
                        <?php echo $site_name;?>
                    <?php endif ?>
                </div>

                <?php if (  get_field( 'y_tunnus', 'option') ) :?>
                    <?php $ytunnus = get_field('y_tunnus', 'option'); ?>
                    <div class="y_tunnus">Y-tunnus: <?php echo $ytunnus;?></div>
                <?php endif ?>
            </div>
            <!-- END Branding Area -->

            <!-- Contacts Info Area Start -->
            <div class="col-sm-4 col-md-3 col-xl-2 footer_contacts">

                <?php if (  get_field( 'contacts_area_title', 'option') ) :?>
                    <?php $contacts_title = get_field('contacts_area_title', 'option'); ?>
                    <h3><?php echo $contacts_title;?></h3>
                <?php endif ?>

                <?php if (have_rows('topbaremails', 'option')) { ?>
                    <?php while (have_rows('topbaremails', 'option')) {
                        the_row(); ?>
                            <a href="<?php the_sub_field('top_bar_email_link');?>" target="_blank">
                                <i class="bi bi-envelope-fill"></i> <?php the_sub_field('top_bar_email');?></a>
                    <?php } ?>
                <?php } ?>

                <?php if (have_rows('topbarphones', 'option')) { ?>
                    <?php while (have_rows('topbarphones', 'option')) {
                        the_row(); ?>
                            <a href="<?php the_sub_field('top_bar_phone_link');?>" target="_blank">
                                <i class="bi bi-telephone-fill"></i><?php the_sub_field('top_bar_phone');?></a>
                    <?php } ?>
                <?php } ?>

                <?php if (have_rows('physical_adress', 'option')) {
                    while (have_rows('physical_adress', 'option')) {
                        the_row(); ?>
                            <div class="physical_adress"><i class="bi bi-geo-alt-fill"></i> <?php the_sub_field('short_physical_adress');?></div>
                    <?php } ?>
                <?php } ?>
            </div>
            <!-- END Contacts Info Area -->

            <!-- Socials Area Start -->
            <div class="col-sm-3 col-md-2 col-xl-2 footer_socials">
                <?php if( have_rows('social_links', 'option') ): ?>
                    <?php while( have_rows('social_links', 'option') ) : the_row(); ?>
                        <a target="_blank" href="<?php the_sub_field('url'); ?>">
                                <i class="bi <?php the_sub_field('service_ico'); ?>"></i>
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- END Socials Area Start -->

            <!-- Ordering Area Start -->
            <div class="col-sm-12 col-md-4 col-xl-3 footer_ordering">
                <?php if (  get_field( 'orderind_area_title', 'option') ) :?>
                    <?php $orderind_title = get_field('orderind_area_title', 'option'); ?>
                    <h3><?php echo $orderind_title;?></h3>
                <?php endif ?>

                <?php if( have_rows('orderind_link', 'option') ): ?>
                    <?php while( have_rows('orderind_link', 'option') ) : the_row(); ?>
                        <a target="_blank" href="<?php the_sub_field('url'); ?>">
                            <?php the_sub_field('link_text'); ?> <i class="bi bi-arrow-right"></i>
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- END Ordering Area -->

        </div>
    </div>

</footer>
 <!-- Footer Area End -->