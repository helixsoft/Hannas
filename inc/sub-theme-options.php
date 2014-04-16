<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

$list_blog = array();
$list_blog = theme_option_list_blog();
/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      
    ),
    'sections'        => array( 
      array(
        'id'          => 'theme_settings',
        'title'       => __( 'Theme Settings', 'Hannas' )
      )
    ),
    'settings'        => array( 
             array(
        'id'          => 'blog_logo',
        'label'       => __( 'Blog Logo', 'Hannas' ),
        'desc'        => sprintf( __("<img src='http://helixsoft.in/hannas/wp-content/themes/Hannas/images/bloglogo.png' width='333' >") ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
        array(
        'id'          => 'page_name',
        'label'       => __( 'About Page Text', 'Hannas' ),
        'desc'        => __( 'Select page Text', 'Hannas' ),
        'std'         => 'about HANNA',
        'type'        => 'text',
        'section'     => 'theme_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
        array(
        'id'          => 'page_select',
        'label'       => __( 'Page Select', 'Hannas' ),
        'desc'        => __( 'Select About Page', 'Hannas' ),
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'theme_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
        array(
        'id'          => 'blog_archive_select',
        'label'       => __( 'Blog Archive', 'Hannas' ),
        'desc'        => __( 'The Select Archive list you want', 'Hannas' ),
        'std'         => 'yearly',
        'type'        => 'select',
        'section'     => 'theme_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'yearly',
            'label'       => __( 'yearly', 'Hannas' ),
            'src'         => ''
          ),
          array(
            'value'       => 'monthly',
            'label'       => __( 'monthly', 'Hannas' ),
            'src'         => ''
          ),
           array(
            'value'       => 'weekly',
            'label'       => __( 'weekly', 'Hannas' ),
            'src'         => ''
          ),
          array(
            'value'       => 'daily',
            'label'       => __( 'daily', 'Hannas' ),
            'src'         => ''
          ),
        )
      ),
      array(
        'id'          => 'archive_number_slider',
        'label'       => __( 'Number of archive', 'Hannas' ),
        'desc'        => __( 'Select Number of archive', 'Hannas' ),
        'std'         => '6',
        'type'        => 'numeric-slider',
        'section'     => 'theme_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '1,10,1',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}