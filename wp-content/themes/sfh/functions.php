<?php

//---------------------------------------------------------------------------------
//	Aktivera olika inbyggda funktioner
//---------------------------------------------------------------------------------

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

//---------------------------------------------------------------------------------
//	Bildformat
//---------------------------------------------------------------------------------

add_image_size( 'topImage', 711, 355, true );

//---------------------------------------------------------------------------------
//	Date Icon
//---------------------------------------------------------------------------------

// From ordinary post (ex. front page)
function the_dateIcon($post , $displayTime = true) {
  $eventDate = strtotime( $post->EventStartDate ); ?>
  <div class="dateIcon">
	  <div class="day"><?php echo date('d',  $eventDate); ?></div>
	  <div class="month"><?php echo date('M',  $eventDate); ?></div>
	  <?php if( $displayTime ) { ?>
	    <div class="time"><?php echo date('G:i',  $eventDate); ?></div>
	  <?php } ?>
  </div>
<?php }

// From inside the tribe plugin (ex. details pages)
function event_dateIcon( $event = null, $displayTime = true, $dateFormat = '' ) {
  if ( is_null( $event ) ) {
      global $post;
      $event = $post;
  }
  if ( is_numeric( $event ) )
      $event = get_post( $event );

  if( tribe_event_is_all_day( $event ) )
       $displayTime = false;

  if( empty($event->EventStartDate) && is_object( $event ) )
      $event->EventStartDate = tribe_get_event_meta( $event->ID, '_EventStartDate', true );

  if( isset($event->EventStartDate) ){
      $date = strtotime( $event->EventStartDate );
  }else{
      return; // '&mdash;';
  }

  //return tribe_event_format_date($date, $displayTime, $dateFormat );
  ?>
  <div class="dateIcon">
	  <div class="day"><?php echo date('d',  $date); ?></div>
	  <div class="month"><?php echo date('M',  $date); ?></div>
	  <?php if( $displayTime ) { ?>
	    <div class="time"><?php echo date('G:i',  $date); ?></div>
	  <?php } ?>
  </div>
<?php
}


function get_cat_list($post) {
	$event_cat = wp_get_post_terms($post->ID, 'tribe_events_cat');
	$event_cat_list = array();
	foreach( $event_cat as $cat ) {
		array_push( $event_cat_list, $cat->name );
	}
  return join(', ', $event_cat_list);
}

//---------------------------------------------------------------------------------
//	Aktivera widgets
//---------------------------------------------------------------------------------

if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'before_widget' => '<section>',
	'after_widget' => '</section>',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
));


//---------------------------------------------------------------------------------
//	Inkludera jQuery från Google
//---------------------------------------------------------------------------------

if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"), false);
	wp_enqueue_script('jquery');
}


//---------------------------------------------------------------------------------
//	Ta bort blandat skräp från head
//---------------------------------------------------------------------------------

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


//---------------------------------------------------------------------------------
//	Lägg till Google Analytics i footern, ändra UA-XXXXX-X till din egen tracking-kod
//---------------------------------------------------------------------------------
/*
function add_google_analytics() {
	echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');
*/

?>