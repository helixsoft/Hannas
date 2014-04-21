<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h1 class="title" align="center"><a href="<?php echo get_permalink() ?>"><?php the_title()?></a></h1>
<h6 class="date" align="center"><?php the_date('l j M Y') ?></h6>
<div class="my-content">
	<?php the_content();?>
</div>
<div class="blog-info">
	<span>DATE</span> <?php echo get_the_date('Y-m-d') ?>  | <span>CATEGORY</span> <?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'Hannas' ) ); ?> | <?php if(has_tag()) { ?><span>TAGS</span> <?php the_tags('',',','') ?> | <?php } ?> <span>SHARE</span>
</div>
</article>