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
					<h1>Página não encontrada</h1>
				</div>
			</div>
		</div>
	</div>

	<article>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="conteudo" style="text-align:center;">
						A página que você tentou acessar não existe ou está temporariamente indisponível.<br> 
						Deseja voltar para a página inicial?<br><br>
						<a href="<?php echo get_home_url(); ?>" class="bt__padrao"><i class="fa fa-home" aria-hidden="true"></i> Ir para a Home</a>
					</div>
				</div>
			</div>
		</div>
	</article>

</div>

<?php get_footer(); ?>

