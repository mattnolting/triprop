<?php if(is_page_template('page-blog.php')) : ?>
	<?php $blog_entries = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 4 )); ?>
	<?php if ( $blog_entries->have_posts() ) :?>
		<?php get_template_part('templates/header-tags'); ?>
		<?php while ( $blog_entries->have_posts() ) : $blog_entries->the_post(); ?>
		<article <?php post_class('blog-post'); ?>>
			<div class="row">
				<div class="col-sm-8">
					<header>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php get_template_part('templates/entry-meta'); ?>
					</header>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<?php if ( has_post_thumbnail($post->ID) ): ?>
					<div class="thumbnail">
						<?php the_post_thumbnail(); ?>
					</div>
					<?php endif; ?>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="filter-tags">
						<?php if(has_tag()): ?>
							<h4>Filter Tags</h4>
							<?php the_tags('', ''); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</article>
		<?php endwhile; ?>
		<?php if(function_exists('tw_pagination')) tw_pagination($blog_entries); ?>
	<?php endif; ?>
<?php else: ?>

	<?php if ( have_posts() ) :?>
		<?php get_template_part('templates/header-tags'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<div class="row">
					<div class="col-sm-8">
						<header>
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php get_template_part('templates/entry-meta'); ?>
						</header>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-8">
						<?php if ( has_post_thumbnail($post->ID) ): ?>
							<div class="thumbnail">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>
						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="filter-tags">
							<?php if(has_tag()): ?>
								<h4>Filter Tags</h4>
								<?php the_tags('', ''); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php if(function_exists('tw_pagination')) tw_pagination(); ?>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>
<?php endif; ?>