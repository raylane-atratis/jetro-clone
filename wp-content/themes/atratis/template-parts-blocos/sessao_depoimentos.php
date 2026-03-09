<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

$titulo = get_sub_field('titulo');
$sub_titulo = get_sub_field('sub_titulo');
$laptop_flutuante = get_sub_field('laptop_flutuante');
?>

<?php  
    //Query dos depoimentos - Limitado 3
    $args = array(
        'post_type' => 'depoimentos',
        'posts_per_page' => 3 
    );
    $query = new WP_Query($args);

?>

<div class="depoimentosBloco <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>; position: relative;"
    <?php echo $animacao; ?>>


    <div class="container">
        <?php if($laptop_flutuante): ?>
        <img src="<?php echo bloginfo("template_url"); ?>/build/images/laptop.png" alt="caixa"
            class="caixaFlutuanteQuatro move-1">
        <?php endif; ?>
        <div class="row justify-content-md-center">
            <div class="col-12">
                <div class="header-secao center">
                    <?php if($sub_titulo): ?>
                    <h3 class="sub-titulo"><?php echo $sub_titulo; ?></h3>
                    <?php endif; ?>

                    <?php if($titulo): ?>
                    <h2 class="titulo"><?php echo $titulo; ?></h2>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-10">

                <div class="tab-nav">
                    <div class="tab-links">
                        <?php if($query->have_posts()): 
                                $counter = 1;
                                while($query->have_posts()): 
                                    $query->the_post();
                                    $image = get_the_post_thumbnail_url();
                                    $title = get_the_title();
                                    $informacao_sobre_autor = get_field('informacao_sobre_autor');
                                    ?>
                        <a href="#" <?php if($counter == 1): ?> class="active" <?php endif; ?>
                            data-tab="tab<?php echo $counter; ?>">
                            <img src="<?php echo $image; ?>" alt="foto">
                            <span>
                                <strong><?php the_title(); ?></strong>
                                <?php echo $informacao_sobre_autor; ?>
                            </span>
                        </a>
                        <?php 
                        $counter++;
                        endwhile; endif; wp_reset_postdata(); ?>
                    </div>
                    <div class="tab-content">

                        <?php if($query->have_posts()): 
                                $counter = 1;
                                while($query->have_posts()): 
                                    $query->the_post();
                                        $content = get_the_content();
                                    ?>
                        <div id="tab<?php echo $counter; ?>"
                            class="tab-panel <?php if($counter == 1){ echo  "active"; } ?>">
                            <i class="fa-solid fa-quote-left"></i>
                            <?php echo $content; ?>
                        </div>
                        <?php 
                        $counter++;
                        endwhile; endif; wp_reset_postdata(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>