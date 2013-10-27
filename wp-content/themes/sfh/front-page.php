<?php get_header(); ?>
  		  
<?php // The Query
$args = array(
  'posts_per_page' => 3,
  'post_type' => 'tribe_events',
  'meta_query' => array(
    array(
      'key'     => 'featured',
      'value'   => '1',
      'compare' => '=', //default
      'type'    => 'CHAR' //default
    )
  )
);
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) { ?>
		
	<div id="frontpageSlider" class="wrapper">
		<div class="container_9">
		  <div id="frontpageSliderContainer" class="cycle-slideshow" data-cycle-slides="> .slide" data-cycle-timeout="7000">
    		<div class="cycle-pager"></div>
    		
        <?php	while ( $the_query->have_posts() ) {
        		$the_query->the_post(); ?>
  		
    		<div class="slide">
    		  <?php the_dateIcon( $post ); ?>
      		<div class="container_6"><div class="frontpageSliderImgContainer">
        		 <?php echo get_the_post_thumbnail( $post_id, 'topImage', array( 'class' => 'withFiller' ) ) ?>
        		 <img src="<? bloginfo('template_url'); ?>/img/sliderFiller.png" class="responsive" />
      		</div></div>
      		<div class="frontpageSliderTextContainer container_3"><div class="inside">
      		  <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
      		  <div class="cats"><?php echo get_cat_list($post);  ?></div>
      		  <p><?php the_content() ?></p>
      		  <p class="text-right"><a href="<?php the_permalink(); ?>">Läs mer</a></p>
      		</div></div>
      		<div class="clear"></div>
    		</div>
        		
        <?php } ?>
        	
  		</div>
  		
		
		</div>
		<div class="clear"></div>
	</div>
	
<?php
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>
	
	<div id="frontpageContent" class="wrapper">
		<div id="frontpageEventsFeed" class="container_5">
		
		  <?php 
		    $activeCat = $_GET['cat'];
		   	$args = array(
        	'type'      => 'tribe_events',
        	'taxonomy'  => 'tribe_events_cat'
        ); 
  		  $eventCat = get_categories( $args );
		  ?>
		
		  <div><div class="inside">
  		  <ul class="categorySelector">
    		  <li><a href="<?php bloginfo('url'); ?>" <?php if( !$activeCat ) { echo 'class="active"'; } ?>>Alla</a></li>
    		  <?php 
      		foreach($eventCat as $cat) {
      		  if( $activeCat == $cat->slug)
          		echo sprintf('<li><a href="%s" class="active">%s</a></li>', get_bloginfo('url').'?cat='.$cat->slug, $cat->name);
            else
              echo sprintf('<li><a href="%s">%s</a></li>', get_bloginfo('url').'?cat='.$cat->slug, $cat->name);
      		}
      		?>
  		  </ul>
		  </div></div>
		  
		  <div class="clear"></div>
		  
		  <?php // The Query
		  $args = array( 'post_type' => 'tribe_events' );
		  if( $activeCat ) $args['tribe_events_cat'] = $activeCat;
		    
      $the_query = new WP_Query( $args );
      
      // The Loop
      if ( $the_query->have_posts() ) {
      	while ( $the_query->have_posts() ) {
      		$the_query->the_post(); ?>
    
  		<article class="inside withPadding">
  		  <a href="<?php the_permalink(); ?>">
  		    <?php echo get_the_post_thumbnail( $post_id, 'topImage', array( 'class' => 'topimg responsive' ) ) ?>
  		  </a>  		  
  		  <div class="content">
  		    <?php the_dateIcon( $post ); ?>
    		  <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
  		    <div class="cats"><?php echo get_cat_list($post);  ?></div>
  		    <?php the_content() ?>
    		  <p class="text-right"><a href="<?php the_permalink(); ?>">Läs mer</a></p>
  		  </div>
  		  
  		</article>
  		<div class="clear"></div>
      		
      	<?php }
      } else {
      	// no posts found
      }
      /* Restore original Post Data */
      wp_reset_postdata();
      ?>
  		
		</div>
		<div id="frontpageSidebar" class="container_4"><div class="inside">
  		
  		<aside class="">
    		<?php get_sidebar(); ?>
  		</aside>
  		
		</div></div>
		
		<div class="clear"></div>
	</div>
		
<?php get_footer(); ?>