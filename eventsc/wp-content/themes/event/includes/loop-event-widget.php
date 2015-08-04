<?php
/**
 * Template for event post type display.
 * @package themify
 * @since 1.0.0
 */
?>
<?php if(!is_single()){ global $more; $more = 0; } //enable more link ?>

<?php
/** Themify Default Variables
 *  @var object */
global $themify, $themify_event; ?>

<?php themify_post_before(); // hook ?>

<article itemscope itemtype="http://schema.org/Article" id="post-<?php the_ID(); ?>" <?php post_class('post clearfix event-post'); ?>>

	<?php themify_post_start(); // hook ?>

	<?php get_template_part( 'includes/post-media', 'event'); ?>

	<div class="post-content">

		<?php if ( $themify->hide_event_date != 'yes' || $themify->hide_event_location != 'yes' ) : ?>

			<div class="event-info-wrap clearfix">
				<?php if ( themify_check( 'start_date' ) && $themify->hide_event_date != 'yes' ) : ?>
					<time class="post-date entry-date updated" itemprop="datePublished">
						<?php $start_date = themify_get( 'start_date' ); ?>
						<span class="day"><?php echo $themify_event->get_datetime( $start_date, 'day' ); ?></span>
						<span class="month"><?php echo $themify_event->get_datetime( $start_date, 'month' ); ?></span>
						<span class="time"><?php echo ' @ ' . $themify_event->get_datetime( $start_date, 'time' ); ?></span>
					</time>
					<!-- / .post-date -->
				<?php endif; ?>

				<?php if ( themify_check( 'location' ) && $themify->hide_event_location != 'yes' ) : ?>
					<span class="location">
						<?php echo themify_get( 'location' ); ?>
					</span>
				<?php endif; ?>

			</div>

		<?php endif; // hide event date or location ?>

		<?php if ( $themify->hide_meta != 'yes' ): ?>
			<div class='post-category-wrap'>
				<?php the_terms( get_the_ID(), 'event-category', ' <span class="post-category">', ', ', '<i class="divider-small"></i></span>' ); ?>

				<?php the_terms( get_the_ID(), 'event-tag', ' <span class="post-tag">', ', ', '</span>' ); ?>
			</div>
		<?php endif; //post meta ?>

		<?php if ( $themify->hide_title != 'yes' ): ?>
			<?php themify_before_post_title(); // Hook ?>
			<?php if ( $themify->unlink_title == 'yes' ): ?>
				<h2 class="post-title entry-title" itemprop="name"><?php the_title(); ?></h2>
			<?php else: ?>
				<h2 class="post-title entry-title" itemprop="name"><a href="<?php echo themify_get_featured_image_link(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php endif; //unlink post title ?>
			<?php themify_after_post_title(); // Hook ?>
		<?php endif; //post title ?>
		

		<?php if ( $themify->hide_meta != 'yes' ) : ?>
			<div class="post-meta entry-meta clearfix">
				<?php get_template_part( 'includes/post-stats' ); ?>
			</div>
		<?php endif; //post meta ?>

		<?php if ( $themify->display_content == 'excerpt' ) : ?>

			<?php the_excerpt(); ?>

			<?php if( themify_check('setting-excerpt_more') ) : ?>
				<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute('echo=0'); ?>" class="more-link"><?php echo themify_check('setting-default_more_text')? themify_get('setting-default_more_text') : __('More &rarr;', 'themify') ?></a></p>
			<?php endif; ?>

		<?php elseif ( $themify->display_content == 'none' ) : ?>

		<?php else: ?>

			<?php the_content(themify_check('setting-default_more_text')? themify_get('setting-default_more_text') : __('More &rarr;', 'themify')); ?>

		<?php endif; //display content ?>

		<div><!-- /.entry-content -->

		<?php edit_post_link(__('Edit', 'themify'), '<span class="edit-button">[', ']</span>'); ?>

	</div>
	<!-- /.post-content -->
	<?php themify_post_end(); // hook ?>

</article>
<?php themify_post_after(); // hook ?>

<!-- /.post -->