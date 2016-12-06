<?php
if ( ( is_single() || is_page() ) && 'et_full_width_page' === get_post_meta( get_the_ID(), '_et_pb_page_layout', true ) )
	return false;

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="sidebar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div> <!-- end #sidebar -->
<?php endif; ?>