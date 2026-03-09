

<?php get_header(); ?>

<div class="interna animated fadeIn">

	<div class="barraBC">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php if (is_active_sidebar('breadcrumb')) : ?>
						<?php dynamic_sidebar('breadcrumb'); ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<h2>Busca</h2>
				</div>
			</div>
		</div>
	</div>

    <div class="container single-conteudo">
        <div class="row single">
            <div class="col-12">

				<?php if (!get_search_query()) { ?>
					<h1 class="titulo">Você não digitou nada no campo busca, favor preencher o que procura ou navegue em um dos
						nossos menus.</h1>
				<?php } else { ?>
					<h1 class="titulo"><?php printf('Resultados da busca por: "%s"', get_search_query()); ?></h1>
				<?php } ?>

				<?php if(have_posts()): while(have_posts()) : the_post(); ?>
				<div class="item mr-1">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

					
						<span class="d-block mt-4">
							<h3><?php the_title(); ?></h3>
							
							<p><?php the_excerpt(); ?></p>
						</span>

					</a>

				</div>

				<?php endwhile; else: ?>

				

				<div class="alert alert-warning" role="alert">
					<i class="fa fa-exclamation-circle"></i>
					Não há postagens nesta categoria por enquanto! Volte a navegar no nosso <a href="<?php echo get_category_link(5); ?>">blog</a>.
				</div>

				<?php endif; ?>

               
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>
