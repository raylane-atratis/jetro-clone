<?php
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

$titulo = get_sub_field('titulo');
$sub_titulo = get_sub_field('sub_titulo');

?>

<?php
// se for single de cases
$id_exc;
if (is_single()) {
    if(is_singular('casos-de-sucesso')){
    $id_exc = get_the_ID();
    } 
} 
//Query das soluções
$args = array(
    'post_type' => 'casos-de-sucesso',
    'posts_per_page' => 4,
    'post__not_in' => array($id_exc),
);

$query = new WP_Query($args);
?>


<section class="secao-cases <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="header-secao center">
                    <h3 class="sub-titulo">
                        <?php echo $sub_titulo; ?>
                    </h3>
                    <h2 class="titulo"><?php echo $titulo; ?></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="lista">

                    <?php if ($query->have_posts()) : ?>
                    <div class="cases-holder">

                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php 
                            $icone = get_field('icone');
                            $resumo = get_field('resumo');
                            // remove tags
                            $resumo = strip_tags($resumo);
                        ?>
                        <a href="<?php the_permalink(); ?>" class="case-item">
                            <?php
										if (has_post_thumbnail()) :
											the_post_thumbnail();
										else : ?>
                            <img src="<?php bloginfo("template_url"); ?>/build/images/sem-imagem-4x3.jpg"
                                alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <div class="blocoTexto">
                                <h3 class="texto"><?php the_title(); ?></h3>
                                <p class="texto"><?php echo wp_trim_words(get_the_content(), 16, '...'); ?></p>
                                <span class="linkFake">Saiba mais</span>
                            </div>
                        </a>
                        <?php endwhile; ?>

                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div>

</section>
<?php wp_reset_postdata(); ?>