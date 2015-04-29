<div class="search">
	<form role="search" method="get" class="search-form form-inline" action="<?php echo esc_url(home_url('/')); ?>">
		<div class="input-group">
			<input type="search" value="<?php echo get_search_query(); ?>" name="s" class="search-field form-control" placeholder="Search">
      <button type="submit" class="search-submit btn btn-default"><i class="fa fa-search"></i></button>
		</div>
	</form>
</div>
