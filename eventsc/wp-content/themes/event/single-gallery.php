<?php
/**
 * Template for single gallery post view
 * @package themify
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<?php 
/** Themify Default Variables
 *  @var object */
global $themify, $themify_gallery;
?>

<?php if( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<section class="featured-area <?php echo themify_theme_featured_area_style(); ?>">

		<?php
		/**
		 * GALLERY GRID LAYOUT
		 */
		if ( themify_get( 'gallery_shortcode' ) != '' ) :

			$images = $themify_gallery->get_gallery_images();
			$columns = $themify_gallery->get_gallery_columns();

			if ( $images ) : $counter = 0; ?>

				<div class="gallery-wrapper gallery-columns-<?php echo $columns; ?> masonry clearfix">
					<div class="grid-size"></div>

				<?php foreach ( $images as $image ) :
					$counter++;
					$full = wp_get_attachment_image_src( $image->ID, apply_filters( 'themify_gallery_post_type_single', 'large' ) );
					$caption = $themify_gallery->get_caption( $image );
					$description = $themify_gallery->get_description( $image );
					$featured = get_post_meta( $image->ID, 'themify_gallery_featured', true );
					if ( $featured && ( '' != $featured ) ) {
						$img_size = array(
							'width' => 500,
							'height' => 500,
						);
					} else {
						$img_size = array(
							'width' => 250,
							'height' => 250,
						);
					}
					?>
					<div class="item gallery-icon <?php echo $featured; ?>">
						<a href="<?php echo $full[0]; ?>" class="" data-image="<?php echo $full[0]; ?>" data-caption="<?php echo $caption; ?>" data-description="<?php echo $description; ?>">
							<?php themify_image( "src={$full[0]}&w={$img_size['width']}&h={$img_size['height']}&ignore=true&alt=" ); ?>
							<span><?php echo $caption; ?></span>
						</a>
					</div>
				<?php endforeach; // images as image ?>

				</div>
				<!-- /.gallery-wrapper -->

			<?php endif; // images ?>

		<?php endif; // gallery shortcode ?>

	</section>

	<!-- layout-container -->
	<div id="layout" class="pagewidth clearfix">

		<?php themify_content_before(); // hook ?>
		<!-- content -->
		<div id="content" class="list-post">
			<?php themify_content_start(); // hook ?>

			<?php get_template_part( 'includes/loop', get_post_type()); ?>

			<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'themify') . ' </strong>', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			<?php get_template_part( 'includes/author-box', 'single'); ?>

			<?php get_template_part( 'includes/post-nav'); ?>

				<?php comments_template(); ?>

		<?php themify_content_end(); // hook ?>
	</div>
	<!-- /content -->
	<?php themify_content_after(); // hook ?>

<?php endwhile; ?>

<?php
/////////////////////////////////////////////
// Sidebar
/////////////////////////////////////////////
if ($themify->layout != "sidebar-none"): get_sidebar(); endif; ?>

</div>
<!-- /layout-container -->

<?php get_footer(); ?>