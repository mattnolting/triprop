<?php
/*
Template Name: Blog Page
*/
?>
<div class="wrap container container-blog" role="document">
	<?php if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
		<div class="row">
			<aside class="col-sm-4 col-md-3">
				<?php dynamic_sidebar('sidebar-blog'); ?>
			</aside>
			<main class="main col-sm-8 col-md-9" role="main">
				<?php get_template_part('templates/content', 'loop'); ?>
			</main>
		</div>
	<?php else: ?>

	<main class="main col-sm-8" role="main">
		<?php get_template_part('templates/page', 'header'); ?>
		<?php get_template_part('templates/content', 'blog'); ?>
	</main>
	<?php endif; ?>
</div>