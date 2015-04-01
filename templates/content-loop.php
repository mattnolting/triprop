<?php if(is_page_template('page-blog.php')) : ?>

	<?php $blog_entries = new WP_Query( array( 'post_type' => 'post' )); ?>
	<?php if ( $blog_entries->have_posts() ) :?>
		<section class="header-tags">
			<div class="row">
				<div class="col-sm-6">
					<h3>Filtering Options</h3>
				</div>
				<div class="col-sm-6">
					<?php get_search_form( $echo ); ?>
				</div>
				<div class="col-xs-12">
					<?php wp_get_all_tags(); ?>
				</div>
			</div>
		</section>

		<?php while ( $blog_entries->have_posts() ) : $blog_entries->the_post(); ?>

		<article <?php post_class('blog-post'); ?>>
			<div class="row">
				<div class="col-sm-8">
					<header>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php get_template_part('templates/entry-meta'); ?>
					</header>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
				</div>
				<div class="col-sm-4">
					<?php if(has_tag()): ?>
						<h4>Filter Tags</h4>
						<?php the_tags(''); ?>
					<?php endif; ?>
				</div>
			</div>
		</article>

	<?php endwhile; endif; ?>

<?php else: ?>

	<?php if ( have_posts() ) :?>
		<section class="header-tags">
			<div class="row">
				<div class="col-sm-6">
					<h3>Filtering Options</h3>
				</div>
				<div class="col-sm-6">
					<?php get_search_form( $echo ); ?>
				</div>
				<div class="col-xs-12">
					<?php wp_get_all_tags(); ?>
				</div>
			</div>
		</section>

		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<header>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php get_template_part('templates/entry-meta'); ?>
				</header>
				<div class="entry-summary">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>
<?php endif; ?>