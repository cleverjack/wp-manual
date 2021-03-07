<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--Navigation Menu-->
<nav class="navbar navbar-inverse">
  <div class="container nav-fix">
    <div class="navbar-header">
      <?php 
	  manual_responsive_layout_bar_icon_replacement();
	  manual_global_header(); 
	  ?>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
  	<?php 
   	$hamburger_class = manual_css_hamburger_menu_control();
   	manual_hamburger_menu_control(); 
   	if ( has_nav_menu( 'primary' ) ) { 
	 wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav '.$hamburger_class.'',  'walker' => new manual_menu_walker() )); 	
	} else { 
	   ?>
      <ul class="nav navbar-nav <?php echo esc_html($hamburger_class); ?>">
        <?php echo wp_list_pages( array( 'title_li' => '' ) ); ?>
      </ul>
  <?php } ?>
    </div>
  </div>
</nav>

<!-- 
========================
 MOBILE MENU
======================== 
-->
<div class="mobile-menu-holder"><div class="container">
<?php if ( has_nav_menu( 'primary' ) ) { wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav '.$hamburger_class.'',  'walker' => new manual_menu_walker() )); }?>
</div></div>

<?php  manual_header_display_control_check(); ?>