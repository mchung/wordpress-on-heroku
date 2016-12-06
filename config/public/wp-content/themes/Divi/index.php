<?php get_header(); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
		<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>

				<?php
					$thumb = '';

					$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

					$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
					$classtext = 'et_pb_post_main_image';
					$titletext = get_the_title();
					$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
					$thumb = $thumbnail["thumb"];

					if ( 'on' == et_get_option( 'divi_thumbnails_index', 'on' ) && '' !== $thumb ) : ?>
						<a href="<?php the_permalink(); ?>">
							<?php print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height ); ?>
						</a>
				<?php
					endif;
				?>

						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<?php
						et_divi_post_meta();

						if ( 'on' !== et_get_option( 'divi_blog_style', 'false' ) )
							truncate_post( 270 );
						else
							the_content();
					?>

					</article> <!-- .et_pb_post -->
			<?php
					endwhile;

					if ( function_exists( 'wp_pagenavi' ) )
						wp_pagenavi();
					else
						get_template_part( 'includes/navigation', 'index' );
				else :
					get_template_part( 'includes/no-results', 'index' );
				endif;
			?>
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>