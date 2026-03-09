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
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php if (trim($post->post_content) != "") : ?>
				<article>
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="conteudo">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
				</article>
			<?php endif; ?>

			<!-- [BLOCOS] Chamar template de blocos -->
			<?php get_template_part('blocos'); ?>

			

	<?php endwhile;
	endif; // Loop page 
	?>

</div>

<?php get_footer(); ?>