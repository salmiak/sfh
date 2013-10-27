<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 * 
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @since  2.1
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

$event_id = get_the_ID();

?>

  <div id="singlePage" class="wrapper">
    <div class="container_6">
    
    <?php while ( have_posts() ) :  the_post(); 
      $post = get_post( $event_id); ?>
 
  		<article class="inside withPadding">
		    <?php echo get_the_post_thumbnail( $post_id, 'topImage', array( 'class' => 'topimg responsive' ) ) ?>
  		  <div class="content">
  		    <?php the_dateIcon( $post ); ?>
    		  <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h1>
  		    <div class="cats"><?php echo get_cat_list($post);  ?></div>
  		    <?php the_content() ?>
  		  </div>
  		  
  		</article>
  		<div class="clear"></div>
      
    <?php endwhile; ?>
      
      <!-- NOT USED 
      
      All events link <a href="<?php echo tribe_get_events_link() ?>"> <?php _e( '&laquo; All Events', 'tribe-events-calendar' ) ?></a>
      Recurring info <?php tribe_events_event_recurring_info_tooltip(); ?>
      
      -->
    
    </div>
    <div class="container_3"><div class="inside">
    		<?php get_sidebar(); ?>
    </div></div>
    <div class="clear"></div>
  </div>
