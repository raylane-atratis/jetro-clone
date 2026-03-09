<!-- MODAL -->
<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" onclick="hideModal()">
  <div class="modal-dialog" role="document">
    <div class="modal-content" onclick="event.stopPropagation();">
      <h2 class="modal-title"></h2>
      <div class="modal-header" onclick="hideModal()">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="ModalEventosContent">
        ...
      </div>
    </div>
  </div>
</div>


<?php
// [BACKGROUND]
$escolhaBG = get_field('escolha_background', "option");
$corBG = get_field('cor_bg', "option");
$imagemBG = get_field('imagem_bg', "option");
$parallax = get_field('parallax', "option");
if ($parallax == 1) :
	$parallax = " cta_paralax_rodape ";
else :
	$parallax = "";
endif;


if ($escolhaBG == 0) :
	$BG = "background: url(" . get_bloginfo('template_url') . "/build/images/footer.svg)," . $corBG . ";";

elseif ($escolhaBG == 1) :
	$BG = "background-image:url(' " . $imagemBG . " '); background-repeat: repeat;";
else :
	$BG = "";
endif;

// [COR FONTE]
$corFonte = get_field('cor_fonte', "option");
$corFonteHTML = "color: " . $corFonte . " !important;";

$geraisCSSRodape = $corFonteHTML . $BG;

// Mapa
$mapa = get_field('mapa', "option");
$aparecerMapa = get_field('aparecer_mapa', "option");

// News
$news = get_field('news_rodape', "option");
$aparecerNews = get_field('mostrar_news_rodape', "option");

// Rodape
$rodapeModelo1 = get_field('modelo_rodape01', "option");
$rodapeEsquerda = $rodapeModelo1['footer_coluna_esquerda'];
$rodapeCentro = $rodapeModelo1['footer_coluna_centro'];
$rodapeDireita = $rodapeModelo1['footer_coluna_direita'];

$selecaoRodapeEsquerda = $rodapeEsquerda['selecionar_footer_coluna_esquerda'];
$selecaoRodapeCentro = $rodapeCentro['selecionar_footer_coluna_centro'];
$selecaoRodapeDireita = $rodapeDireita['selecionar_footer_coluna_direita'];
?>

<?php if ($aparecerMapa == 0) : // Se não tiver mapa 
?>

<?php elseif ($aparecerMapa == 1) : // Aparecer em todas as páginas 
?>
<?php if ($mapa) : ?>
<div class="mapa">
  <?php echo $mapa; ?>
</div>
<?php endif; ?>
<?php elseif ($aparecerMapa == 2) : // Aparecer na Página Inicial 
?>
<?php if (is_front_page()) : ?>
<?php if ($mapa) : ?>
<div class="mapa">
  <?php echo $mapa; ?>
</div>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<!-- BOTÃO WHATSAPP -->
<a href="https://api.whatsapp.com/send?phone=558531338500" target="_blank" class="btn-whatsapp">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px" fill-rule="evenodd"
    clip-rule="evenodd">
    <path fill="#fff"
      d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z" />
    <path fill="#fff"
      d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z" />
    <path fill="#cfd8dc"
      d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z" />
    <path fill="#40c351"
      d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z" />
    <path fill="#fff" fill-rule="evenodd"
      d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
      clip-rule="evenodd" />
  </svg>
</a>


<footer class=" <?php echo $addcssfooter; ?> <?php echo $parallax; ?> " style="<?php echo $geraisCSSRodape; ?>">

  <div class="container">
    <div class="row">

      <?php
			// Coluna da Esquerda
			if ($selecaoRodapeEsquerda) :

				if ($selecaoRodapeEsquerda == 1) : // Logo
					get_template_part('template-blocos-rodape/logo');
				elseif ($selecaoRodapeEsquerda == 2) : // Menus 
					get_template_part('template-blocos-rodape/menu');
				elseif ($selecaoRodapeEsquerda == 3) : // Redes Sociais 
					get_template_part('template-blocos-rodape/redes_sociais');
				elseif ($selecaoRodapeEsquerda == 4) : // Endereço 
					get_template_part('template-blocos-rodape/endereco');
				elseif ($selecaoRodapeEsquerda == 5) : // Endereço + Redes Sociais 
					get_template_part('template-blocos-rodape/endereco-redes_sociais');
				elseif ($selecaoRodapeEsquerda == 6) : // Bloco de Texto 
			?>
      <div class="col-12 col-lg-4">
        <div class="item fones">
          <?php echo $rodapeEsquerda['bloco_de_texto_esquerda']; ?>
        </div>
      </div>
      <?php
				endif;

			endif;

			// Coluna do Centro
			if ($selecaoRodapeCentro) :

				if ($selecaoRodapeCentro == 1) : // Logo
					get_template_part('template-blocos-rodape/logo');
				elseif ($selecaoRodapeCentro == 2) : // Menus 
					get_template_part('template-blocos-rodape/menu');
				elseif ($selecaoRodapeCentro == 3) : // Redes Sociais 
					get_template_part('template-blocos-rodape/redes_sociais');
				elseif ($selecaoRodapeCentro == 4) : // Endereço 
					get_template_part('template-blocos-rodape/endereco');
				elseif ($selecaoRodapeCentro == 5) : // Endereço + Redes Sociais 
					get_template_part('template-blocos-rodape/endereco-redes_sociais');
				elseif ($selecaoRodapeCentro == 6) : // Bloco de Texto 
				?>
      <div class="col-12 col-lg-4">
        <div class="item fones">
          <?php echo $rodapeCentro['bloco_de_texto_centro']; ?>
        </div>
      </div>
      <?php
				endif;

			endif;

			// Coluna da Direita
			if ($selecaoRodapeDireita) :

				if ($selecaoRodapeDireita == 1) : // Logo
					get_template_part('template-blocos-rodape/logo');
				elseif ($selecaoRodapeDireita == 2) : // Menus 
					get_template_part('template-blocos-rodape/menu');
				elseif ($selecaoRodapeDireita == 3) : // Redes Sociais 
					get_template_part('template-blocos-rodape/redes_sociais');
				elseif ($selecaoRodapeDireita == 4) : // Endereço 
					get_template_part('template-blocos-rodape/endereco');
				elseif ($selecaoRodapeDireita == 5) : // Endereço + Redes Sociais 
					get_template_part('template-blocos-rodape/endereco-redes_sociais');
				elseif ($selecaoRodapeDireita == 6) : // Bloco de Texto 
				?>
      <div class="col-12 col-lg-4">
        <div class="item fones">
          <?php echo $rodapeDireita['bloco_de_texto_direita']; ?>
        </div>
      </div>
      <?php
				endif;

			endif;

			?>

    </div>
  </div>

  <div class="final">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="fim">
            <span><?php echo get_field('copy', "option"); ?></span>
            <hr />
            <div class="assinatura">
              <h2>
                <a href="http://www.atratis.com.br" target="_blank" class="ir"
                  title="Site criado pela agência Atratis Digital de Fortaleza - Ceará. Inbound Marketing, Criação de Sites, Mídias Sociais e mais.">Site
                  criado por Atratis, uma agência de comunicação digital de Fortaleza - Ceará</a>
              </h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</footer>

<?php wp_enqueue_style('dashicons'); ?>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>


<script src="<?php bloginfo("template_url"); ?>/build/js/scripts.min.js"></script>
<script src="<?php bloginfo("template_url"); ?>/build/js/jquery.fancybox.min.js"></script>
<script src="<?php bloginfo("template_url"); ?>/build/js/sweetalert2.js"></script>
<?php wp_footer(); ?>

<script>
jQuery(document).ready(function() {
  jQuery(document).on('change', '#estado-selector', function(e) {
    e.preventDefault();
    $.ajax({
      type: "GET",
      headers: {
        'Content-Type': 'application/json'
      },
      data: {},
      url: 'https://jetro.com.br/back/produtos/cidades/' + this.value,
      success: function(data) {
        var cidadejJS = JSON.stringify(data);;
        cidadeparseJSON = jQuery.parseJSON(cidadejJS);
        var selcString = '<option value="--" disabled>Selecione uma cidade...</option>';

        jQuery.each(cidadeparseJSON, function(index, value) {
          selcString += '<option value="' + value.ID + '">' + value.Nome + '</option>';
        });

        var segtoSelec = $('#cidade-selector');

        segtoSelec
          .find('option')
          .remove()
          .end()
          .append(selcString)
          .val('whatever');

        $("#cidade-selector option[value='--']").attr("selected", "selected");

      },
      error: function(jqXHR, textStatus, errorThrown) {
        $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
      }
    });
  });

  jQuery(document).on('change', '#estado-selector-nome', function(e) {
    e.preventDefault();
    $.ajax({
      type: "GET",
      headers: {
        'Content-Type': 'application/json'
      },
      data: {},
      url: 'https://jetro.com.br/back/produtos/cidades/' + this.value,
      success: function(data) {
        var cidadejJS = JSON.stringify(data);;
        cidadeparseJSON = jQuery.parseJSON(cidadejJS);
        var selcString = '<option value="--" disabled>Selecione uma cidade...</option>';

        jQuery.each(cidadeparseJSON, function(index, value) {
          selcString += '<option value="' + value.Nome + '">' + value.Nome + '</option>';
        });

        var segtoSelec = $('#cidade-selector');

        segtoSelec
          .find('option')
          .remove()
          .end()
          .append(selcString)
          .val('whatever');

        $("#cidade-selector option[value='--']").attr("selected", "selected");

      },
      error: function(jqXHR, textStatus, errorThrown) {
        $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
      }
    });
  });

  $.ajax({
    type: "GET",
    headers: {
      'Content-Type': 'application/json'
    },
    data: {},
    url: 'https://jetro.com.br/back/storage/segments/segments.json',
    success: function(data) {
      var data = JSON.stringify(data);;
      var segmentosobjJS = data;
      segmeparseJSON = jQuery.parseJSON(segmentosobjJS);
      var selcString = '<option value="--" disabled>Selecione um segmento...</option>';

      jQuery.each(segmeparseJSON, function(index, value) {
        selcString += '<option value="' + value.id + '">' + value.descricao + '</option>';
      });

      var segtoSelec = $('#segmentos-selector');

      segtoSelec
        .find('option')
        .remove()
        .end()
        .append(selcString)
        .val('whatever');

      $("#segmentos-selector option[value='--']").attr("selected", "selected");

    },
    error: function(jqXHR, textStatus, errorThrown) {
      $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
    }
  });


});

jQuery('.owl-padrao-5').owlCarousel({
  loop: false,
  margin: 20,
  dots: false,
  nav: true,
  smartSpeed: 900,
  navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 5
    },
    1000: {
      items: 5
    }
  }
});

const tabLinks = document.querySelectorAll('.tab-links a');
const tabPanels = document.querySelectorAll('.tab-panel');

tabLinks.forEach((link) => {
  link.addEventListener('click', (e) => {
    e.preventDefault();

    // Remove a classe "active" de todos os links de tab
    tabLinks.forEach((link) => {
      link.classList.remove('active');
    });

    // Adiciona a classe "active" no link clicado
    link.classList.add('active');

    // Esconde todos os painéis de tab
    tabPanels.forEach((panel) => {
      panel.classList.remove('active');
    });

    // Exibe o painel correspondente ao link clicado
    const target = link.dataset.tab;
    const panel = document.querySelector('#' + target);
    panel.classList.add('active');
  });
});
</script>

<?php echo get_field('acf-rodape-codigo', "option"); ?>

</body>

</html>