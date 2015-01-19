<?php while (have_posts()) : the_post(); ?>
	<?php
		$addy		            = types_render_field("property_address", array("raw"=>true));
		$availability		    = types_render_field("property_availability", array("raw"=>true));
		$square_footage	    	= types_render_field("property_square_footage", array("raw"=>true));
		$toggle		            = types_render_field("property_toggle", array("raw"=>true));
	?>

	<header class="properties-header">
		<h1 class="entry-title">
			<?php the_title(); ?>
			<span class="sep">|</span>
			<span class="sf">
				<span class="num"><?php echo $square_footage; ?>&nbsp;</span>SF
			</span>
		</h1>
		<div class="addy"><?php echo $addy; ?></div>
	</header>
	<?php
		$caption =  get_post(get_post_thumbnail_id())->post_excerpt;

	if(has_post_thumbnail()) {
		echo '<div class="thumbnail thumbnail-full">';
		the_post_thumbnail('full');

		if($availability) { echo '<div class="availability right"></div>'; }
		if($caption) { echo '<div class="caption">' . $caption . '</div>'; }

		echo '</div>';
	} ?>
	<div class="row">
		<?php $slider_images = simple_fields_fieldgroup("slider_images"); ?>

		<?php if($slider_images) : ?>
		<div class="col-sm-6">
			<div id="properties-single-slider" class="owl-carousel">
			<?php foreach($slider_images as $img) : ?>
				<div class="property box">
					<?php
						$image = $img['property_slider_image']['image']['full'];
						$title = $img['property_slider_title'];
					?>
					<?php if($title) : ?>
						<figcaption class="title property-title"><?php echo $title; ?></figcaption>
					<?php endif; ?>
					<picture>
						<?php echo $image; ?>
					</picture>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="the-content">
				<?php the_content(); ?>
			</div>
		</div>
		<?php else: ?>

		<div class="col-sm-12 col-md-8 col-md-offset-2">
			<div class="the-content">
				<?php the_content(); ?>
			</div>
		</div>

		<?php endif; ?>
	</div>

	<footer class="inner-page-footer">
		<?php
		$field_group_values = simple_fields_fieldgroup("contact_person");

		if($field_group_values) {

			foreach($field_group_values as $val) {
				echo '<div class="contact">';
				echo $val['contact_name'] ? '<span class="name">' . $val['contact_name'] . '</span>' : null;
				echo $val['contact_phone'] ? '<span class="sep">|</span>' . $val['contact_phone'] : null;
				echo $val['contact_email'] ? '<span class="sep">|</span><a href="mailto:' . $val['contact_email'] . '">' . $val['contact_email'] . '</a>' : null;

				echo '</div>';
			}
		}

		?>

	</footer>
<?php endwhile; ?>
