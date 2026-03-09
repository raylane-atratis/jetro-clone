<?php get_header(); ?>

<?php 
	$titulo_banner = get_field('titulo_banner');
	$descricao_banner = get_field('descricao_banner');
	$link_cta = get_field('link_cta');
	$texto_cta = get_field('texto_cta');
	$imagem_fundo = get_field('imagem_fundo');
	$imagem_lado = get_field('imagem_lado');
?>

<div class="banner-interna"
    style="background-image: url(<?php echo $imagem_fundo["url"]; ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container">
        <img src="<?php echo bloginfo('template_url'); ?>/build/images/caixote.png" alt="caixa"
            class="caixaFlutuante move-1">
        <div class="row">
            <div class="col-lg-6 text-side">
                <div class="texto">
                    <h1><?php echo $titulo_banner; ?></h1>
                    <p><?php echo $descricao_banner; ?></p>
                    <a class="bt__padrao" href="<?php echo $link_cta; ?>">
                        <?php echo $texto_cta; ?>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 img-side">
                <div class="imagem">
                    <img src="<?php echo $imagem_lado["url"]; ?>" alt="img">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="interna animated fadeIn">



    <!-- [BLOCOS] Chamar template de blocos -->
    <?php get_template_part('blocos'); ?>

</div>

<?php get_footer(); ?>