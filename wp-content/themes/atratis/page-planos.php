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

    <?php 
		$planos = get_field('planos');
		?>

    <?php endwhile;
	endif; // Loop page 
	?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blocoGeral holder-planos">

                    <?php foreach($planos as $plano) : ?>
                    <?php 
							$titulo = $plano["titulo"];
							$link_fazer_solicitacao = $plano["link_fazer_solicitacao"];
							$slug_categorias_plataforma = $plano["slug_categorias_plataforma"];
							?>
                    <div class="planosBloco">
                        <div class="topo">
                            <span>Plano</span>
                            <h2>
                                <?php echo $titulo; ?>
                            </h2>
                        </div>
                        <div class="meio">
                            <?php 
							 $categories = get_terms( array(
								'taxonomy' => 'trilhas-plataforma',
								'hide_empty' => false,
								"order" => "DESC",
							) );
							foreach($categories as $pos => $category):
								?>
                            <h3><?php echo $category->name; ?></h3>
                            <ul>
                                <?php 
								$query = new WP_Query(array(
									'post_type' => 'plataforma-digital',
									'posts_per_page' => -1,
									'orderby' => 'title',
									'order' => 'ASC',
									'tax_query' => array(
										array(
											'taxonomy' => 'trilhas-plataforma',
											'field' => 'slug',
											'terms' => $category->slug
										)
									)
								));
								while($query->have_posts()) : $query->the_post();
								$titulo = get_the_title();
								$tax = get_the_terms($post->ID, 'categoria-plataforma');
								$isActive = true;
								$link = get_the_permalink();

								if (is_array($tax)) {
									foreach($tax as $t) {
										if ($t->slug == $slug_categorias_plataforma) {
											$isActive = false;
										}
									}
								}

								$classeExtra = !$isActive ? "" : "risk";

								?>
                                <a href="<?php echo $link; ?>" class="lis-item <?php  echo $classeExtra;?>">
                                    <i class="fa-solid fa-check"></i>
                                    <?php echo $titulo; ?>
                                </a>

                                <?php 
									endwhile;
									wp_reset_postdata();
								?>
                            </ul>
                            <?php endforeach; ?>
                            <?php 
							$tax_link = get_term_link($slug_categorias_plataforma, 'categoria-plataforma');
							?>
                            <a href="<?php echo $tax_link; ?>" class="bt__padrao branco">Saiba mais</a>
                            <a href="<?php
										echo $link_fazer_solicitacao;
							?>" class="bt__padrao">Fazer solicitação</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>