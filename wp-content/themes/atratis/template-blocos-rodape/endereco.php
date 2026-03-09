<div class="col-12 col-lg-4">
    <div class="item" data-aos="fade-up" data-aos-duration="1000"  data-aos-delay="300" style="display: flex;justify-content: center;">
        <?php $endereco = get_field('endereco', "option"); ?>
        <?php if($endereco): ?>
        <h4>Endereços</h4>
        <address>
            <?php echo $endereco; ?>
        </address>
        <?php endif; ?>
    </div>
</div>