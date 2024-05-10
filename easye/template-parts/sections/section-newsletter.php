<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$h2span = get_sub_field('contactus_subtitle_h4');
$header = get_sub_field('contactus_title_h2');
$content = get_sub_field('contactus_content_area');
?>

<!-- Contact US Section Start -->
<section class="newsletter_section wrap_two_columns">
    <div class="container">
        <div class="row mx-auto section_two_columns">

            <div class="col-md-6 col-lg-6 contactus_content">
                <div class="about-content">
					<?php if ($h2span): ?>
                    	<h4 class="sub-title"><?php echo $h2span;?></h4>
					<?php endif; ?>
					<?php if ($header): ?>
                    	<h2><?php echo $header;?></h2>
					<?php endif; ?>
                    <?php if ($content): ?>
						<p><?php echo $content;?></p>
					<?php endif; ?>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 contactus_form">
                <?php if (get_sub_field('contactus_shortcode_form')):?>
                    <?php $form_id = get_sub_field('contactus_shortcode_form');?>
                    <?php echo do_shortcode('[gravityform id="'. $form_id .'" title="false" description="false" ajax="true"]');?>
                <?php endif;?>
            </div>

        </div>
    </div>
	<hr class="divider">
</section>
<!-- Contact US Section End -->