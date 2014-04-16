			<nav class="blog_nav">
				<ul>
					<?php if ( function_exists( 'ot_get_option' ) ) { ?>
						<?php if(ot_get_option( 'page_select')) { ?>
							<?php if(ot_get_option( 'page_text')) { ?>
								<li><a href="<?php echo get_permalink(ot_get_option( 'page_select'));?>"><?php echo ot_get_option( 'page_name');?></a></li>
							<?php } else { ?>
								<li><a href="<?php echo get_permalink(ot_get_option( 'page_select'));?>">about HANNA</a></li>
							<?php } ?>
						<?php } else { ?>
							<?php if(ot_get_option( 'page_text')) { ?>
								<li><a href="#"><?php echo ot_get_option( 'page_name');?></a></li>
							<?php } else { ?>
								<li><a href="#">about HANNA</a></li>
							<?php } ?>
						<?php } ?>
					<?php } ?>
					<li>
						<a href="#">LATEST POSTS<span class="arrow"></span></a>
						<ul class="sub-menu">
							<?php
								$args = array( 'posts_per_page' => 6 );
								$lastposts = get_posts( $args );
								foreach ( $lastposts as $post ) :
								  setup_postdata( $post ); ?>
									<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endforeach; 
								wp_reset_postdata(); 
							?>
						</ul>
					</li>
					<li>
						<a href="#">CATEGORIES<span class="arrow"></span></a>
						<ul class="sub-menu">
							<?php $args = array(
								'show_option_all'    => '',
								'orderby'            => 'name',
								'order'              => 'ASC',
								'style'              => 'list',
								'show_count'         => 0,
								'hide_empty'         => 1,
								'use_desc_for_title' => 1,
								'child_of'           => 0,
								'feed'               => '',
								'feed_type'          => '',
								'feed_image'         => '',
								'exclude'            => '',
								'exclude_tree'       => '',
								'include'            => '',
								'hierarchical'       => 1,
								'title_li'           => __( '' ),
								'show_option_none'   => __( '' ),
								'number'             => 6,
								'echo'               => 1,
								'depth'              => 0,
								'current_category'   => 0,
								'pad_counts'         => 0,
								'taxonomy'           => 'category',
								'walker'             => null
							); ?>
							<?php wp_list_categories( $args ); ?>
						</ul>
					</li>
					<li>
						<a href="#">ARCHIVES<span class="arrow"></span></a>
						<ul class="sub-menu">
							<?php
								if(ot_get_option( 'page_select')) { 
									if(ot_get_option( 'blog_archive_select')) {
										$args = array(
										'type'            => ot_get_option( 'blog_archive_select'),
										'limit'           => ot_get_option( 'archive_number_slider'),
										'format'          => 'html', 
										'before'          => '',
										'after'           => '',
										'show_post_count' => false,
										'echo'            => 1,
										'order'           => 'DESC'
										);
									}
								} 
							?>
							<?php wp_get_archives( $args ); ?> 
						</ul>
					</li>
				</ul>
			</nav>
			<div id="blog-menu" class="dl-menuwrapper blog-menu">
				<button class="dl-trigger">Open Menu</button>
				<ul class="dl-menu">
					<?php if ( function_exists( 'ot_get_option' ) ) { ?>
						<?php if(ot_get_option( 'page_select')) { ?>
							<?php if(ot_get_option( 'page_text')) { ?>
								<li><a href="<?php echo get_permalink(ot_get_option( 'page_select'));?>"><?php echo ot_get_option( 'page_name');?></a></li>
							<?php } else { ?>
								<li><a href="<?php echo get_permalink(ot_get_option( 'page_select'));?>">about HANNA</a></li>
							<?php } ?>
						<?php } else { ?>
							<?php if(ot_get_option( 'page_text')) { ?>
								<li><a href="#"><?php echo ot_get_option( 'page_name');?></a></li>
							<?php } else { ?>
								<li><a href="#">about HANNA</a></li>
							<?php } ?>
						<?php } ?>
					<?php } ?>
					<li>
						<a href="#">LATEST POSTS</a>
						<ul class="dl-submenu">
							<?php
								$args = array( 'posts_per_page' => 6 );
								$lastposts = get_posts( $args );
								foreach ( $lastposts as $post ) :
								  setup_postdata( $post ); ?>
									<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endforeach; 
								wp_reset_postdata(); 
							?>
						</ul>
					</li>
					<li>
						<a href="#">CATEGORIES</a>
						<ul class="dl-submenu">
							<?php $args = array(
								'show_option_all'    => '',
								'orderby'            => 'name',
								'order'              => 'ASC',
								'style'              => 'list',
								'show_count'         => 0,
								'hide_empty'         => 1,
								'use_desc_for_title' => 1,
								'child_of'           => 0,
								'feed'               => '',
								'feed_type'          => '',
								'feed_image'         => '',
								'exclude'            => '',
								'exclude_tree'       => '',
								'include'            => '',
								'hierarchical'       => 1,
								'title_li'           => __( '' ),
								'show_option_none'   => __( '' ),
								'number'             => 6,
								'echo'               => 1,
								'depth'              => 0,
								'current_category'   => 0,
								'pad_counts'         => 0,
								'taxonomy'           => 'category',
								'walker'             => null
							); ?>
							<?php wp_list_categories( $args ); ?>
						</ul>
					</li>
					<li>
						<a href="#">ARCHIVES</a>
						<ul class="dl-submenu">
							<?php
								if(ot_get_option( 'page_select')) { 
									if(ot_get_option( 'blog_archive_select')) {
										$args = array(
										'type'            => ot_get_option( 'blog_archive_select'),
										'limit'           => ot_get_option( 'archive_number_slider'),
										'format'          => 'html', 
										'before'          => '',
										'after'           => '',
										'show_post_count' => false,
										'echo'            => 1,
										'order'           => 'DESC'
										);
									}
								} 
							?>
							<?php wp_get_archives( $args ); ?> 
						</ul>
					</li>
				</ul>
			</div><!-- /dl-menuwrapper -->