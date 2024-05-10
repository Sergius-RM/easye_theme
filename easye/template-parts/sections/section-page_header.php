<?php
$image = get_sub_field('header_background_img');
?>

<!-- Page Header Section Start -->
<section class="page_header_section" >
    <div class="banner_overlay"></div>
    <div class="page_header_container container-fluid" style="<?php if (get_sub_field( 'header_background_img')): ?>background-image: url('<?php echo esc_url($image['url']); ?>');<?php endif;?>">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-6 mx-auto text-center center-area">
                <h1 class="hero_title mx-auto">
                    <?php echo get_sub_field('header_title_h1');?>
                </h1>
                <?php if (get_sub_field( 'content')): ?>
                    <span class="page_header_content d-block mx-auto">
                        <?php echo get_sub_field('content');?>
                    </span>
                <?php endif;?>
                <?php if (get_sub_field( 'hero_link_url')): ?>
                    <a class="read_more_link" href="<?php echo get_sub_field('hero_link_url');?>"><?php echo get_sub_field('hero_link_text');?></a>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
<!-- Page Header Section End -->