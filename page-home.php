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
						<div class="intro-nav">
							<a href="#properties" class="ribbon-link">
								<span class="icon icon-building"></span>
								<div class="ribbon ribbon-left">Buildings</div>
							</a>
							<a href="#about" class="ribbon-link">
								<span class="icon icon-about"></span>
								<div class="ribbon ribbon-left">About</div>
							</a>
							<a href="#amenities" class="ribbon-link">
								<span class="icon icon-amenity"></span>
								<div class="ribbon ribbon-right">Amenities</div>
							</a>
							<a href="#contact" class="ribbon-link">
								<span class="icon icon-contact"></span>
								<div class="ribbon ribbon-right">Contact</div>
							</a>
							<a href="#map" class="ribbon-link">
								<span class="icon icon-map"></span>
								<div class="ribbon ribbon-right">Map</div>
							</a>
						</div>
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
				<?php if(ot_get_option( 'section_1_icon' )): ?>
					<h2 class="with-icon" style="background-image: url('<?php echo ot_get_option( 'section_1_icon' ); ?>')"><?php echo ot_get_option( 'section_1_title' ); ?></h2>
				<?php else: ?>
					<h2><?php echo ot_get_option( 'section_1_title' ); ?></h2>
				<?php endif; ?>
			</div>
			<div class="section-content">
				<div class="container">
					<div id="about-slider" class="owl-carousel">
						<?php
						$field_values = simple_fields_fieldgroup("homepage_about_entries");

						if($field_values) :
							?>
							<?php foreach($field_values as $val) : ?>

							<div class="box">
								<div class="row">
									<div class="col-sm-6"><?php echo do_shortcode($val['homepage_about_entry']); ?></div>
									<div class="col-sm-6"><?php echo do_shortcode($val['homepage_about_entry2']); ?></div>
								</div>
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
					<?php if(ot_get_option( 'section_2_icon' )): ?>
						<h2 class="with-icon" style="background-image: url('<?php echo ot_get_option( 'section_2_icon' ); ?>')"><?php echo ot_get_option( 'section_2_title' ); ?></h2>
					<?php else: ?>
						<h2><?php echo ot_get_option( 'section_2_title' ); ?></h2>
					<?php endif; ?>
				</div>
			</div>
			<div class="section-content">
				<div class="container container-slider">
					<div class="slider-wrap hoverbox-slider-wrap">
						<div class="owl-buttons owl-buttons-circles">
							<div id="prev-amenity" class="owl-prev">
								<i class="fa fa-angle-left"></i>
							</div>
							<div id="next-amenity" class="owl-next disabled">
								<i class="fa fa-angle-right"></i>
							</div>
						</div>
						<div id="amenities-slider" class="owl-carousel owl-carousel-pad hoverbox-slider">
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
			</div>
		</section>

		<section id="map" class="map section">
			<div class="section-title">
				<div class="container">
					<?php if(ot_get_option( 'section_3_icon' )): ?>
						<h2 class="with-icon" style="background-image: url('<?php echo ot_get_option( 'section_3_icon' ); ?>')"><?php echo ot_get_option( 'section_3_title' ); ?></h2>
					<?php else: ?>
						<h2><?php echo ot_get_option( 'section_3_title' ); ?></h2>
					<?php endif; ?>
				</div>
			</div>
			<div class="section-content">
				<div class="container mobile">
					<?php echo types_render_field("mobile-image", array("html"=>true)); ?>
				</div>
				<div class="container desktop">
					<?php echo types_render_field("desktop-image", array("html"=>true)); ?>
					<div class="map-container">
						<i id="compass" class="fa fa-compass"></i>
						<?php
						if (has_nav_menu('map_navigation')) : ?>
							<aside id="map-navigation" class="side-nav map-navigation">
								<h3>Legend</h3>
								<?php wp_nav_menu(array('theme_location' => 'map_navigation', 'menu_class' => 'overlay-nav nav')); ?>
							</aside>
						<?php endif; ?>
						<?php $locations 	= new WP_Query( array ( 'post_type' => 'properties', 'posts_per_page' => -1 ) ) ; ?>
						<?php if( $locations->have_posts() ) : ?>
							<?php
							while ($locations->have_posts()) : $locations->the_post();
								$x_pos		    = types_render_field("x-pos", array("raw"=>"true"));
								$y_pos	    	= types_render_field("y-pos", array("raw"=>"true"));
								$tail   		= types_render_field("tail-position", array("raw"=>"true"));
								$popup_text 	= types_render_field("popup-text", array("html"=>"true"));
							?>

								<?php $categories = wp_get_post_terms($post->ID, 'map-type'); ?>

								<div class="item item-attraction <?php echo $custom_icon ? 'custom-icon' : null ;?> <?php echo $post->post_name; ?>" style="left: <?php echo $x_pos; ?>%; top: <?php echo $y_pos; ?>%;"<?php foreach($categories as $category) { echo 'data-target="' . $category->slug . '"'; } ?>>
									<div class="link-attraction">
										<?php
										foreach($categories as $category) {
											echo '<div class="icon-' . $category->slug . '">' . get_term_thumbnail( $category->term_id  ) . '</div>';
										}
										?>
									</div>
									<div class="popup <?php echo $tail; ?>">
										<div class="popup-content">
											<div class="thumb"><?php the_post_thumbnail('popup'); ?></div>
											<div class="text">
												<h3><?php the_title(); ?></h3>
												<?php echo $popup_text; ?>
												<a href="<?php the_permalink(); ?>" class="btn btn-blue">Learn More</a>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; wp_reset_query(); ?>
					</div>
				</div>
			</div>
		</section>

		<section id="properties" class="properties section">
			<div class="section-title">
				<div class="container">
					<?php if(ot_get_option( 'section_4_icon' )): ?>
						<h2 class="with-icon" style="background-image: url('<?php echo ot_get_option( 'section_4_icon' ); ?>')"><?php echo ot_get_option( 'section_4_title' ); ?></h2>
					<?php else: ?>
						<h2><?php echo ot_get_option( 'section_4_title' ); ?></h2>
					<?php endif; ?>
				</div>
			</div>
			<div class="section-content">
				<div class="container container-slider">
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
								$sqfootage	= types_render_field("property_square_footage", array("raw"=>true));

								?>

								<div class="property box">
									<header class="row header">
										<div class="col-sm-8">
											<div class="sf"><span class="num"><?php echo $sqfootage; ?></span>&nbsp;<span>SF</span></div>
											<h3><?php the_title(); ?></h3>
										</div>
										<div class="col-sm-4">
											<a href="<?php the_permalink(); ?>" class="btn btn-blue">Learn More</a>
										</div>
									</header>
									<?php $property_availability		= types_render_field("property_availability", array("raw"=>true)); ?>

									<?php if ( has_post_thumbnail() ) : ?>
										<?php
										$post_thumbnail_id = get_post_thumbnail_id( $post_id );

										$thumb_large = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'owl_thumb-large' )[0];
										$thumb_medium = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'owl_thumb-medium' )[0];
										$thumb_small = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'owl_thumb-small' )[0];
										?>
										<picture class="pad">
											<a href="<?php the_permalink(); ?>">
											<?php if($property_availability) {
												echo '<div class="availability">This property is available</div>';
											} ?>
											<img
												srcset="<?php echo $thumb_large; ?>  1170w,
			                                        <?php echo $thumb_medium; ?>  960w,
											        <?php echo $thumb_small; ?>   480w"
												src="<?php echo $thumb_small; ?>"
												alt="Detail of the above quilt, highlighting the embroidery and exotic stitchwork." />
											</a>
										</picture>
									<?php endif; ?>
								</div>
							<?php endwhile; endif; wp_reset_query(); ?>
						</div>
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
