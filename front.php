<?php
/*
Template Name: Front Page
*/
get_header(); ?>
		<?php if ( function_exists( 'ot_get_option' ) ) { ?>
			<?php if(ot_get_option( 'first_on_off','on')=='on') { ?>
					<?php selected_site(ot_get_option('first_select'),ot_get_option( 'exclude_cat')); ?>
			<?php } ?>
		<?php } ?>
		<?php if ( function_exists( 'ot_get_option' ) ) { ?>
			<?php if(ot_get_option( 'featured_on_off','on')=='on') { ?>
				<?php 
					featured_post(ot_get_option('featured_post_id'),ot_get_option('featured_select'))
				?>
			<?php } ?>
		<?php } ?>
		<?php if ( function_exists( 'ot_get_option' ) ) { ?>
			<?php if(ot_get_option( 'pick_on_off','on')=='on') { ?>
				<?php 
					if(ot_get_option( 'pick_type' ,'no')=='no') {
						if(ot_get_option('pick_category_select')) {
							list_post(ot_get_option('pick_category_select'),ot_get_option( 'pick_site_checkbox'));
						}
					}
					if(ot_get_option( 'pick_type' ,'yes')=='yes'){
						latest_post(ot_get_option( 'pick_site_checkbox'));
					}
				?>	
			<?php } ?>
		<?php } ?>
		<?php if ( function_exists( 'ot_get_option' ) ) { ?>
			<?php if(ot_get_option( 'video_on_off','on')=='on') { ?>
				<div class="featuredVideo">
					<div class="vendor">
					<?php if(ot_get_option('video')){
						echo ot_get_option('video');
					}
					?>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
<?php get_footer('front');?>
	