<?php
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

$modeloS = get_sub_field('modelo_solucoes', "option");

?>

<?php
//Query das soluções
$args = array(
    'post_type' => 'segmentos',
    'posts_per_page' => -1
);

$query = new WP_Query($args);
?>

<?php if ($modeloS == 0) : ?>

<section class="linha_um <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 style="<?php echo $corFonte; ?>"><?php echo get_sub_field('titulo', "option"); ?></h2>
                <p style="<?php echo $corFonte; ?>"><?php echo get_sub_field('descricao', "option"); ?></p>
            </div>
        </div>

        <?php if ($query->have_posts()) : ?>
        <div class="row">
            <div class="col-12">
                <ul>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <a href="<?php the_permalink(); ?>">
                            <span class="img">
                                <?php if (get_field('icone')) : ?>
                                <img src="<?php echo get_field('icone'); ?>" alt="Imagem sobre <?php the_title(); ?>">
                                <?php else : ?>
                                <div class="solucao_sem_icone">
                                    <i class="fa fa-window-close" aria-hidden="true"></i>
                                    <span>SEM ÍCONE</span>
                                </div>
                                <?php endif; ?>
                            </span>
                            <span class="texto"><?php the_title(); ?></span>

                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <?php endif; //Fim das solucoes 
            ?>
        <?php wp_reset_postdata(); ?>

    </div>
</section>

<?php else : ?>

<?php // Grupo de campos do modelo 02 (Cards)
    $grupo02 = get_sub_field('grupo_modelo02_cards', "option");
    $exibirImagens = $grupo02['exibir_imagem'];
    $exibirConteudo = $grupo02['exibir_conteudo'];
    $caracteresConteudo = $grupo02['qtd_caracteres_conteudo'];
    $corL = $grupo02['cor_linha'];

    if ($caracteresConteudo) :
        $caracteresConteudo = $caracteresConteudo;
    else :
        // Caso não tenha valor (Padrão: 26 caracteres)
        $caracteresConteudo = 26;
    endif;

    if ($corL) :
        $corLinha = "background-color: " . $corL . ";";
    else :
        $corLinha = "";
    endif;
    ?>


<section class="solucoes_mod2 <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="titulo">
                    <span style="<?php echo $corFonte; ?>"><?php echo get_sub_field('titulo', "option"); ?></span>
                    <h2 style="<?php echo $corFonte; ?>"><?php echo get_sub_field('descricao', "option"); ?></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="lista">

                    <?php if ($query->have_posts()) : ?>
                    <div class="owl-solucoes-mod2 owl-carousel owl-theme">

                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php 
                            $icone = get_field('icone');
                            $resumo = get_field('resumo');
                            // remove tags
                            $resumo = strip_tags($resumo);
                        ?>
                        <div class="item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">

                            <?php if ($exibirImagens) : ?>
                            <a href="<?php the_permalink(); ?>" class="imagem">
                                <?php if($icone): ?>
                                <img src="<?php echo $icone['url'];?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </a>
                            <?php endif; ?>

                            <h3>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <?php if ($exibirConteudo) : ?>
                            <p><?php echo wp_trim_words($resumo, $caracteresConteudo, '...'); ?></p>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>">Saiba mais</a>

                        </div>
                        <?php endwhile; ?>

                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <?php if (get_sub_field('link_ver_todos', "option")) : ?>
        <div class="row mt-5">
            <div class="col-12">
                <a href="<?php echo get_sub_field('link_ver_todos', "option"); ?>" class="bt__padrao m-auto">
                    Ver todos
                </a>
            </div>
        </div>
        <?php endif; ?>
        <img src="<?php echo bloginfo("template_url"); ?>/build/images/caixote-2.png" alt="caixa"
            class="caixaFlutuanteDois move-2">

    </div>

</section>
<?php wp_reset_postdata(); ?>

<?php endif; ?>