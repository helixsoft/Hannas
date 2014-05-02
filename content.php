<?php  
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
