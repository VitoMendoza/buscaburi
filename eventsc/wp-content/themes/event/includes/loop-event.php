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

	<?php if ( 'below' != $themify->media_position && ( ! is_single() || isset( $themify->show_post_media ) ) ) get_template_part( 'includes/post-media',
		'event'); ?>

	<div class="post-content">

		<?php if ( $themify->hide_date != 'yes' && ( ! is_single() || isset( $themify->is_shortcode ) ) ): ?>
			<time datetime="<?php the_time('o-m-d') ?>" class="post-date entry-date updated" itemprop="datePublished"><?php the_time(apply_filters('themify_loop_date', 'M j, Y')) ?></time>
		<?php endif; //post date ?>

		<div class="<?php echo is_singular( 'event' ) ? 'event-single-wrap' : 'event-info-wrap'; ?> clearfix">

			<?php if ( is_singular( 'event' ) ) : ?>
				<div class="event-map">
					<?php echo $themify_event->get_map( themify_get( 'map_address' ) ); ?>
				</div><!-- / .event-map -->
			<?php endif; ?>

			<div class="<?php echo isset( $themify->is_shortcode ) ? '': 'event-single-details'; ?>">
				<div class="event-info-wrap">

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

					<?php if ( is_singular( 'event' ) && themify_check( 'map_address' ) ) : ?>
						<div class="address">
							<?php echo wpautop( themify_get( 'map_address' ) ); ?>
						</div>
						<!-- /address -->
					<?php endif; ?>

				</div>
				<!-- / .event-info-wrap -->

				<?php if ( is_singular( 'event' ) && themify_check( 'buy_tickets' ) ) : ?>
					<p>
						<a href="<?php echo themify_get( 'buy_tickets' ); ?>" class="button buy">
							<span class="ticket"></span> <?php _e( 'Buy Tickets', 'themify' ); ?>
						</a>
					</p>
				<?php endif; ?>

			</div><!-- / .event-single-details -->

		</div>

		<?php if($themify->hide_meta != 'yes'): ?>
			<div class='post-category-wrap'>
				<?php the_terms( get_the_ID(), 'event-category', ' <span class="post-category">', ', ', '<i class="divider-small"></i></span>' ); ?>

				<?php the_terms( get_the_ID(), 'event-tag', ' <span class="post-tag">', ', ', '</span>' ); ?>
			</div>
		<?php endif; //post meta ?>

		<?php if($themify->hide_title != 'yes'): ?>
			<?php themify_before_post_title(); // Hook ?>
			<?php if($themify->unlink_title == 'yes'): ?>
				<h2 class="post-title entry-title" itemprop="name"><?php the_title(); ?></h2>
			<?php else: ?>
				<h2 class="post-title entry-title" itemprop="name"><a href="<?php echo themify_get_featured_image_link(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php endif; //unlink post title ?>
			<?php themify_after_post_title(); // Hook ?>
		<?php endif; //post title ?>

		<?php if( ! is_single() && 'below' == $themify->media_position ) get_template_part( 'includes/post-media', 'loop'); ?>

		<?php if ( $themify->hide_meta != 'yes' || $themify->hide_date != 'yes' ) : ?>
			<div class="post-meta entry-meta clearfix">

				<?php if ( is_singular( 'event' ) ) : ?>
					<div class="meta-left clearfix">
						<?php if($themify->hide_meta != 'yes'): ?>
							<span class="author-avatar"><?php echo get_avatar( get_the_author_meta('user_email'), $themify->avatar_size_loop, '' ); ?></span>
							<span class="post-author"><?php echo themify_get_author_link() ?></span>
						<?php endif; ?>

						<?php if ( $themify->hide_date != 'yes' && is_single() && ! isset( $themify->is_shortcode ) ): ?>
							<time datetime="<?php the_time('o-m-d') ?>" class="post-date entry-date updated" itemprop="datePublished"><?php the_time(apply_filters('themify_loop_date', 'M j, Y')) ?></time>
						<?php endif; //post date ?>
					</div>

					<div class="meta-right clearfix">
				<?php endif; ?>

					<?php get_template_part( 'includes/post-stats' ); ?>

				<?php if ( is_singular( 'event' ) ) : ?>
					</div>
				<?php endif; ?>

			</div>
		<?php endif; //post meta ?>

		<div class="entry-content" itemprop="articleBody">

			<?php if ( 'excerpt' == $themify->display_content && ! is_attachment() ) : ?>

				<?php the_excerpt(); ?>

				<?php if( themify_check('setting-excerpt_more') ) : ?>
					<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute('echo=0'); ?>" class="more-link"><?php echo themify_check('setting-default_more_text')? themify_get('setting-default_more_text') : __('More &rarr;', 'themify') ?></a></p>
				<?php endif; ?>

			<?php elseif($themify->display_content == 'none'): ?>

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