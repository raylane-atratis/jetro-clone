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
                    <h2>Blog</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container single-conteudo">
        <div class="row single">
            <div class="col-12 col-lg-9">

                <div class="single_box">
                    <h1 class="titulo"><?php the_title(); ?></h1>

                    <?php 
                        the_content();
                    ?>

                    <!-- [BLOCOS] Chamar template de blocos -->
                    <?php get_template_part('blocos'); ?>

                    <?php 
						get_template_part("share");
						?>
                </div>
            </div>
            <?php include('sidebar.php'); ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>