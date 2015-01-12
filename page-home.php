<?php
/*
Template Name: Page Home
*/
?>


<script>
	$(document).ready(function(){

	});
</script>
<div class="wrap" role="document">
	<main class="main" role="main">
		<section id="intro" class="section intro grid">
			<div class="section-content">
				<div class="container">
					<div class="intro-block">
						<div class="logo"><?php echo types_render_field("home_intro-logo", array("html"=>true)); ?></div>
					</div>
				</div>
			</div>
			<div class="section-content locked">
				<div id="ri-grid" class="ri-grid">
					<ul>
						<?php
						$field_values = simple_fields_values("homepage_intro_images");
						$i = 0;

						if($field_values) : ?>
							<?php foreach($field_values as $val) : ?>
								<li>
									<a href="#"><?php echo '<img src="' . $field_values[$i]['url'] . '" alt="Rotator Image ' . $i . '"/>'; ?></a>
								</li>
								<?php $i++; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</section>

		<section id="about" class="about section">
			<div class="section-title">
				<h2>About The Area</h2>
			</div>
			<div class="section-content">
				<div class="slider-wrap">
					<div id="about-slider" class="owl-carousel">
						<?php
							$field_values = simple_fields_values("homepage_about_entry");

							if($field_values) :
						?>
							<?php foreach($field_values as $val) : ?>
								<div class="box">
									<?php echo $val; ?>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>

		<section id="amenities" class="amenities section">
			<div class="section-title">
				<div class="container">
					<h2>Amenities</h2>
				</div>
			</div>
			<div class="section-content">
				<div class="slider-wrap hoverbox-slider-wrap">
					<div class="owl-buttons owl-buttons-circles">
						<div id="prev-amenity" class="owl-prev">
							<i class="fa fa-angle-left"></i>
						</div>
						<div id="next-amenity" class="owl-next disabled">
							<i class="fa fa-angle-right"></i>
						</div>
					</div>
					<div id="amenities-slider" class="owl-carousel hoverbox-slider">
						<?php
							$amenities = new WP_Query( array( 'post_type' => 'amenities', 'posts_per_page' => -1 ));

							if( $amenities->have_posts() ) : while ( $amenities->have_posts() ) : $amenities->the_post();
							$blurb		= types_render_field("amenities_blurb", array("raw"=>true));
						?>

							<div class="amenity box hoverbox">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php
									$post_thumbnail_id = get_post_thumbnail_id( $post_id );

									$thumb_large = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'owl_thumb-large' )[0];
									$thumb_medium = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'owl_thumb-medium' )[0];
									$thumb_small = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'owl_thumb-small' )[0];
									?>
									<picture>
										<img
											srcset="<?php echo $thumb_large; ?>  1170w,
		                                        <?php echo $thumb_medium; ?>  960w,
										        <?php echo $thumb_small; ?>   480w"
											src="<?php echo $thumb_small; ?>"
											alt="Detail of the above quilt, highlighting the embroidery and exotic stitchwork." />
									</picture>
								<?php endif; ?>
								<div class="hover-content">
									<h3><?php the_title(); ?></h3>
									<?php echo $blurb ? '<div class="blurb">' . $blurb . '</div>' : null; ?>
								</div>
							</div>
						<?php endwhile; endif; wp_reset_query(); ?>
					</div>
				</div>
			</div>
		</section>
		<section id="map" class="map section">
			<div class="section-title">
				<div class="container">
					<h2>Imperial Center Map</h2>
				</div>
			</div>
			<div class="section-content">

			</div>
		</section>
		<section id="properties" class="properties section">
			<div class="section-title">
				<div class="container">
					<h2>Properties</h2>
				</div>
			</div>
			<div class="section-content">
				<div class="slider-wrap">
					<div class="owl-buttons owl-buttons-circles">
						<div id="prev-property" class="owl-prev">
							<i class="fa fa-angle-left"></i>
						</div>
						<div id="next-property" class="owl-next disabled">
							<i class="fa fa-angle-right"></i>
						</div>
					</div>
					<div id="properties-slider" class="owl-carousel hoverbox-slider">
						<?php
						$properties = new WP_Query( array( 'post_type' => 'properties', 'posts_per_page' => -1 ));

						if( $properties->have_posts() ) : while ( $properties->have_posts() ) : $properties->the_post();
							$blurb		= types_render_field("amenities_blurb", array("raw"=>true));
							?>

							<div class="property box">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php
									$post_thumbnail_id = get_post_thumbnail_id( $post_id );

									$thumb_large = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'owl_thumb-large' )[0];
									$thumb_medium = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'owl_thumb-medium' )[0];
									$thumb_small = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'owl_thumb-small' )[0];
									?>
									<picture>
										<img
											srcset="<?php echo $thumb_large; ?>  1170w,
		                                        <?php echo $thumb_medium; ?>  960w,
										        <?php echo $thumb_small; ?>   480w"
											src="<?php echo $thumb_small; ?>"
											alt="Detail of the above quilt, highlighting the embroidery and exotic stitchwork." />
									</picture>
								<?php endif; ?>
							</div>
						<?php endwhile; endif; wp_reset_query(); ?>
					</div>
				</div>
			</div>
		</section>
		<section id="contact" class="contact section blue">
			<div class="section-title blue small">
				<div class="container">
					<h2 class="dark">Contact Us</h2>
				</div>
			</div>
			<div class="section-content small">
				<div class="container">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2"><?php echo do_shortcode(simple_fields_value("contact_us")); ?></div>
					</div>
				</div>
			</div>
		</section>

		<?php while (have_posts()) : the_post(); ?>
			<?php //get_template_part('templates/page', 'header'); ?>

			<?php //get_template_part('templates/content', 'page'); ?>
		<?php endwhile; ?>
	</main><!-- /.main -->
</div><!-- /.wrap -->