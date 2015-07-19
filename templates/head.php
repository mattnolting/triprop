<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3.5">
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png">

  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
	<?php if( ot_get_option( 'analytics_code' ) ) {
		echo ot_get_option( 'analytics_code' );
	} ?>
</head>
