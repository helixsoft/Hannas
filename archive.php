<?php
/**
 * The template for displaying Archive pages
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
			<?php if ( have_posts() ) : ?>
				<h1 class="title" align="center">
					<?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'Hannas' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'Hannas' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'Hannas' ) ) );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'Hannas' ), get_the_date( _x( 'Y', 'yearly archives date format', 'Hannas' ) ) );
					else :
						_e( 'Archives', 'Hannas' );
					endif;
					?>
				</h1>
				<div id="container">
				<?php /* The loop */ ?>
				<?php 
					while ( have_posts() ) : the_post(); 
					preg_match_all('/<a[^>]+><img[^>]+>/i',$post->post_content, $result);
					$nbImg=count($result[0]);
					if(count($result[0])==0){
						preg_match_all('/<img[^>]+>/i',$post->post_content, $result);
						$nbImg=count($result[0]);
					}
				?>
				  	<div class="item" id="<?php echo $post->ID ?>">
				  		<a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php echo $nbImg?> images in <?php echo $post->post_title;?>">
				  			<?php
								$sFirstImage = catch_first_post_image($post);
								if ( has_post_thumbnail()) {
									$url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail-image-item');;
									if(files_exist($url[0])){
										echo get_the_post_thumbnail($post->ID, 'thumbnail-image-item'); 
									}else{
										$string='sites/'.get_current_blog_id().'/';
										echo '<img src=\''.files_urlchange($url[0],$string).'\'>';
									}
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