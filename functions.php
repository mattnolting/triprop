<?php
/**
 * Roots includes
 *
 * The $roots_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/roots/pull/1042
 */
$roots_includes = array(
  'lib/utils.php',           // Utility functions
  'lib/init.php',            // Initial theme setup and constants
  'lib/wrapper.php',         // Theme wrapper class
  'lib/sidebar.php',         // Sidebar class
  'lib/config.php',          // Configuration
  'lib/activation.php',      // Theme activation
  'lib/titles.php',          // Page titles
  'lib/nav.php',             // Custom nav modifications
  'lib/gallery.php',         // Custom [gallery] modifications
  'lib/comments.php',        // Custom comments modifications
  'lib/scripts.php',         // Scripts and stylesheets
  'lib/extras.php',          // Custom functions
);

foreach ($roots_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'roots'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

function wp_get_all_tags( $args = '' ) {

	$tags = get_terms('post_tag');
	if($tags) {
		echo '<ul>';
		foreach ( $tags as $key => $tag ) {
			if ( 'edit' == 'view' )
				$link = get_edit_tag_link( $tag->term_id, 'post_tag' );
			else
				$link = get_term_link( intval($tag->term_id), 'post_tag' );
			if ( is_wp_error( $link ) )
				return false;

			$tags[ $key ]->link = $link;
			$tags[ $key ]->id = $tag->term_id;
			$tags[ $key ]->name = $tag->name;
			echo '<li><a href="'. $link .'">' . $tag->name . '</a></li>';
		}
		echo '</ul>';
		return $tags;
	}
}

function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('...Read More&nbsp;<i class="fa fa-caret-right"></i>', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );