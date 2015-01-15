<footer class="content-info" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 logo-left">
				<a class="brand brand-secondary" href="<?php echo esc_url(ot_get_option( 'footer_logo_left_url' )); ?>"><?php echo ot_get_option( 'footer_logo_left' ) ? '<img src="' . ot_get_option( 'footer_logo_left' ) . '" alt="Home" />' : bloginfo('name'); ?></a>
			</div>
			<div class="col-sm-4 logo">
				<a class="brand" href="<?php echo esc_url(home_url('/')); ?>"><?php echo ot_get_option( 'logo_footer' ) ? '<img src="' . ot_get_option( 'logo_footer' ) . '" alt="Home" />' : bloginfo('name'); ?></a>
			</div>
			<div class="col-sm-4 address">
				<?php echo ot_get_option( 'address' ); ?>
			</div>
		</div>
	</div>
</footer>
