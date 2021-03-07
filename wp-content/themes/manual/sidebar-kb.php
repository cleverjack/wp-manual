<?php
/**
 * The sidebar containing the main widget area
 */
?>
<aside class="col-md-4 col-sm-12" id="sidebar-box">
  <div class="custom-well sidebar-nav">
	<?php 
		if ( is_active_sidebar( 'kb-sidebar-1' ) ) : 
			dynamic_sidebar( 'kb-sidebar-1' ); 
		endif; 
    ?>
  </div>
</aside>