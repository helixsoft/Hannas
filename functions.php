<?php
/*****************************************************************************/
/*Define Constants*/
/*****************************************************************************/

define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES',THEMEROOT. '/images');
function Hannas_setup() {
	/*
	 * Makes voyage available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'twentythirteen' to the name of your theme in all
	 * template files.
	 */
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// This theme uses wp_nav_menu() in one location.
	if( is_multisite() ){
		if(is_main_site( get_current_blog_id() )){
			register_nav_menu( 'primary', __( 'Navigation Menu', 'Hannas' ) );
		}
	}
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'thumbnail-image-large', 383);
}

add_action( 'after_setup_theme', 'Hannas_setup' );

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'new-mid-size', 660); //(cropped)
	add_image_size( 'new-small-size', 490); //(cropped)
}
add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
	$addsizes = array(
		"new-mid-size" => __( "Width 660"),
		"new-small-size" => __( "Width 490" ),
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}

/**
* Enqueue Scripts and Styles for Front-End
*/
function Hannas_assets() {
		wp_enqueue_script('jquery');
		wp_enqueue_style( 'styles', get_template_directory_uri().'/style.css',false,'0.0.0.1', 'all' );
		// Load JavaScripts jquery.fitvids
		wp_enqueue_script( 'modernizr', get_template_directory_uri().'/js/modernizr.js',false, '2.6.2',true);
		wp_enqueue_script('smoothScroll',get_template_directory_uri().'/js/SmoothScroll.js',false,'0.9.9',true);
		wp_enqueue_script( 'device', get_template_directory_uri() . '/js/device.min.js', false,'0.1.57', true);
		wp_enqueue_script( 'dlmenu', get_template_directory_uri() . '/js/jquery.dlmenu.js', false,'1.0.1', true);
		wp_enqueue_script('masonry',get_template_directory_uri() . '/js/masonry.pkgd.min.js',array('jquery'),null,true);
		wp_enqueue_script('infinite',get_template_directory_uri() . '/js/jquery.infinitescroll.min.js',array('jquery'),null,true);
		wp_enqueue_script('fitvids',get_template_directory_uri() . '/js/jquery.fitvids.js',array('jquery'),'1.1',true);
		wp_enqueue_script('main',get_template_directory_uri() . '/js/main.js',array('jquery'),null,true);
		// Load Google Fonts API
		wp_enqueue_style( 'google-fonts-roboto', 'http://fonts.googleapis.com/css?family=Roboto:900' ,false,null,false);
		wp_enqueue_style( 'google-fonts-lato', 'http://fonts.googleapis.com/css?family=Lato:300,400,900,400italic,900italic' ,false,null,false);
}

add_action( 'wp_enqueue_scripts', 'Hannas_assets' );

if ( ! function_exists( 'Hannas_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 */
function Hannas_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<div class="nav-links">

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '', 'Hannas' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( '', 'Hannas' ) ); ?></div>
		<?php endif; ?>

	</div><!-- .nav-links -->
	<?php
}
endif;

if ( ! function_exists( 'Hannas_post_nav' ) ) :
/**
 * Displays navigation to next/previous post when applicable.
*/
function Hannas_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<div class="nav-links">
        <div class="nav-previous">
          	<?php previous_post_link( '%link', _x('Previous Post','test1','VoyageTravel' ) ); ?>
        </div>
        <div class="nav-next">
           	<?php next_post_link( '%link', _x( 'Next Post','test2','VoyageTravel' ) ); ?>
        </div>
     </div>
	<?php
}
endif;
/**
 * Loads a set of CSS and/or Javascript documents. 
 */
function Hannas_enqueue_admin_scripts($hook) {
	wp_register_style( 'ot-admin-custom', get_template_directory_uri() . '/inc/css/ot-admin-custom.css' );
	if ( $hook == 'appearance_page_ot-theme-options' ) {
		wp_enqueue_style( 'ot-admin-custom' );
	}

	wp_register_style( 'admin.custom', get_template_directory_uri() . '/inc/css/admin.custom.css' );
	if( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' ) 
		return;
	wp_enqueue_style( 'admin.custom' );
}
add_action( 'admin_enqueue_scripts', 'Hannas_enqueue_admin_scripts' );
/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
if( is_multisite() ):
	if(is_main_site( get_current_blog_id() )){
		include_once( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );
	}else{
		include_once( trailingslashit( get_template_directory() ) . 'inc/sub-theme-options.php' );
	}
endif; 
include_once( trailingslashit( get_template_directory() ) . 'inc/resize.php' );
// Get URL of first image in a post
function catch_first_post_image($post) {
  $first_img = '';
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  if(isset($matches[1][0])){
  	$first_img = $matches [1][0];
	   return $first_img;          // Everything appears to have gone well. Continue as normal!
  }
}
function list_blog(){
	$list=wp_get_sites();
	$blog_id_and_name=array();
	$i=0;
	foreach ($list as $key) {
		$blog_id_and_name[$i]['id']=$key['blog_id'];
		$blog_id_and_name[$i]['name']=get_blog_name_from_id($key['blog_id']);
		$i++;
	}
	return $blog_id_and_name;
}
function get_blog_name_from_id($id){
	return get_blog_details($id,true)->blogname;
}

function theme_option_list_blog(){
	$arg = array();
	$i=0;
	foreach (list_blog() as $key) {
		$arg[$i]= array(
            'value'       => $key['id'],
            'label'       => __( $key['name'], 'Hannas' ),
            'src'         => ''
        );
		$i++;
	}
	return $arg;
}
function list_category(){
	global $wpdb;
	$query = "SELECT * FROM ( ";
	for ($i=1; $i <= get_blog_count(); $i++) { 
	 	if($i==1){
	 		$query.="SELECT name  FROM {$wpdb->prefix}terms UNION DISTINCT ";
	 	}else if($i>1 && $i<get_blog_count() ){
	 		$query.="SELECT name FROM {$wpdb->prefix}{$i}_terms UNION DISTINCT ";
	 	}else{
	 		$query.="SELECT name FROM {$wpdb->prefix}{$i}_terms";
	 	}
	}
	$query.=" ) new ORDER BY name ASC";
	$result = $wpdb->get_results($query); 
	$arg = array();
	$i=0;
	foreach ($result as $key) {
		$arg[$i]= array(
            'value'       => $key->name,
            'label'       => __( $key->name, 'Hannas' ),
            'src'         => ''
        );
		$i++;
	}
	return $arg;
}
function list_post($name,$list){
	global $wpdb;
	$original_blog_id = get_current_blog_id();
	$query = "SELECT * FROM ( ";
	$i=1;
	if(!empty($list)){
		foreach ($list as $key) { 
			if($key==1){
		 		$query.="SELECT a.ID AS ID , '{$key}' AS blog_id , post_date FROM {$wpdb->prefix}posts a , {$wpdb->prefix}term_relationships b , {$wpdb->prefix}terms c WHERE ( a.ID = b.object_id AND b.term_taxonomy_id = c.term_id AND c.name='{$name}') UNION ALL ";
		 	}else if($key>1 && $i<count($list)){
		 		$query.="SELECT a.ID AS ID , '{$key}' AS blog_id , post_date FROM {$wpdb->prefix}{$key}_posts a , {$wpdb->prefix}{$key}_term_relationships b , {$wpdb->prefix}{$key}_terms c WHERE ( a.ID = b.object_id AND b.term_taxonomy_id = c.term_id AND c.name='{$name}') UNION ALL ";
		 	}else{
		 		$query.="SELECT a.ID AS ID , '{$key}' AS blog_id , post_date FROM {$wpdb->prefix}{$key}_posts a , {$wpdb->prefix}{$key}_term_relationships b , {$wpdb->prefix}{$key}_terms c WHERE ( a.ID = b.object_id AND b.term_taxonomy_id = c.term_id AND c.name='{$name}')";
		 	}
		 	$i++;
		}
	} else {
		for ($i=1; $i <= get_blog_count(); $i++) { 
		 	if($i==1){
		 		$query.="SELECT a.ID AS ID , '{$i}' AS blog_id , post_date FROM {$wpdb->prefix}posts a , {$wpdb->prefix}term_relationships b , {$wpdb->prefix}terms c WHERE ( a.ID = b.object_id AND b.term_taxonomy_id = c.term_id AND c.name='{$name}') UNION ALL ";
		 	}else if($i>1 && $i<get_blog_count() ){
		 		$query.="SELECT a.ID AS ID , '{$i}' AS blog_id , post_date FROM {$wpdb->prefix}{$i}_posts a , {$wpdb->prefix}{$i}_term_relationships b , {$wpdb->prefix}{$i}_terms c WHERE ( a.ID = b.object_id AND b.term_taxonomy_id = c.term_id AND c.name='{$name}') UNION ALL ";
		 	}else{
		 		$query.="SELECT a.ID AS ID , '{$i}' AS blog_id , post_date FROM {$wpdb->prefix}{$i}_posts a , {$wpdb->prefix}{$i}_term_relationships b , {$wpdb->prefix}{$i}_terms c WHERE ( a.ID = b.object_id AND b.term_taxonomy_id = c.term_id AND c.name='{$name}')";
		 	}
		}
	}
	$query.=" ) new ORDER BY post_date DESC LIMIT 8";
	$result = $wpdb->get_results($query); 
	?>
	<div class="pick">
	<?php 
	foreach ($result as $key) {
		switch_to_blog($key->blog_id);
		$post = get_post($key->ID);
		preg_match_all('/<a[^>]+><img[^>]+>/i',$post->post_content, $result);
		$nbImg=count($result[0]);
		?>
		<div class="thumbnail-image-pick">
			<a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php echo $nbImg?> of images in <?php echo $post->post_title;?>">
				<?php 
					$sFirstImage = catch_first_post_image($post);
					if ( has_post_thumbnail($post->ID)) {
						echo get_the_post_thumbnail($post->ID, 'full'); 
					}else if($sFirstImage!=''){
						echo '<img src=\''.$sFirstImage.'\'>';
					}else{
						echo '<img src=\''.IMAGES.'/pick1.jpg'.'\'>';
					}
				?>
				<div class="hover-area">
					<div class="count"><?php echo $nbImg ?></div>
					<div class="text-area">
						<div class="title"><?php echo $post->post_title;?></div>
						<div class="author">BY: <?php echo get_userdata($post->post_author)->display_name;?></div>
					</div>
				</div>
			</a>
		</div>
		<?php
		switch_to_blog( $original_blog_id );
	}
	?>
	</div>
	<?php 
}

function latest_post($list){
	global $wpdb;
	$original_blog_id = get_current_blog_id();
	$query = "SELECT * FROM ( ";
	$i=1;
	if(!empty($list)){
		foreach ($list as $key) { 
		 	if($key==1){
		 		$query.="SELECT ID , '{$key}' AS blog_id , post_date FROM {$wpdb->prefix}posts WHERE post_status = 'publish' AND post_type = 'post' UNION ALL ";
		 	}else if($key>1 && $i<count($list) ){
		 		$query.="SELECT ID , '{$key}' AS blog_id , post_date FROM {$wpdb->prefix}{$key}_posts WHERE post_status = 'publish' AND post_type = 'post' UNION ALL  ";
		 	}else{
		 		$query.="SELECT ID , '{$key}' AS blog_id , post_date FROM {$wpdb->prefix}{$key}_posts WHERE post_status = 'publish' AND post_type = 'post' ";
		 	}
		 	$i++;
		} 
	} else {
		for ($i=1; $i <= get_blog_count(); $i++) { 
			if($i==1){
		 		$query.="SELECT ID , '{$i}' AS blog_id , post_date FROM {$wpdb->prefix}posts WHERE post_status = 'publish' AND post_type = 'post' UNION ALL ";
		 	}else if($i>1 && $i<get_blog_count() ){
		 		$query.="SELECT ID , '{$i}' AS blog_id , post_date FROM {$wpdb->prefix}{$i}_posts WHERE post_status = 'publish' AND post_type = 'post' UNION ALL  ";
		 	}else{
		 		$query.="SELECT ID , '{$i}' AS blog_id , post_date FROM {$wpdb->prefix}{$i}_posts WHERE post_status = 'publish' AND post_type = 'post' ";
		 	}
		 }
	}
	$query.=" ) new ORDER BY post_date DESC LIMIT 8";
	$result = $wpdb->get_results($query); 
	?>
	<div class="pick">
	<?php 
	foreach ($result as $key) {
		switch_to_blog($key->blog_id);
		$post = get_post($key->ID);
		preg_match_all('/<a[^>]+><img[^>]+>/i',$post->post_content, $result);
		$nbImg=count($result[0]);
		?>
		<div class="thumbnail-image-pick">
			<a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php echo $nbImg?> of images in <?php echo $post->post_title;?>">
				<?php 
					$sFirstImage = catch_first_post_image($post);
					if ( has_post_thumbnail($post->ID)) {
						echo get_the_post_thumbnail($post->ID, 'full'); 
					}else if($sFirstImage!=''){
						echo '<img src=\''.$sFirstImage.'\'>';
					}else{
						echo '<img src=\''.IMAGES.'/pick1.jpg'.'\'>';
					}	
				?>
				<div class="hover-area">
					<div class="count"><?php echo $nbImg ?></div>
					<div class="text-area">
						<div class="title"><?php echo $post->post_title;?></div>
						<div class="author">BY: <?php echo get_userdata($post->post_author)->display_name;?></div>
					</div>
				</div>
			</a>
		</div>
		<?php
		wp_reset_postdata();
		switch_to_blog( $original_blog_id );
	}
	?>
	</div>
	<?php 
}

function featured_post($post_id,$blog_id){
	$original_blog_id = get_current_blog_id();
	if($blog_id){
		switch_to_blog($blog_id); //switched to blog with blog_id $bid
	}
	if($post_id){
    	$post = get_post($post_id);
	}
	preg_match_all('/<a[^>]+><img[^>]+>/i',$post->post_content, $result);
	$nbImg=count($result[0]);
	?>
	<div class="featured">
		<a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php echo $nbImg?> of images in <?php echo $post->post_title;?>">
			<?php 
				$sFirstImage = catch_first_post_image($post);
				if ( has_post_thumbnail($post->ID)) {
					echo get_the_post_thumbnail($post->ID, 'full'); 
				}else if($sFirstImage!=''){
					echo '<img src=\''.$sFirstImage.'\'>';
				}else{
					echo '<img src=\''.IMAGES.'/byus.jpg'.'\'>';
				}	
			?>
			<div class="hover-area">
				<div class="count"><?php echo $nbImg ?></div>
				<div class="text-area">
					<div class="title"><?php echo $post->post_title;?></div>
					<div class="author">BY: <?php echo get_userdata($post->post_author)->display_name;?></div>
				</div>
			</div>
		</a>
	</div>
	<?php
	switch_to_blog( $original_blog_id ); //switched back to current blog
} 

function selected_site($blog_id){
	$original_blog_id = get_current_blog_id();
	if($blog_id){
		switch_to_blog($blog_id); //switched to blog with blog_id $bid
	}
    $args = array(
		'posts_per_page'   => 5,
		'offset'           => 0,
		'category'         => '',
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true );
    $posts = query_posts($args);
    ?>
	<div class="latest">
		<?php 
			$i=1; 
			$lenght=count($posts);
			foreach($posts as $post){
		    setup_postdata( $post );
			preg_match_all('/<a[^>]+><img[^>]+>/i',$post->post_content, $result);
			$nbImg=count($result[0]);
		?>
			<?php if($i==1 || $i==2) { ?><div class="col"><?php } ?>
			<?php if($i==1) { ?><div class="thumbnail-image-large"> <?php } if($i>1) { ?><div class="thumbnail-image-small"><?php } ?>
					<a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php echo $nbImg?> of images in <?php echo $post->post_title;?>">
						<?php 
							$sFirstImage = catch_first_post_image($post);
							if ( has_post_thumbnail($post->ID)) {
								echo get_the_post_thumbnail($post->ID, 'thumbnail-image-large'); 
							}else if($sFirstImage!=''){
								echo '<img src=\''.$sFirstImage.'\'>';
							}else{
								echo '<img src=\''.IMAGES.'/blog1.jpg'.'\'>';
							}	
						?>
						<div class="hover-area">
							<div class="count"><?php echo $nbImg ?></div>
							<div class="text-area">
								<div class="title"><?php echo $post->post_title;?></div>
								<div class="author">BY: <?php echo get_userdata($post->post_author)->display_name;?></div>
							</div>
						</div>
					</a>
				</div>
			<?php if($i==1 || $i==$lenght) { ?> </div><?php } ?>
		<?php 
			$i++;}
		?>
	</div>
	<?php
		switch_to_blog( $original_blog_id ); //switched back to current blog
}
function select_contributer($list){
?>
<div class="contributors-box clearfix">
<?php
	$original_blog_id = get_current_blog_id();
	foreach ($list as $key) {
		switch_to_blog($key);
		$args = array(
		'posts_per_page'   => 1,
		'offset'           => 0,
		'category'         => '',
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true );
    $posts = query_posts($args);
    foreach($posts as $post){
    	setup_postdata( $post );
    	preg_match_all('/<a[^>]+><img[^>]+>/i',$post->post_content, $result);
		$nbImg=count($result[0]);
?>

	<div class="thumbnail-image-cont">
		<a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php echo $nbImg?> of images in <?php echo $post->post_title;?>">
			<?php if ( function_exists( 'ot_get_option' ) ) { ?>
				<?php if(ot_get_option( 'author_pic')) { ?>
					<img src="<?php echo ot_get_option( 'author_pic')?>">
				<?php } else { ?>
					<img src="<?php echo IMAGES?>/con1.jpg">
				<?php } ?>
			<?php } ?>
			<div class="hover-area">
				<div class="count"><?php echo $nbImg ?></div>
				<div class="text-area">
					<div class="title"><?php echo $post->post_title;?></div>
					<div class="author"><?php echo get_userdata($post->post_author)->display_name;?></div>
				</div>
			</div>
		</a>
	</div>
	<?php } ?>
<?php
}
switch_to_blog( $original_blog_id ); //switched back to current blog
?>
</div>
<?php
}

function clean_custom_menus() {
	$original_blog_id = get_current_blog_id();
	switch_to_blog(1);
	$menu_name = 'primary'; // specify custom menu slug
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
	?>
	<nav>
    <?php
    $count = 0;
    $submenu = false;
    foreach( $menuitems as $item ):
        // get page id from using menu item object id
        $id = get_post_meta( $item->ID, '_menu_item_object_id', true );
        // set up a page object to retrieve page data
        $page = get_page( $id );
        $link = get_page_link( $id );

        // item does not have a parent so menu_item_parent equals 0 (false)
        if ( !$item->menu_item_parent ):

        // save this id for later comparison with sub-menu items
        $parent_id = $item->ID;
    ?>
    	<li><a href="<?php echo $link; ?>"><?php echo $page->post_title; ?></a>
    <?php endif; ?>
    <?php if ( $parent_id == $item->menu_item_parent ): ?>
    <?php if ( !$submenu ): $submenu = true; $k=0;$i=0;?>
            <ul class="sub-menu"><div class="sub-menu-text">our blogs</div>
    <?php endif; ?>
    		<?php if($i%4==0 && $k==1) { ?></div> <?php } ?>
    		<?php if($i%4==0 && $i >= 0) { ?> <div class="col"> <?php $k=1; } ?>
     		<li><a href="<?php echo $link; ?>"><?php echo $page->post_title; ?></a></li>
     		<?php $i++;?>
    <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
            <?php if($i%4!=0) { ?> </div> <?php } ?></ul>
    <?php $submenu = false; endif; ?>
    <?php endif; ?>
    <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
    	</li>                           
    <?php $submenu = false; endif; ?>
	<?php $count++; endforeach; ?>
	</nav>
	<?php
	switch_to_blog( $original_blog_id );
}

function clean_custom_resposive_menus() {
	$original_blog_id = get_current_blog_id();
	switch_to_blog(1);
	$menu_name = 'primary'; // specify custom menu slug
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
	?>
	<div id="dl-menu" class="dl-menuwrapper">
		<button class="dl-trigger">Open Menu</button>
		<ul class="dl-menu">
    <?php
    $count = 0;
    $submenu = false;
    foreach( $menuitems as $item ):
        // get page id from using menu item object id
        $id = get_post_meta( $item->ID, '_menu_item_object_id', true );
        // set up a page object to retrieve page data
        $page = get_page( $id );
        $link = get_page_link( $id );

        // item does not have a parent so menu_item_parent equals 0 (false)
        if ( !$item->menu_item_parent ):

        // save this id for later comparison with sub-menu items
        $parent_id = $item->ID;
    ?>
    	<li><a href="<?php echo $link; ?>"><?php echo $page->post_title; ?></a>
    <?php endif; ?>
    <?php if ( $parent_id == $item->menu_item_parent ): ?>
    <?php if ( !$submenu ): $submenu = true; ?>
            <ul class="dl-submenu">
    <?php endif; ?>
     		<li><a href="<?php echo $link; ?>"><?php echo $page->post_title; ?></a></li>
    <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
            </ul>
    <?php $submenu = false; endif; ?>
    <?php endif; ?>
    <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
    	</li>                           
    <?php $submenu = false; endif; ?>
	<?php $count++; endforeach; ?>
		</ul>
	</div>
	<?php
	switch_to_blog( $original_blog_id );
}

