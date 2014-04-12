</div>
	<div class="contributors clearfix">
		<div class="container down">
			<?php if ( function_exists( 'ot_get_option' ) ) { ?>
				<?php if(ot_get_option( 'contributors_on_off','on')=='on') { ?>
					<h1 class="contributors-text">CONTRIBUTORS</h1>
					<div class="contributors-box clearfix">
						<div class="thumbnail-image-cont">
							<a href="#">
								<img src="<?php echo IMAGES?>/con1.jpg">
								<div class="hover-area">
									<div class="count">3</div>
									<div class="text-area">
										<div class="title">TITLE OF POST</div>
										<div class="author">TUSHAR</div>
									</div>
								</div>
							</a>
						</div>
						<div class="thumbnail-image-cont">
							<a href="#">
								<img src="<?php echo IMAGES?>/con2.jpg">
								<div class="hover-area">
									<div class="count">3</div>
									<div class="text-area">
										<div class="title">TITLE OF POST</div>
										<div class="author">TUSHAR</div>
									</div>
								</div>
							</a>
						</div>
						<div class="thumbnail-image-cont">
							<a href="#">
								<img src="<?php echo IMAGES?>/con3.jpg">
								<div class="hover-area">
									<div class="count">3</div>
									<div class="text-area">
										<div class="title">TITLE OF POST</div>
										<div class="author">TUSHAR</div>
									</div>
								</div>
							</a>
						</div>
						<div class="thumbnail-image-cont">
							<a href="#">
								<img src="<?php echo IMAGES?>/con4.jpg">
								<div class="hover-area">
									<div class="count">3</div>
									<div class="text-area">
										<div class="title">TITLE OF POST</div>
										<div class="author">TUSHAR</div>
									</div>
								</div>
							</a>
						</div>
						<div class="thumbnail-image-cont">
							<a href="#">
								<img src="<?php echo IMAGES?>/con5.jpg">
								<div class="hover-area">
									<div class="count">3</div>
									<div class="text-area">
										<div class="title">TITLE OF POST</div>
										<div class="author">TUSHAR</div>
									</div>
								</div>
							</a>
						</div>
						<div class="thumbnail-image-cont">
							<a href="#">
								<img src="<?php echo IMAGES?>/con6.jpg">
								<div class="hover-area">
									<div class="count">3</div>
									<div class="text-area">
										<div class="title">TITLE OF POST</div>
										<div class="author">TUSHAR</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
			<footer class="clearfix">
				<hr class="big-line"></hr>
				<div class="left">copyright 2014 Hannasroom</div>
				<div class="right">something else maybe</div>
			</footer>
		</div>
	</div>
	<?php wp_footer();?>
</body>
</html>