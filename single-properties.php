<?php while (have_posts()) : the_post(); ?>
	<?php
		$addy		            = types_render_field("properties_address", array("raw"=>true));
		$availability		    = types_render_field("property_availability", array("raw"=>true));
		$square_footage	    	= types_render_field("property_square_footage", array("raw"=>true));
		$details		        = types_render_field("property_details", array("raw"=>true));
		$toggle		            = types_render_field("property_toggle", array("raw"=>true));

	?>

	<article <?php post_class(); ?>>test
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php get_template_part('templates/entry-meta'); ?>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<footer>
			<?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
		</footer>

	</article>
<?php endwhile; ?>
