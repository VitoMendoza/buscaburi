<?php
/**
 * Template for site header
 * @package themify
 * @since 1.0.0
 */
?>
<!doctype html>
<html <?php echo themify_get_html_schema(); ?> <?php language_attributes(); ?>>
<head>
<?php
/** Themify Default Variables
 *  @var object */
	global $themify; ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<title itemprop="name"><?php wp_title( '' ); ?></title>

<?php
/**
 *  Stylesheets and Javascript files are enqueued in theme-functions.php
 */
?>

<!-- wp_header -->
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php themify_body_start(); // hook ?>
<div id="pagewrap" class="hfeed site">

	<div id="headerwrap">

		<div id="nav-bar">
			<div class="pagewidth">
				<div class="header-inner clearfix">

					<?php if ( $site_desc = get_bloginfo('description') ) : ?><div id="site-description"><p><?php echo $site_desc; ?></p></div><?php endif; ?>

					<div class="social-widget">
						<?php dynamic_sidebar('social-widget'); ?>

						<?php if ( ! themify_check('setting-exclude_rss' ) ) : ?>
							<div class="rss"><a href="<?php themify_theme_feed_link(); ?>" class="hs-rss-link"></a></div>
						<?php endif; ?>
					</div>
					<!-- /.social-widget -->

				</div>
				<!-- /.header-inner -->

			</div>
			<!-- /.pagewidth -->

		</div>
		<!-- /#nav-bar -->
    
		<?php themify_header_before(); // hook ?>

		<header id="header" class="pagewidth clearfix">

			<div class="header-inner">

				<?php themify_header_start(); // hook ?>

				<?php echo themify_logo_image('site_logo'); ?>

				<a id="menu-icon" href="#sidr"></a>

				<nav id="sidr">

					<?php if ( ! themify_check( 'setting-exclude_search_form' ) ) : ?>
						<div id="searchform-wrap">
							<?php get_search_form(); ?>
						</div>
						<!-- /#searchform-wrap -->
					<?php endif; ?>

					<?php themify_theme_menu_nav(); ?>
					<!-- /#main-nav -->

					<a id="menu-icon-close" href="#sidr"></a>

				</nav>

				<?php themify_header_end(); // hook ?>

			</div>
			<!-- /.header-inner -->

		</header>
		<!-- /#header -->

        <?php themify_header_after(); // hook ?>
				
	</div>
	<!-- /#headerwrap -->
	
	<div id="body" class="clearfix">
    <?php themify_layout_before(); //hook ?>