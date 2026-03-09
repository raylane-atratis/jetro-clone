<form class="form_search" id="search" method="get" value="<?php the_search_query(); ?>" action="<?php echo esc_url(home_url('/')); ?>">
    <h3>Busca</h3>
    <input type="search" name="s" id="input_search" placeholder="Busca">
	<button type="submit">
		<i class="fa fa-search" aria-hidden="true"></i>
	</button>
</form>	