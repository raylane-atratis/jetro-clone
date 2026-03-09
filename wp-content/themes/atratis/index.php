<?php get_header(); ?>


<?php
//Query do banner para o Desktop
$banArgs = array(
	'post_type' => 'banners',
	'tax_query' => array(
		array(
			'taxonomy' => 'posicoes_banner',
			'field'    => 'slug',
			'terms'    => 'desktop',
		),
	),
);

$banQuery = new WP_Query($banArgs);
?>

<?php
//Query do banner para o Mobile
$banArgs2 = array(
	'post_type' => 'banners',
	'tax_query' => array(
		array(
			'taxonomy' => 'posicoes_banner',
			'field'    => 'slug',
			'terms'    => 'mobile',
		),
	),
);

$banQueryMob = new WP_Query($banArgs2);
?>

<!-- Banner Desktop -->
<?php if ($banQuery->have_posts()) : ?>
<div class="owl-banner-principal">
    <div class="owl-carousel owl-carousel-banner owl-theme">

        <?php while ($banQuery->have_posts()) : $banQuery->the_post();
				$img_url = get_the_post_thumbnail_url();

				$titulo = get_field('banner_titulo_html');
				$conteudo = get_field('banner_descricao');

				$btnNome = get_field('nome_btn');
				$btnLink = get_field('link_btn');
				$btnAba = get_field('nova_aba');

				// Posição do conteúdo
				$posicaoConteudo = get_field('posicao_descricao');
				if ($posicaoConteudo == 1) :
					$posConteudo = "";
				elseif ($posicaoConteudo == 2) :
					$posConteudo = "conteudo_banner_direita";
				elseif ($posicaoConteudo == 3) :
					$posConteudo = "conteudo_banner_central";
				endif;

				// Parallax
				$plx = get_field('parallax');
				if ($plx == 1) :
					$parallax = " data-type='background' data-speed='3' ";
				else :
					$parallax = "";
				endif;

				// Camada de cor sobre o banner
				$escolhaCorBanner = get_field('escolha_cor_sobre_banner');
				if ($escolhaCorBanner) :
					$camadaCorB = get_field('camada_cor_banner');
					if ($camadaCorB) :
						$camadaCorBanner = " background-color: " . $camadaCorB . "; ";
					else :
						$camadaCorBanner = "";
					endif;
				endif;

				// Transparência da cor
				$transparencia = get_field('tansparencia_cor');
				if ($transparencia) :
					$transparencia = " opacity: 0." . $transparencia . "; ";
				else :
					$transparencia = "";
				endif;

			?>

        <div class="item" style="background-image: url('<?php echo $img_url; ?>')" <?php echo $parallax; ?>>

            <?php if ($escolhaCorBanner) : ?>
            <div class="bg_color_imagem" style="<?php echo $camadaCorBanner; ?> <?php echo $transparencia; ?> "></div>
            <?php endif; ?>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="texto <?php echo $posConteudo; ?>">

                            <?php if ($titulo) : ?>
                            <h2><?php echo $titulo; ?></h2>
                            <?php endif; ?>
                            <?php if ($conteudo) : ?>
                            <div>
                                <?php echo $conteudo; ?>
                            </div>
                            <?php endif; ?>

                            <a href="
										<?php
										// Link do Banner
										if ($btnLink) :
											echo $btnLink;
										else :
											echo "#";
										endif;
										?>" <?php
											// Nova Aba
											if ($btnAba == true) :
												echo "target='_blank'";
											else :
												echo "";
											endif;
											?> class="bt__padrao">
                                <?php if ($btnNome) : ?>
                                <?php echo $btnNome; ?>
                                <?php else : ?>
                                Saiba mais
                                <?php endif; ?>
                            </a>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php endwhile; ?>

    </div>
    <img src="<?php echo bloginfo('template_url'); ?>/build/images/caixote.png" alt="caixa"
        class="caixaFlutuante move-1">

</div>
<?php endif; ?>

<!-- Banner Desktop -->
<?php if ($banQueryMob->have_posts()) : ?>
<div class="owl-banner-mobile">
    <div id="cases" class="owl-carousel owl-carousel-mobile owl-theme">
        <?php while ($banQueryMob->have_posts()) : $banQueryMob->the_post();
				$img_url = get_the_post_thumbnail_url();

				$titulo = get_field('banner_titulo_html');
				$conteudo = get_field('banner_descricao');

				$btnNome = get_field('nome_btn');
				$btnLink = get_field('link_btn');
				$btnAba = get_field('nova_aba'); ?>

        <div class="item">
            <?php if ($btnLink) : ?>
            <a href="<?php echo $btnLink; ?>" <?php if ($btnAba == true) : echo "target='_blank'";
															else : echo "";
															endif; ?>>
                <?php the_post_thumbnail(); ?>
            </a>
            <?php else : ?>
            <?php the_post_thumbnail(); ?>
            <?php endif; ?>
        </div>

        <?php endwhile; ?>

    </div>

</div>
<?php endif; ?>


<!-- [BLOCOS] Chamar template de blocos -->
<?php get_template_part('blocos'); ?>



<?php get_footer(); ?>