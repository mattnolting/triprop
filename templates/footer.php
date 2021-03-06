<footer class="content-info" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<p><?php echo ot_get_option( 'address' ); ?></p>
			</div>
			<div class="col-sm-6 col-md-6 col-md-offset-1">
				<div class="section-title">Recent News Links</div>
				<?php $blog = new WP_Query( array ( 'post_type' => 'post', 'posts_per_page' => 5 ) ); ?>

				<?php if ($blog->have_posts()): ?>
					<ul>
						<?php while ($blog->have_posts()) : $blog->the_post(); ?>
						<li>
						<?php
							$content = get_the_title($post->ID);
							$trimmed_content = wp_trim_words($content, 8);
						?>
						<a class="hentry" href="<?php the_permalink(); ?>"><?php echo $trimmed_content; ?></a>
<!--							<a class="hentry" href="--><?php //the_permalink(); ?><!--">--><?php //the_title(); ?><!--</a>-->
						</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</footer>
