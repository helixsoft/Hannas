<?php
/**
 * The Template for displaying all single posts.
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
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					get_template_part( 'single-page', get_post_format() );
					comments_template();
					get_template_part( 'latest');
				endwhile;
			?>

<?php get_footer(); ?>