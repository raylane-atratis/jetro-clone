<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

// Variáveis
$titulo = get_sub_field('titulo', "option");
$descricao = get_sub_field('descricao', "option");

// Escolha de exibição das logos
$exibicaoLogos = get_sub_field('escolha_exibicao_logos', "option");

?> 

<style>

    .carrossel.parceiros_carousel .item{
        padding: 20px 30px;
        background: #fff;
        border-radius: 14px;
        border: 2px solid #d6d6d6;
        border-bottom: 6px solid #d6d6d6;
        box-shadow: 0px 0px 6px 1px rgba(0, 0, 0, 0.1);
        margin: 10px 0px;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        display: flex;
        min-height: 150px;
    }

</style>

<?php if($exibicaoLogos == 0): ?>
<!-- Listagem de parceiros -->
<div class="carrossel parceiros_carousel <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
    <div class="container mt-5 mb-5 ">
        <div class="row">
            <div class="col-12">

                <div class="titulo">
                    <h2 style="margin-bottom: 10px;"><?php echo $titulo; ?></h2>
                    <p style="margin-bottom: 30px; text-align: center;"><?php echo $descricao; ?></p>
                </div>

                <?php  
                    //Query das soluções
                    $args = array(
                        'post_type' => 'parceiros',
                        'posts_per_page' => -1 
                    );

                    $query = new WP_Query($args);
                ?>

                <?php if($query->have_posts()): ?>
                <div class="owl-padrao-5 owl-carousel owl-theme">

                    <?php while($query->have_posts()) : $query->the_post(); ?>
                    <div class="item" data-aos="fade-up" data-aos-duration="1000">

                        <?php $link = get_field('link'); ?>
                        <?php if($link): ?>
                        <a href="<?php echo $link; ?>" target="_blank">
                        <?php endif; ?>

                            <?php 
                                if(has_post_thumbnail()):
                                    the_post_thumbnail(); 
                                else: ?>
                                <img src="<?php bloginfo("template_url"); ?>/build/images/sem-imagem-4x3.jpg" alt="<?php the_title(); ?>">
                            <?php endif; ?>

                        <?php if($link): ?>
                        </a>
                        <?php endif; ?>
                        
                    </div>
                    <?php endwhile; ?>

                </div>
                <?php endif; //Fim das solucoes ?>
                <?php wp_reset_postdata(); ?>

            </div>
        </div>
    </div>
</div>

<?php else: ?>
<!-- Listagem de logos -->
<div class="carrossel parceiros_carousel <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
    <div class="container mt-5 mb-5 ">
        <div class="row">
            <div class="col-12">

                <div class="titulo">
                    <h2 style="margin-bottom: 10px;"><?php echo $titulo; ?></h2>
                    <p style="margin-bottom: 30px; text-align: center;"><?php echo $descricao; ?></p>
                </div>

                <?php if( have_rows('logos') ): ?>  
                    
                <div class="owl-padrao-5 owl-carousel owl-theme">

                    <?php 
                    while( have_rows('logos') ): the_row(); 
                        $logo = get_sub_field('logo');
                        $link = get_sub_field('link');                            

                        // vars
                        $urlImagem = $logo['url'];
                        $titleImagem = $logo['title'];
                        $altImagem = $logo['alt'];
                    ?>
                    <div class="item" data-aos="fade-up" data-aos-duration="1000">
                        <?php if($link): ?>
                        <a href="<?php echo $link; ?>" target="_blank">
                        <?php endif; ?>

                            <?php if($logo): ?>
                                <img src="<?php echo $urlImagem; ?>" alt="<?php echo $altImagem; ?>" title="<?php echo $titleImagem; ?>"> 
                            <?php else: ?>
                                <img src="<?php bloginfo("template_url"); ?>/build/images/sem-imagem-4x3.jpg" alt="<?php the_title(); ?>">
                            <?php endif; ?>

                        <?php if($link): ?>
                        </a>
                        <?php endif; ?>
                        
                    </div>
                    <?php endwhile; ?>

                </div>
                <?php endif; //Listagem de logos ?>

            </div>
        </div>
    </div>
</div>

<?php endif; ?>

