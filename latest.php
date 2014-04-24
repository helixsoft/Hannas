<div class="latest-text">LATEST POSTS</div>
<?php
if ( is_single() ) {
  	$cats = wp_get_post_categories($post->ID);
  	if( is_multisite() ){
		if(is_main_site( get_current_blog_id() )){
			if ( function_exists( 'ot_get_option' ) ) { 
				if(ot_get_option( 'exclude_cat')){
					$result=array_intersect($cats,explode(',',implode('',explode("-", ot_get_option( 'exclude_cat')))));
					if(!empty($result)){
						 $args=array(
					      'post__not_in' => array($post->ID),
					      'showposts'=>20,
					      'caller_get_posts'=>1,
					      'category__in'=>$result[0]
					    );
					}else{
						$args=array(
					      'post__not_in' => array($post->ID),
					      'showposts'=>20,
					      'caller_get_posts'=>1,
					      'cat'=>'cat='.ot_get_option( 'exclude_cat')
					    );
					}	
				}else{
					$args=array(
				      'post__not_in' => array($post->ID),
				      'showposts'=>20,
				      'caller_get_posts'=>1
				    );
				}
			}
		}else{
			$args=array(
		      'post__not_in' => array($post->ID),
		      'showposts'=>20,
		      'caller_get_posts'=>1
		    );
		}
	}
    
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) { ?>
      <div id="container">
      <?php
      while ($my_query->have_posts()) : $my_query->the_post();
      	preg_match_all('/<a[^>]+><img[^>]+>/i',$post->post_content, $result);
		$nbImg=count($result[0]);
      ?>
        <div class="item" id="<?php echo $post->ID ?>">
	  		<a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php echo $nbImg?> images in <?php echo $post->post_title;?>">
	  			<?php
					$sFirstImage = catch_first_post_image($post);
					if ( has_post_thumbnail()) {
						echo get_the_post_thumbnail($post->ID, 'thumbnail-image-item'); 
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
       <?php
      endwhile;
      ?>
      </div>
      <?php
  } //if ($cats)
  wp_reset_query();  // Restore global post data stomped by the_post().
} //if (is_single())
?>
