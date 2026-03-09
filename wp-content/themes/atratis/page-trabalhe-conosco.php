<?php get_header(); ?>

<div class="interna trabalhePage animated fadeIn">
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

    <div class="container" style="margin-block: 80px;">
        <div class="row">
            <div class="col-lg-4">
                <div class="header-secao">
                    <?php 
						$sub_titulo = get_field('sub_titulo');
						$titulo = get_field('titulo');
						$conteudo = get_field('conteudo');
						$form = get_field('shotcode_cf7');
					?>
                    <?php if($sub_titulo): ?>
                    <h3 class="sub-titulo"><?php echo $sub_titulo; ?></h3>
                    <?php endif; ?>

                    <?php if($titulo): ?>
                    <h2 class="titulo"><?php echo $titulo; ?></h2>
                    <?php endif; ?>

                    <?php if($conteudo): ?>
                    <p class="content">
                        <?php echo $conteudo; ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-8">
                <?php echo do_shortcode($form); ?>
            </div>
        </div>
    </div>



    <?php endwhile;
	endif; // Loop page 
	?>

</div>

<?php get_footer(); ?>