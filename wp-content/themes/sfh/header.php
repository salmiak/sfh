<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <!-- 
  
    Välkommen till källkoden för denna sajt - 
    kodad av: Salmiak media (http://salmiakmedia.se)
    
    Baserad på en modifierad HTML5-mall av David Paulsson
    (http://davidpaulsson.se/html5-mall/).
    
  -->
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  
  <title><?php wp_title('&raquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  
  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.png">
  

  <link href='http://fonts.googleapis.com/css?family=Playfair+Display:900italic|Raleway:400,200,700|Vollkorn:400italic,700italic,400,700' rel='stylesheet' type='text/css'>  
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/style.css"  charset="utf-8" />
  <link  type="text/css" rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  
  
  <?php /* Skapa HTML5-objekt för äldre webbläsare */ ?>
  <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/html5.js"></script>
  <![endif]-->

  <?php /* Script som fixar alla olika prexif för stylessheets */ ?>  
  <!-- <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/prefixfree.min.js"></script> -->
    
  <?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
  
      <div id="header" class="wrapper">
        
        <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" class="headerlogo"><img src="<?php bloginfo('template_url'); ?>/img/logo.svg"></a>

        <?php 
        //wp_nav_menu( 'sort_column=menu_order' ); 
        ?>
        
        <div class="menuContainer"><div class="headermenu">
        
          <?php wp_nav_menu( array(
            'menu'            => 'Meny Vänster',
            'container'       => 'ul',
            'menu_class'      => 'left'
          )); ?>
        
          <?php wp_nav_menu( array(
            'menu'            => 'Meny Höger',
            'container'       => 'ul',
            'menu_class'      => 'right'
          )); ?>
          
          <div class="clear"></div>
        </div></div>
        
      <div class="clear"></div>
    </div>