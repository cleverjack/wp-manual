<?php 
get_header(); 
global $theme_options;

$col_content = 8;
if( $theme_options['kb-cat-sidebar-status'] == true ) {
	$col_content = 12;
}
?>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">

<?php
echo '<div class="col-md-'. esc_html($col_content) .' col-sm-12 kb-rtl-right">';	
echo '<div class="col-md-12 col-md-12 clearfix margin-btm-25" style="padding-left:1px; clear:both;"><div class="knowledgebase-cat-body">';
if ( have_posts() ) {
	while(have_posts()) : the_post();
	
		echo '<div class="kb-box-single">';
		echo '<h4 style="margin-bottom:5px;"><a href="'.get_the_permalink().'">';
		$org_title = get_the_title(); 
		echo html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
		echo '</a></h4>';
		manual__kb_catag_belowtitle_meta_section($post->ID); 
		echo '</div>';
		
	endwhile;  
	wp_reset_postdata();
	
	// Previous/next page navigation.
	the_posts_pagination( array(
		'prev_text'          => esc_html__( '&lt;', 'manual' ),
		'next_text'          => esc_html__( '&gt;', 'manual' ),
	) );
	

} else {
	 esc_html_e( 'Sorry, no posts were found', 'manual' );
}	
echo '</div></div>';
echo '</div>';

if( $theme_options['kb-cat-sidebar-status'] != true ) { 
	get_template_part('sidebar', 'kb');
} 

get_footer(); 
?>