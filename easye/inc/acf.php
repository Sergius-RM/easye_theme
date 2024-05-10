<?php
/**
 * ACF Functions
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Add options page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        [
            'page_title' => __('Site Settings', 'greatcompany'),
            'menu_title' => __('Site Settings', 'greatcompany'),
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false,
        ]
    );
}


/**
 * Register ACF blocks
 */
function acf_init_block_types() {

    if (function_exists('acf_register_block_type')) {

        /**
         * Hero block
         */
        acf_register_block_type(
            array(
                'name'              => 'hero',
                'title'             => __('Hero'),
                'description'       => __('Hero boxes'),
                'render_callback'   => 'render_hero_block',
                'category'          => 'embed',
                'icon'              => 'id-alt',
                'keywords'          => array('hero'),
                'multiple'          => true,
                'mode'              => 'edit',
            )
        );

        /**
         * Hero Slider block
         */
        acf_register_block_type(
            array(
                'name'              => 'heroslider',
                'title'             => __('Hero Slider'),
                'description'       => __('Hero boxes'),
                'render_callback'   => 'render_heroslider_block',
                'category'          => 'embed',
                'icon'              => 'id-alt',
                'keywords'          => array('hero'),
                'multiple'          => true,
                'mode'              => 'edit',
            )
        );

        /**
         * Post block
         */
        acf_register_block_type(
            array(
                'name'              => 'selected-pages',
                'title'             => __('Posts List'),
                'description'       => __('Posts list boxes'),
                'render_callback'   => 'render_postlist_block',
                'category'          => 'embed',
                'icon'              => 'excerpt-view',
                'keywords'          => array('posts'),
                'multiple'          => true,
                'mode'              => 'edit',
            )
        );

        /**
         * Image Gallery block
         */
        acf_register_block_type(
            array(
                'name'              => 'imagegallery',
                'title'             => __( 'Image Gallery' ),
                'description'       => __( 'Image Gallery block' ),
                'render_callback'   => 'render_imagegallery_block',
                'category'          => 'embed',
                'icon'              => 'format-gallery',
                'keywords'          => array( 'image gallery' ),
                'multiple'          => true,
                'mode'              => 'edit',
            )
        );

        /**
         * Carousel block
         */
        acf_register_block_type(
            array(
                'name'              => 'carousel',
                'title'             => __( 'Carousel' ),
                'description'       => __( 'List of images for an image carousel' ),
                'render_callback'   => 'render_carousel_block',
                'category'          => 'embed',
                'icon'              => 'images-alt',
                'keywords'          => array('carousel images'),
                'multiple'          => true,
                'mode'              => 'edit',
            )
        );

        /**
         * Image + Text  block
         */
        acf_register_block_type(
            array(
                'name'              => 'imageinfobox',
                'title'             => __( 'Image+Text' ),
                'description'       => __( 'Image+Text block' ),
                'render_callback'   => 'render_imageinfobox_block',
                'category'          => 'embed',
                'icon'              => 'format-gallery',
                'keywords'          => array( 'image + text ' ),
                'multiple'          => true,
                'mode'              => 'edit',
            )
        );

        /**
         * Link block
         */
        acf_register_block_type(
            array(
                'name'              => 'linkblock',
                'title'             => __( 'Link' ),
                'description'       => __( 'Link block' ),
                'render_callback'   => 'render_linkblock_block',
                'category'          => 'embed',
                'icon'              => 'format-gallery',
                'keywords'          => array( 'image gallery' ),
                'multiple'          => true,
                'mode'              => 'edit',
            )
        );

        /**
         * Heading block
         */
        acf_register_block_type(
            array(
                'name'              => 'headingtitle',
                'title'             => __( 'Heading' ),
                'description'       => __( 'Heading block' ),
                'render_callback'   => 'render_headingtitle_block',
                'category'          => 'embed',
                'icon'              => 'format-gallery',
                'keywords'          => array( 'image gallery' ),
                'multiple'          => true,
                'mode'              => 'edit',
            )
        );

        /**
         * Info-Box block
         */
        acf_register_block_type(
            array(
                'name'              => 'infobox',
                'title'             => __( 'Info-Box' ),
                'description'       => __( 'Info-Box' ),
                'render_callback'   => 'render_infobox_block',
                'category'          => 'embed',
                'icon'              => 'images-alt',
                'keywords'          => array('info box'),
                'multiple'          => true,
                'mode'              => 'edit',
            )
        );

        /**
         * WooProducts List block
         */
        acf_register_block_type(
            array(
                'name'              => 'wooproductslist',
                'title'             => __( 'WooProducts List' ),
                'description'       => __( 'WooProducts List' ),
                'render_callback'   => 'render_wooproductslist_block',
                'category'          => 'embed',
                'icon'              => 'images-alt',
                'keywords'          => array('info box'),
                'multiple'          => true,
                'mode'              => 'edit',
            )
        );
    }
}

add_action( 'acf/init', 'acf_init_block_types' );

/**
 * Hero Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function render_hero_block ( $block, $content = '', $is_preview = false, $post_id = 0 ) {

    // Load values and assing defaults.
    $hero_title = get_field('hero_title');
    $hero_text = get_field('hero_text');
    $hero_button = get_field('hero_button');
    $hero_button_link = get_field('hero_button_link');
    $hero_img = get_field('hero_img');

    ?>

      <div class="container is_hero">
        <div class="row">

          <div class="col-sm">
            <h1><?php echo $hero_title; ?></h1>
            <div class="hero_text"><?php echo $hero_text; ?></div>
            <a class="hero_btn" href="<?php echo $hero_button_link; ?>" target="_blanl"><?php echo $hero_button; ?></a>
          </div>
          <div class="col-sm" style="background: url(<?php echo $hero_img; ?>) 50% 50% no-repeat; background-size: contain;">
          </div>

        </div>
      </div>

    <?php
}

/**
 * Posts List Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function render_postlist_block ( $block, $content = '', $is_preview = false, $post_id = 0 ) {

    $posts_list_title = get_field( 'posts_list_title' );
    $number = get_field( 'numberposts' );
    $categoryname = get_field( 'categoryname' );
    $orderby = get_field( 'orderby' );
    $order = get_field( 'order' );
    $columns = get_field( 'posts_list_columns' );

    global $post;
    $myposts = get_posts( array(
        'posts_per_page'    => $number,
        'category_name'  => $categoryname,
        'orderby'        =>  $orderby,
        'order'          => $order,
    ) );
    ?>

    <div class="container posts_list_block">
        <div class="row">
            <h3><?php echo $posts_list_title; ?></h3>
            <?php
            if ( have_posts() ) :
            query_posts($myposts);
            while (have_posts()) : the_post();
            ?>
                <div class="<?php if ( get_field( 'posts_list_columns') ) :?>col-sm-<?php echo $columns;?><?php endif ?> post">
                        <?php the_post_thumbnail(); ?>
                    <div>
                        <div class="date">
                            <span>
                                <strong><p><?php the_category(', '); ?></p></strong>
                            </span>
                            <span><?php the_date(); ?></span>
                        </div>

                        <div class="content">
                            <a href="<?php the_permalink(); ?>">
                                <h3 class="title">
                                    <?php the_title(); ?>
                                </h3>
                            </a>

                            <div class="text">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>

                    </div>
                </div>

            <?php  endwhile;
            endif;
            wp_reset_query();
            ?>
        </div>
    </div>
<?php
}


/**
 * Carousel Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function render_carousel_block ( $block, $content = '', $is_preview = false, $post_id = 0 ) {
    ?>

    <?php if( have_rows('carousel_images') ): ?>
    <div class="carousel_images" id="base">
        <?php while ( have_rows('carousel_images') ) : the_row(); ?>
        <div class="item">

            <img width="100%" src="<?php the_sub_field('image'); ?>">

            </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>

<?php
}


/**
 * Image Gallery Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function render_imagegallery_block ( $block, $content = '', $is_preview = false, $post_id = 0 ) {

    $gallery_title = get_field( 'gallery_title' );
    $gallery_columns = get_field( 'gallery_columns' );
    $gallery_fullwidth = get_field( 'gallery_fullwidth' );

    ?>

    <?php if( have_rows('image_gallery_block') ): ?>
        <div class="image_gallery_block <?php if ( $gallery_fullwidth == 'fullwidth' ) :?>fullwidth<?php else:?>boxed<?php endif;?>">

                <?php if ( get_field( 'gallery_title') ) :?><h3><?php echo $gallery_title;?></h3><?php endif;?>
                    <?php $item = 1 ;?>
                <?php while ( have_rows('image_gallery_block') ) : the_row(); ?>
                    <div class="item item-<?php echo $item++ ;?>">
                        <img src="<?php the_sub_field('image'); ?>">
                    </div>
                <?php endwhile; ?>

        </div>
      <?php endif; ?>

    <?php
}

/**
 * Hero Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function render_linkblock_block ( $block, $content = '', $is_preview = false, $post_id = 0 ) {

    // Load values and assing defaults.
    $b_link_text = get_field('b_link_text');
    $b_link_url = get_field('b_link_url');

    ?>

        <div class="container">
            <div class="row">
                <div class="title_wrap">
                    <a href="<?php echo $b_link_url;?>"><h3><?php echo $b_link_text;?></h3></a>
                </div>
            </div>
        </div>
    <?php
}

/**
 * Heading Title Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function render_headingtitle_block ( $block, $content = '', $is_preview = false, $post_id = 0 ) {

    // Load values and assing defaults.
    $heading_tag = get_field('heading_tag');
    $heading_title = get_field('heading_title');

    ?>

        <div class="container">
            <div class="row">
                <div class="header_title_wrap">
                    <<?php echo $heading_tag;?>>
                        <?php echo $heading_title;?>
                    </<?php echo $heading_tag;?>>
                </div>
            </div>
        </div>
    <?php
}


/**
 * Hero Slider Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function render_heroslider_block ( $block, $content = '', $is_preview = false, $post_id = 0 ) {
    ?>

    <div class="slider_wrap">
    </div>
        <div class="container hero_slider">
            <div class="row">
                <?php if( have_rows('hero_slider_images') ): ?>
                <div class="hero_slider_images" id="base">
                    <?php while ( have_rows('hero_slider_images') ) : the_row(); ?>
                        <div class="item">
                            <img width="100%" src="<?php the_sub_field('image'); ?>">
                            <?php if ( get_sub_field( 'title') ) :?>
                                <div class="item-content">
                                    <h3><?php the_sub_field('title'); ?></h3>
                                    <p><?php the_sub_field('text'); ?></p>

                                    <?php if ( get_sub_field( 'link_text') ) :?>
                                        <a class="readmore_link" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('link_text'); ?></a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endwhile; ?>
                </div>

                <?php endif; ?>
            </div>
        </div>

<?php
}


/**
 * Info Box Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function render_infobox_block ( $block, $content = '', $is_preview = false, $post_id = 0 ) {
    ?>

        <div class="container info-box">
            <div class="row">
                <?php if( have_rows('info-box') ): ?>

                    <?php while ( have_rows('info-box') ) : the_row(); ?>

                        <div class="col-lg-3 col-sm-6 item" style="background: url(<?php the_sub_field('background'); ?>) 50% 50% no-repeat; background-size: cover;">
                           <a href="<?php the_sub_field('link'); ?>">
                            <div class="item-content">
                            <i class="bi bi-caret-down-fill"></i>
                                <h3><?php the_sub_field('title'); ?></h3>
                                <p><?php the_sub_field('text'); ?></p>
                            </div>
                        </a>
                        </div>

                    <?php endwhile; ?>

                <?php endif; ?>
            </div>
        </div>

<?php
}

/**
 * WooProducts List Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function render_wooproductslist_block ( $block, $content = '', $is_preview = false, $post_id = 0 ) {

    $wooposts_list_title = get_field( 'wooposts_list_title' );
    $woonumberposts = get_field( 'woonumberposts' );
    $woocategoryname = get_field( 'woocategoryname' );
    $wooorderby = get_field( 'wooorderby' );
    $wooorder = get_field( 'wooorder' );
    $wooposts_list_columns = get_field( 'wooposts_list_columns' );

    global $post;
    $loop = new WP_Query( array(
		'numberposts' => -1,
        'category_name' => $woocategoryname,
		//'posts_per_page' => $woonumberposts,
        'post_type' => 'product',
        'attribute' => 'paivamaara',
		'meta_key'	=> 'start_date',
        'orderby' => $wooorderby,
		//'order' => 'DESC',
        'order' => $wooorder,		
	) );

    ?>

    <div class="container wooposts_list">

        <?php if ( get_field( 'wooposts_list_title') ) :?>
        <div class="woo_title_wrap">
            <h3><?php echo $wooposts_list_title; ?></h3>
        </div>
        <?php endif;?>

        <style>
            .prods > a {
                display: none;
            }
            .prods > a:nth-child(-n+<?php echo $woonumberposts; ?> ) {
                display: block;
            }
        </style>
        <div class="prods">
        <?php while ( $loop->have_posts() ): $loop->the_post(); ?>
            <?php
                global $product;
                $enddate = substr($product->get_attribute('paivamaara'), -10);
                // echo strtotime($enddate), "\n";
                $today = date('d.m.Y');
                // echo strtotime($today), "\n";
            ?>

            <?php if(strtotime($enddate) < strtotime($today)) :?>
                <!-- event is over -->
            <?php else:?>
                <?php get_field('date');?>
                <a  class="wooposts_list_link" href="<?php the_permalink(); ?>">
                    <div class="row woo_post">
                        <div class="col-sm-2 date">
                            <span>
                                <?php global $product;
                                    echo $product->get_attribute('paivamaara'); ?>
                            </span>
                        </div>

                        <div class="col-sm-8 content">
                            <h3 class="title">
                                <?php the_title(); ?>
                            </h3>
                            <?php /*
                            <div class="text">
                                <?php the_excerpt(); ?>
                            </div>
                            */ ?>
                        </div>

                        <div class="col-sm-2 readmore">
                            <i class="bi bi-caret-right-fill"></i>Hae koulutukseen!
                            <br>
                            <?php echo $product->get_price_html(); ?>

                        </div>
                    </div>
                </a>
            <?php endif;?>

        <?php  endwhile;?>
        </div>

    </div>
<?php
}

/**
 * Image+Text  Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function render_imageinfobox_block ( $block, $content = '', $is_preview = false, $post_id = 0 ) {

    $post_image = get_field( 'post_image' );
    $post_img_header = get_field( 'post_img_header' );
	$post_img_text = get_field( 'post_img_text' );
    ?>

    <div class="container img-info-box">
        <div class="row">
            <img class="info-img" src="<?php echo $post_image; ?>">
            <div class="info-context">
			<span style="display: block;"><strong><?php echo $post_img_header; ?></strong></span>
			<?php echo $post_img_text; ?>
			</div>
        </div>
    </div>

<?php
}