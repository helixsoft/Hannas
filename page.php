<?php
/**
 * The template for displaying all pages
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
			</div><!-- /dl-menuwrapper -->
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="title" align="center"><a href="<?php echo get_permalink() ?>"><?php the_title()?></a></h1>
					<div class="my-content">
						<?php the_content();?>
					</div>
				</article>
			<?php
				endwhile;
			?>
<?php get_footer(); ?>