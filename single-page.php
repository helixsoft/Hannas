<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h1 class="title" align="center"><a href="<?php echo get_permalink() ?>"><?php the_title()?></a></h1>
<h6 class="date" align="center"><?php the_date('l j M Y') ?></h6>
<div class="thumbnail-area">
	<a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php echo $post->post_title;?>">
		<?php
			$sFirstImage = catch_first_post_image();
			if ( has_post_thumbnail()) {
				echo get_the_post_thumbnail($post->ID, 'full'); 
			}else if($sFirstImage!=''){
				echo '<img src=\''.$sFirstImage.'\'>';
			}else{
				echo '<img src=\''.IMAGES.'/blogimage.jpg'.'\'>';
			}
		?>	
	</a>
</div>
<div class="my-content">
	<?php the_content();?>
</div>
<div class="blog-info">
	<span>DATE</span> <?php echo get_the_date('Y-m-d') ?>  | <span>CATEGORY</span> <?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'Hannas' ) ); ?> | <span>TAGS</span> <?php the_tags('',',','') ?> | <span>SHARES</span>
</div>
</article>