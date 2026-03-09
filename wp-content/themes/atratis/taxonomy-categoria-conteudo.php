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
                    <h1>
                        Conteúdos úteis
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">

            <div class="col-12 col-lg-9 ">
                <div class="group-conteudos">

                    <?php
                            if (have_posts()) :
                            ?>
                    <div class="grid-conteudos">

                        <?php while (have_posts()) : the_post(); ?>
                        <?php 
                                $img = get_the_post_thumbnail_url();
                                $title = get_the_title();
                                $excerpt = get_the_excerpt();
                                $iframe_do_video = get_field('iframe_do_video');
                                $encoded_iframe = json_encode($iframe_do_video);
                                ?>
                        <div class="conteudo-util" onclick='abrirVideo(<?php echo $encoded_iframe; ?>);'>

                            <div class="imagem">
                                <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>">
                            </div>
                            <div class="conteudo">
                                <div class="titulo">
                                    <h3><?php echo $title; ?></h3>
                                </div>
                                <div class="descricao">
                                    <p><?php echo $excerpt; ?></p>
                                </div>
                                <div class="link">
                                    Ver vídeo
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                    <?php else: ?>
                    <h3 class="aviso">Nenhum conteúdo encontrado.</h3>

                    <?php endif; ?>


                </div>
            </div>
            <div class="col-lg-3 col-12 side-cat">
                <?php include_once('sidebar-1.php'); ?>
            </div>
        </div>
    </div>
</div>

</div>

<?php get_footer(); ?>