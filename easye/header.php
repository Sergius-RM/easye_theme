<?php
/**
 * The template for displaying the header
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>

<!DOCTYPE html>
<html
    <?php language_attributes(); ?>
    class="no-js"
>

    <head>
        <?php if (  get_field( 'google_analytics', 'option') ) :?>
            <?php $headcode = get_field('google_analytics', 'option');
                print $headcode;?>
        <?php endif ?>
        <meta charset="<?php bloginfo('charset'); ?>">
		<meta name="facebook-domain-verification" content="dfs7nbc4jndkkz3vy714w9v0fp8d1u" />
        <?php $viewport_content = apply_filters('hello_elementor_viewport_content', 'width=device-width, initial-scale=1'); ?>
        <meta
            name="viewport"
            content="<?php echo esc_attr($viewport_content); ?>"
        >
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>

    </head>

    <body <?php body_class();?>>

        <?php if (  get_field( 'google_analytics_body', 'option') ) :?>
            <?php $bodycode = get_field('google_analytics_body', 'option');
                print $bodycode; ?>
        <?php endif ?>

        <?php wp_body_open();
            get_template_part('template-parts/header');
        ?>
