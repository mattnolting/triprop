<header class="masthead navbar navbar-default navbar-static-top" role="banner">
	<?php if(ot_get_option( 'slugline' )): ?>
	<div class="slugline"><?php echo ot_get_option( 'slugline' ); ?></div>
	<?php endif; ?>
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<nav class="collapse navbar-collapse" role="navigation">
			<?php
				if (has_nav_menu('primary_navigation')) :
					wp_nav_menu(
						array(
							'theme_location'    => 'primary_navigation',
							'menu_class'        => 'nav navbar-nav',
							'link_before'            => '<span class="sep">|</span>'
						));
				endif;
			?>
			<a class="brand" href="<?php echo esc_url(home_url('/')); ?>"><?php echo ot_get_option( 'logo_header' ) ? '<img src="' . ot_get_option( 'logo_header' ) . '" alt="Home" />' : bloginfo('name'); ?></a>
		</nav>
	</div>
</header>
