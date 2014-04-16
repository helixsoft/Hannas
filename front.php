<?php
/*
Template Name: Front Page
*/
get_header(); ?>
		<?php if ( function_exists( 'ot_get_option' ) ) { ?>
			<?php if(ot_get_option( 'first_on_off')=='on') { ?>
				<?php selected_site(ot_get_option('first_select')); ?>
			<?php } ?>
		<?php } ?>
		<?php if ( function_exists( 'ot_get_option' ) ) { ?>
			<?php if(ot_get_option( 'featured_on_off')=='on') { ?>
				<?php 
					featured_post(ot_get_option('featured_post_id'),ot_get_option('featured_select'))
				?>
			<?php } ?>
		<?php } ?>
		<?php if ( function_exists( 'ot_get_option' ) ) { ?>
			<?php if(ot_get_option( 'pick_on_off')=='on') { ?>
				<?php 
					if(ot_get_option( 'pick_type' ,'no')=='no') {
						if(ot_get_option('pick_category_select')) {
							list_post(ot_get_option('pick_category_select'));
						}
					}
					if(ot_get_option( 'pick_type' ,'yes')=='yes'){
						latest_post();
					}
				?>	
			<?php } ?>
		<?php } ?>
		<?php if ( function_exists( 'ot_get_option' ) ) { ?>
			<?php if(ot_get_option( 'video_on_off')=='on') { ?>
				<div class="featured">
					<?php if(ot_get_option('video')){
						echo ot_get_option('video');
					}
					?>
				</div>
			<?php } ?>
		<?php } ?>
<?php get_footer('front');?>
	