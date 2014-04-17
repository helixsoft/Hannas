</div>
	<div class="contributors clearfix">
		<div class="container down">
			<?php if ( function_exists( 'ot_get_option' ) ) { ?>
				<?php if(ot_get_option( 'contributors_on_off')=='on') { ?>
					<h1 class="contributors-text">CONTRIBUTORS</h1>
					<?php select_contributer(ot_get_option( 'contributors_site_checkbox')); ?>
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