<?php if ( function_exists( 'ot_get_option' ) ) { ?>
	<?php if(ot_get_option( 'instagram_username')) { ?>
		<div class="latest-text">LATEST INSTAGRAM</div>
		<div id="icontainer">
			<?php foreach (scrape_instagram(ot_get_option( 'instagram_username'),ot_get_option( 'number_of_instagram_in_single')) as $key => $value) { ?>
			<div class="item" >
			  	<a href="<?php echo $value['link']?>" title="<?php echo $value['description']?>">
			  		<img src="<?php echo $value['thumbnail']['url']?>">
			  		<div class="hover-area">
						<div class="count"><?php echo $value['likes']?></div>
						<div class="text-area">
							<div class="title"><?php echo $value['description']?></div>
							<div class="author">COMMENTS: <?php echo $value['comments']?></div>
						</div>
					</div>
			  	</a>
			</div>
			<?php } ?>
		</div>
	<?php } ?>
<?php } ?>