<?php
/**
 * Category Template: Special
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
		        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		        if($paged==1){?>
		    	<?php if ( have_posts() ) : ?>
					<?php
					// Start the Loop.
					$cat_id=get_cat_ID( single_cat_title( '', false )); 
					$arg=array(
						'posts_per_page' => 1,
						'cat' => $cat_id
					);
					query_posts( $arg );
					while ( have_posts() ) : the_post();?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h1 class="title" align="center"><a href="<?php echo get_permalink() ?>"><?php the_title()?></a></h1>
							<h6 class="date" align="center"><?php the_date('l j M Y') ?></h6>
							<div class="my-content">
								<?php the_content();?>
							</div>
							<?php $tempPostId=get_the_ID();?>
							<div class="blog-info">
								<span>DATE</span> <?php echo get_the_date('Y-m-d') ?>  | <span>CATEGORY</span> <?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'Hannas' ) ); ?> | <?php if(has_tag()) { ?><span>TAGS</span> <?php the_tags('',',','') ?> | <?php } ?> <span>SHARE</span>
							</div>
							<table class="blog-info-mobile">
								<tr>
								  <th><span>Date</span></th>
								  <th><span>CATEGORY</span></th>		
								  <?php if(has_tag()) { ?><th><span>TAG</span></th> <?php } ?>
								  <th><span>Share</span></th>
								</tr>
								<tr>
								  <td><?php echo get_the_date('Y-m-d') ?></td>
								  <td><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'Hannas' ) ); ?></td>
								  <?php if(has_tag()) { ?><td><?php the_tags('',',','') ?></td><?php } ?>
								  <td></td>
								</tr>
							</table>
						</article>
						<?php global $withcomments; $withcomments = true; comments_template('',true); ?>
				<?php endwhile; ?>
				<?php endif; ?>
		    <?php } ?>
		    <?php wp_reset_query(); ?>
			<?php if ( have_posts() ) : ?>
				<div class="latest-text">LATEST POSTS</div>
		
				<div id="container">
				
				<?php 
					$i=0;
					while ( have_posts()) : the_post(); 
					preg_match_all('/<a[^>]+><img[^>]+>/i',$post->post_content, $result);
					$nbImg=count($result[0]);
					if(count($result[0])==0){
						preg_match_all('/<img[^>]+>/i',$post->post_content, $result);
						$nbImg=count($result[0]);
					}
				?>
				<?php 
					if($paged==1 && $i==0){
					}else{ ?>
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
				  <?php } $i++;?>
				<?php endwhile; ?>
				</div>
				<?php hannas_paging_nav(); ?>
			<?php endif;?>
<?php get_footer(); ?>