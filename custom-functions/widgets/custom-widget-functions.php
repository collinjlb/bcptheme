<?php
  // Sidebar 1
  function register_widget_areas() {
      // Sidebar 1
      register_sidebar( array(
        'name'          => __( 'Widget Area', 'This-is-the-theme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Sidebar for Shop.', 'This-is-the-theme' ),
        'before_widget' => '',
        'after_widget' => ''
      ));

      // Sidebar 2
      register_sidebar( array(
        'name'          => __( 'Widget Area', 'This-is-the-theme' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Sidebar for Child Pages.', 'This-is-the-theme' ),
        'before_widget' => '',
        'after_widget' => ''
      ));
  }
  add_action( 'widgets_init', 'register_widget_areas');

  //shortcode for sidebar 1
  add_shortcode('add_widget_to_view_template', 'widget_to_view_template');
  function widget_to_view_template($atts, $content = '') {
    return the_widget( 'sidebar-1', 'dropdown=1&count=1' );
  }

  // add this piece of code to a template file for the widget area | ADD < > |
  //
  //        ?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?
  //          ?php dynamic_sidebar('sidebar-1'); ?
  //        ?php endif ?

  // This removes automatic theme and plugin updates
  define( 'WP_AUTO_UPDATE_CORE', false );
  add_filter( 'auto_update_plugin', '__return_false' );
?>
