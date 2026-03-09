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
    <div class="container conteudos-uteis">
        <div class="row">

            <div class="col-12 col-lg-9">

                <?php if (have_posts()) : ?>
                <section class="linha_um">
                    <?php 
                        // categories = categoria-conteudo
                        $categories = get_terms( array(
                            'taxonomy' => 'categoria-conteudo',
                            'hide_empty' => false,
                            "order" => "DESC"
                        ) );
                        foreach ($categories as $category) :
                        ?>
                    <div class="group-conteudos">

                        <h2 class="conteudo-type"><?php echo $category->name; ?></h2>

                        <?php
                            $args = array(
                                'post_type' => 'conteudos-uteis',
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'categoria-conteudo',
                                        'field' => 'slug',
                                        'terms' => $category->slug,
                                    ),
                                ),
                            );
                            $query = new WP_Query($args);
                            if ($query->have_posts()) :
                            ?>
                        <div class="grid-conteudos">

                            <?php while ($query->have_posts()) : $query->the_post(); ?>
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
                    <?php endforeach; ?>
                </section>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="col-lg-3 col-12 side-cat">
                <?php include_once('sidebar-1.php'); ?>
            </div>
        </div>
    </div>
</div>

</div>

<?php get_footer(); ?>