<?php
/**
 * WP Search Template
 */
if(!empty($_GET['ajax']) ? $_GET['ajax'] : null) { 
	manual__live_search_result();
} else {
	get_header();
		get_template_part( 'template/content', 'search' ); 
	if( $theme_options['searchpg-sidebar'] == true ) get_sidebar(); 
	get_footer(); 
 } 
?>