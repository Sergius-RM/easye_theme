<?php
/**
 * The template for displaying header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
?>

<?php if ( have_rows( 'sections' ) ) : ?>
    <?php while ( have_rows('sections' ) ) : the_row();
        if ( get_row_layout() == 'hero' || get_row_layout() == 'page_header') :
            $color_mode = 'darkmode';
            $navbar_style = 'navbar-dark';
        ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php else:?>
    <?php $color_mode = 'lightmode';
        $navbar_style = 'navbar-light';?>
<?php endif; ?>

<!-- Start main Header -->
<header class="header_area full-width <?php print $color_mode;?>" role="banner">
    <!--Header-Upper-->
    <div class="site-header">
        <div class="site-branding d-flex">

            <span class="navbar-brandlogo_area no_mobile">
                <span class="header-logo-darkmode">
                    <?php the_custom_logo();?>
                </span>

                <a href="/" class="header-logo-lightmode">
                    <?php
                    $header_logo = get_theme_mod('header_logo');
                    $img = wp_get_attachment_image_src($header_logo, 'full');
                    if ($img) :
                        ?>
                        <img src="<?php echo $img[0]; ?>" alt="">
                    <?php endif; ?>
                </a>
            </span>

            <!-- Main Menu -->
            <nav class="site-navigation">
                <div class="no_mobile" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
                </div>
            </nav>
            <!-- Main Menu End-->

            <!-- Mobile Menu -->
            <div class="navbar <?php print $navbar_style;?> is_onmobile">
                <span class="navbar-brandlogo_area">
                    <span class="header-logo-darkmode">
                        <?php the_custom_logo();?>
                    </span>

                    <a href="/" class="header-logo-lightmode">
                        <?php
                        $header_logo = get_theme_mod('header_logo');
                        $img = wp_get_attachment_image_src($header_logo, 'full');
                        if ($img) :
                            ?>
                            <img src="<?php echo $img[0]; ?>" alt="">
                        <?php endif; ?>
                    </a>
                </span>
                <div class="collapse mob_menu" id="navbarToggleExternalContent">
                    <div class="text-center" role="navigation">
                        <?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
                    </div>
                </div>

                <button class="navbar-toggler is_onmobile" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <!-- Mobole Menu End-->
        </div>
    </div>
    <!--End Header Upper-->
</header>
