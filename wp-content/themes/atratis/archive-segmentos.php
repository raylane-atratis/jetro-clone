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
                    <h1><?php echo $title = post_type_archive_title('', false); ?></h1>
                </div>
            </div>
        </div>
    </div>

    <?php if (have_posts()) : ?>
    <section class="linha_um">

        <?php 
		$pos = 0;
		while (have_posts()) : the_post();
		$pos++;
		?>

        <?php 
		$title_post = get_the_title();
		$imagem = get_the_post_thumbnail_url();
		$resumo = get_field('resumo');
		$direcao = ($pos%2 == 0) ? 'img-direita' : 'img-esquerda';
		$link = get_the_permalink();
		?>
        <section class="secaoTextoImagem interna-segmentos <?php echo $direcao;?>"
            style="padding-block: 60px; display: flex;">

            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6">
                        <div class="imagem">
                            <div class="box">
                                <img src="<?php echo $imagem; ?>" alt="Imagem sobre <?php echo $title_post; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="texto" <?php echo $animacaoConteudo; ?>>
                            <div class="header-secao" style="margin-bottom: 10px;">
                                <h2 class="titulo"><?php echo $title_post; ?></h2>
                            </div>
                            <?php echo $resumo; ?>
                            <a class="bt__padrao" href="<?php echo $link; ?>">
                                Saiba mais
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; ?>
    </section>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

</div>

<?php get_footer(); ?>