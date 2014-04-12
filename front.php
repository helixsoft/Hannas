<?php
/*
Template Name: Front Page
*/
get_header(); ?>
<?php if( is_multisite() ): ?>

   The <?php echo esc_html( get_site_option( 'site_name' ) ); ?> network currently powers <?php echo get_blog_count(); ?> websites and <?php echo get_user_count(); ?> users.
	<?php
		
	?>    

<?php endif; ?>
		<?php if ( function_exists( 'ot_get_option' ) ) { ?>
			<?php if(ot_get_option( 'first_on_off','on')=='on') { ?>
				<?php 
					$original_blog_id = get_current_blog_id();
					if(ot_get_option('first_select')){
						switch_to_blog(ot_get_option('first_select')); //switched to blog with blog_id $bid
					}
			        $args = array(
						'posts_per_page'   => 5,
						'offset'           => 0,
						'category'         => '',
						'orderby'          => 'post_date',
						'order'            => 'DESC',
						'include'          => '',
						'exclude'          => '',
						'meta_key'         => '',
						'meta_value'       => '',
						'post_type'        => 'post',
						'post_mime_type'   => '',
						'post_parent'      => '',
						'post_status'      => 'publish',
						'suppress_filters' => true );
			        $posts = get_posts($arg);
				?>
				<div class="latest">
					<?php 
						$i=1; 
						$lenght=count($posts);
						foreach($posts as $post){
					    setup_postdata( $post );
					    $attachments = get_children(array('post_parent'=>$post->ID));
						$nbImg = count($attachments);
					?>
						<?php if($i==1 || $i==2) { ?><div class="col"><?php } ?>
						<?php if($i==1) { ?><div class="thumbnail-image-large"> <?php } if($i>1) { ?><div class="thumbnail-image-small"><?php } ?>
								<a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php the_title();?>">
									<?php 
										if ( has_post_thumbnail()) {
											echo get_the_post_thumbnail($post->ID, 'full'); 
										}else{
											echo '<img src=\''.IMAGES.'/blog1.jpg'.'\'>';
										}	
									?>
									<div class="hover-area">
										<div class="count"><?php echo $nbImg ?></div>
										<div class="text-area">
											<div class="title"><?php the_title();?></div>
											<div class="author">BY: <?php the_author();?></div>
										</div>
									</div>
								</a>
							</div>
						<?php if($i==1 || $i==$lenght) { ?> </div><?php } ?>
					<?php 
						$i++;}
					?>
				</div>
				<?php
					switch_to_blog( $original_blog_id ); //switched back to current blog
				?>
			<?php } ?>
		<?php } ?>
		<?php if ( function_exists( 'ot_get_option' ) ) { ?>
			<?php if(ot_get_option( 'featured_on_off','on')=='on') { ?>
				<?php 
					$original_blog_id = get_current_blog_id();
					$post_id=ot_get_option('featured_post_id'); 
					if(ot_get_option('featured_select')){
						switch_to_blog(ot_get_option('featured_select')); //switched to blog with blog_id $bid
					}
					if($post_id){
			        	$post = get_post($post_id);
			    	}
			    	$attachments = get_children(array('post_parent'=>$post->ID));
					$nbImg = count($attachments);
				?>
				<div class="featured">
					<a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php echo $post->post_title;?>">
						<?php 
							if ( has_post_thumbnail($post->ID)) {
								echo get_the_post_thumbnail($post->ID, 'full'); 
							}else{
								echo '<img src=\''.IMAGES.'/byus.jpg'.'\'>';
							}	
						?>
						<div class="hover-area">
							<div class="count"><?php echo $nbImg ?></div>
							<div class="text-area">
								<div class="title"><?php echo $post->post_title;?></div>
								<div class="author">BY: <?php the_author($post->ID);?></div>
							</div>
						</div>
					</a>
				</div>
				<?php
					switch_to_blog( $original_blog_id ); //switched back to current blog
				?>
			<?php } ?>
		<?php } ?>
		<?php if ( function_exists( 'ot_get_option' ) ) { ?>
			<?php if(ot_get_option( 'pick_on_off','on')=='on') { ?>
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
			<?php if(ot_get_option( 'video_on_off','on')=='on') { ?>
				<div class="featured">
					<?php if(ot_get_option('video')){
						echo ot_get_option('video');
					}
					?>
				</div>
			<?php } ?>
		<?php } ?>
<?php get_footer('front');?>
	