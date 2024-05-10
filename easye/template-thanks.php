<?php
/**
 * Template name: Thanks Page Template
 *
 */

get_header();
?>

<section class="hero-section-two contacts-section bgs-cover pt-40 rpt-80" style="background-image: url('http://greative2/wp-content/uploads/2022/06/head_gradient-3.png');margin-bottom: -6vw;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3"></div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="hero-content pl-50 py-220 rpy-120">
                    <?php get_template_part( 'template-parts/main-sections' ); ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3"></div>
        </div>
    </div>
</section>

<?php
get_footer();