<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 */

get_header(); ?>
<div class="blog_container">
			<div class="blog_logo" align="center">
				<?php if ( function_exists( 'ot_get_option' ) ) { ?>
					<?php if(ot_get_option( 'blog_logo')) { ?>
						<a href="<?php echo site_url()?>" ><img src="<?php echo ot_get_option( 'blog_logo') ?>" title="<?php bloginfo('name'); ?>"></a>
					<?php } else { ?>
						<a href="<?php echo site_url()?>" ><img src="<?php echo IMAGES?>/bloglogo.png" ></a>
					<?php } ?>
				<?php } ?>
			</div>
			<?php
				get_template_part( 'blog-nav');
			?>
			<h1 class="title" align="center"><?php _e( 'Not found', 'Hannas' ); ?></h1>
			<div class="my-content">
				<p><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'Hannas' ); ?></p>
			</div>
<?php get_footer(); ?>