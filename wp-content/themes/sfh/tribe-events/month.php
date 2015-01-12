<?php
/**
 * Month View Template
 * The wrapper template for month view. 
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */
 
remove_filter('tribe_events_after_footer', array('TribeiCal', 'maybe_add_link'), 10, 1);

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php do_action( 'tribe_events_before_template' ) ?>


<div class="wrapper">
  <div class="container_9">
    <article class="inside withPadding">
      
      <!-- Main Events Content -->
      <?php tribe_get_template_part('month/content'); ?>
      <!-- Tribe Bar -->
      <?php 
        //tribe_get_template_part( 'modules/bar' ); 
      ?>
      
    </article>
  </div>
</div>


<?php do_action( 'tribe_events_after_template' ) ?>
