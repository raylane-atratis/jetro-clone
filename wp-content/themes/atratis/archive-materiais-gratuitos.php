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

    <?php if (have_posts()) : ?>
    <section class="linha_um">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="grid-materiais-gratuitos">

                        <?php while (have_posts()) : the_post(); ?>
                        <?php 
					 	$title = get_the_title();
						$thumb = get_the_post_thumbnail_url();
						$link_externo = get_field('link_externo');  
					   ?>

                        <a target="_blank" href="<?php echo $link_externo; ?>" class="material-gratuito">
                            <img src="<?php echo $thumb; ?>" alt="">
                            <div class="content">
                                <h3><?php echo $title; ?></h3>
                                <p class="bt__padrao">Saiba mais</p>
                            </div>
                        </a>

                        <?php endwhile; ?>
                    </div>
                    <div class="container">
                        <div class="wp-pagenavi" role="navigation">
                            <?php wp_pagenavi(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

</div>

<?php get_footer(); ?>