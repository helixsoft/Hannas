<?php
/**
 * The template for displaying Tag pages
 *
 */

get_header(); ?>
<div class="blog_container">
			<div class="blog_logo" align="center">
				<?php if ( function_exists( 'ot_get_option' ) ) { ?>
					<?php if(ot_get_option( 'blog_logo')) { ?>
						<a href="<?php echo site_url()?>" ><img src="ot_get_option( 'blog_logo')" title="<?php bloginfo('name'); ?>"></a>
					<?php } else { ?>
						<a href="<?php echo site_url()?>" ><img src="<?php echo IMAGES?>/bloglogo.png" ></a>
					<?php } ?>
				<?php } ?>
			</div>
			<?php
				get_template_part( 'blog-nav');
			?>
			<?php if ( have_posts() ) : ?>
				<h1 class="title" align="center"><?php printf( __( 'Tag Archives: %s', 'Hannas' ), single_tag_title( '', false ) ); ?></h1>
				<div id="container">
				<?php /* The loop */ ?>
				<?php 
					while ( have_posts() ) : the_post(); 
					$attachments = get_children(array('post_parent'=>$post->ID));
					$nbImg = count($attachments);
				?>
				  	<div class="item" id="<?php echo $post->ID ?>">
				  		<a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php echo $post->post_title;?>">
				  			<?php
								$sFirstImage = catch_first_post_image();
								if ( has_post_thumbnail()) {
									echo get_the_post_thumbnail($post->ID, 'full'); 
								}else if($sFirstImage!=''){
									echo '<img src=\''.$sFirstImage.'\'>';
								}else{
									echo '<img src=\''.IMAGES.'/late1.jpg'.'\'>';
								}
							?>	
				  			<div class="hover-area">
								<div class="count"><?php echo $nbImg;?></div>
								<div class="text-area">
									<div class="title"><?php echo $post->post_title;?></div>
									<div class="author">BY: <?php echo get_userdata($post->post_author)->display_name;?></div>
								</div>
							</div>
				  		</a>
				  	</div>
				<?php endwhile; ?>
				</div>
				<?php hannas_paging_nav(); ?>
			<?php endif; ?>
<?php get_footer(); ?>