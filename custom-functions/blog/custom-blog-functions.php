<?php
  function wpdocs_excerpt_more( $more ) {
      return '...';
  }
  add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

  function wpdocs_custom_excerpt_length( $length ) {
      return 60;
  }
  add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

  function how_long_will_post_take_to_read($postContentLength) {

  	if( $postContentLength > 0 && $postContentLength < 3000) {
  		echo 'A Short read';
  	}

  	else if( $postContentLength > 3001 && $postContentLength < 6000 ) {
  		echo 'A Medium Read';
  	}

  	else {
  		echo 'A Long Read';
  	}

  }

  // this logs whenever someone visits a post. This creates the 'popular' Posts on the Blog page
  // Create a function to log the amount of views for 'single posts'
  function wpb_set_post_views($postID) {
  	$count_key = 'wpb_post_views_count';
  	$count = get_post_meta($postID, $count_key, true);
  	if($count==''){
  		$count = 0;
  		delete_post_meta($postID, $count_key);
  		add_post_meta($postID, $count_key, '0');
  	}else{
  		$count++;
  		update_post_meta($postID, $count_key, $count);
  	}
  }

  //To keep the count accurate, lets get rid of prefetching
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

  // function to get the total amount of views of a post
  function wpb_get_post_views($postID){
      $count_key = 'wpb_post_views_count';
      $count = get_post_meta($postID, $count_key, true);
      if($count==''){
          delete_post_meta($postID, $count_key);
          add_post_meta($postID, $count_key, '0');
          return "0 View";
      }
      return $count.' Views';
  }
?>
