<div class="latest-text">LATEST POSTS</div>
<?php
if ( is_single() ) {
  $cats = wp_get_post_categories($post->ID);
    $args=array(
      'post__not_in' => array($post->ID),
      'showposts'=>20,
      'caller_get_posts'=>1
    );
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) { ?>
      <div id="container">
      <?php
      while ($my_query->have_posts()) : $my_query->the_post();
      	preg_match_all('/<a[^>]+><img[^>]+>/i',$post->post_content, $result);
		$nbImg=count($result[0]);
      ?>
        <div class="item" id="<?php echo $post->ID ?>">
	  		<a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php echo $post->post_title;?>">
	  			<?php
					$sFirstImage = catch_first_post_image($post);
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
       <?php
      endwhile;
      ?>
      </div>
      <?php
  } //if ($cats)
  wp_reset_query();  // Restore global post data stomped by the_post().
} //if (is_single())
?>
