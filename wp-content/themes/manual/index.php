<?php get_header(); ?>
<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-8 col-sm-12 rtl-blog">
  <?php 
		if ( have_posts() ) : 
		
			while ( have_posts() ) : the_post();
				get_template_part( 'template/content', get_post_format() );
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'  => esc_html__( '&lt;', 'manual' ),
				'next_text'  => esc_html__( '&gt;', 'manual' ),
			) );
			
		else :
			 _e( 'Sorry, no posts were found', 'manual' );
		endif;
		?>
  <div class="clearfix"></div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>