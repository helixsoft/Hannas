<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 */

get_header(); ?>
<div class="blog_container">
			<div class="blog_logo" align="center">
				<?php if ( function_exists( 'ot_get_option' ) ) { ?>
					<?php if(ot_get_option( 'blog_logo')) { ?>
						<a href="<?php echo site_url()?>" ><img src="ot_get_option( 'blog_logo')" title="<?php bloginfo('name'); ?>"></a>
					<?php } else { ?>
						<a href="<?php echo site_url()?>" ><img src="<?php echo IMAGES?>/bloglogo.png" ></a>
					<?php } ?>
				<?php } ?>
			</div>
			<nav class="blog_nav">
				<ul>
					<li><a href="#">about HANNA</a></li>
					<li>
						<a href="#">LATEST POSTS<span class="arrow"></span></a>
						<ul class="sub-menu">
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
						</ul>
					</li>
					<li>
						<a href="#">CATEGORIES<span class="arrow"></span></a>
						<ul class="sub-menu">
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
						</ul>
					</li>
					<li>
						<a href="#">ARCHIVES<span class="arrow"></span></a>
						<ul class="sub-menu">
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<div id="blog-menu" class="dl-menuwrapper blog-menu">
				<button class="dl-trigger">Open Menu</button>
				<ul class="dl-menu">
					<li>
						<a href="#">about HANNA</a>
					</li>
					<li>
						<a href="#">LATEST POSTS</a>
						<ul class="dl-submenu">
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
						</ul>
					</li>
					<li>
						<a href="#">CATEGORIES</a>
						<ul class="dl-submenu">
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
						</ul>
					</li>
					<li>
						<a href="#">ARCHIVES</a>
						<ul class="dl-submenu">
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
							<li><a href="#">Happy Friday</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /dl-menuwrapper -->
			<h1 class="title" align="center"><?php _e( 'Not found', 'Hannas' ); ?></h1>
			<div class="my-content">
				<p><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'Hannas' ); ?></p>
			</div>
<?php get_footer(); ?>