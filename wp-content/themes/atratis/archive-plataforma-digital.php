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

    <!-- [BLOCOS] Chamar template de blocos -->
    <?php get_template_part('blocos'); ?>

</div>

<?php get_footer(); ?>