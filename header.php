<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?> > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  	<title><?php wp_title( '|', true, 'right' ); ?></title>
  	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  	<link rel="shortcut icon" href=""  type="image/x-icon"/>
  	<?php wp_head();?>
</head>
<body>
	<div class="container">
		<header>
			<div class="logo"><a href="<?php echo get_site_url(1) ?>"><img src="<?php echo IMAGES?>/hannasroom_logo.png"></a></div>
			<?php 
			if (function_exists(clean_custom_menus())) clean_custom_menus();
			if (function_exists(clean_custom_resposive_menus())) clean_custom_responsive_menus();
			?>
		</header>