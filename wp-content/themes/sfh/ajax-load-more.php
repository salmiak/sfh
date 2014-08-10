<!--
 * Wordpress Ajax Load More
 * https://github.com/dcooney/wordpress-ajax-load-more
 *
 * Copyright 2013 Connekt Media - http://cnkt.ca/
 * Free to use under the GPLv2 license.
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Author: Darren Cooney
 * Twitter: @KaptonKaos
-->


<?php
// Our include
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Our variables
$postType = (isset($_GET['postType'])) ? $_GET['postType'] : 'post';
$category = (isset($_GET['category'])) ? $_GET['category'] : '';
$author_id = (isset($_GET['author'])) ? $_GET['author'] : '';
$taxonomy = (isset($_GET['taxonomy'])) ? $_GET['taxonomy'] : '';
$tag = (isset($_GET['tag'])) ? $_GET['tag'] : '';
$exclude = (isset($_GET['postNotIn'])) ? $_GET['postNotIn'] : '';
$numPosts = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 6;
$page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;

//Set up our initial query arguments
$args = array(
	'post_type' => $postType,
	'category_name' => $category,
	
	'author' => $author_id,
	
	'posts_per_page' => $numPosts,
	'paged'          => $page,
	
	'orderby'   => 'date',
	'order'     => 'ASC',
	'post_status' => 'publish',
);

// Excluded Posts Function
/* Create new array of excluded posts, for example, you may have a feature banner on the page and you may not want to incude these posts in your query.

Example PHP array:
$features = array('7238', '6649', '6951'); // Array of posts
if($features){			
   $postsNotIn = implode(",", $features); //Implode the posts and set a varible to pass to our data-post-not-in param.
}   
Example HTML
<ul class="listing" data-path="<?php echo get_template_directory_uri(); ?>" data-post-type="post" data-post-not-in="<?php echo $postsNotIn; ?>" data-display-posts="6" data-button-text="Load More">
*/

if(!empty($exclude)){
	$exclude=explode(",",$exclude);
	$args['post__not_in'] = $exclude;
}

// Query by Taxonomy
if(empty($taxonomy)){
	$args['tag'] = $tag;
}else{
    $args[$taxonomy] = $tag;
}

query_posts($args); 
?>
<?php 
// our loop  
if (have_posts()) :  
	$i =0;
	while (have_posts()):  
	$i++;
	the_post();?> 
	
    
  		<article class="inside withPadding">
  		  <a href="<?php the_permalink(); ?>">
  		    <?php echo get_the_post_thumbnail( $post_id, 'topImage', array( 'class' => 'topimg responsive' ) ) ?>
  		  </a>  		  
  		  <div class="content">
  		    <?php the_dateIcon( $post ); ?>
    		  <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
  		    <div class="cats"><?php echo get_cat_list($post);  ?></div>
  		    <?php the_excerpt() ?>
    		  <p class="text-right"><a href="<?php the_permalink(); ?>">Läs mer</a></p>
  		  </div>
  		  
  		</article>
  		<div class="clear"></div>
  		
  		
<?php endwhile; endif; wp_reset_query(); ?> 