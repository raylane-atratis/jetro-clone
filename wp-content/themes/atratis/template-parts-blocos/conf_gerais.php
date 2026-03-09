<?php // [EXTRA] OPÇÕES GERAIS

// [ESPAÇAMENTOS]
$margintop = get_sub_field('margin-top');
$marginbottom = get_sub_field('margin-bottom');
$paddingtop = get_sub_field('padding-top');
$paddingbottom = get_sub_field('padding-bottom');

if($margintop): $margintop = "margin-top: " . $margintop . "px;"; else: $margintop = ""; endif;
if($marginbottom): $marginbottom = "margin-bottom: " . $marginbottom . "px;"; else: $marginbottom = ""; endif;
if($paddingtop): $paddingtop = "padding-top: " . $paddingtop . "px;"; else: $paddingtop = ""; endif;
if($paddingbottom): $paddingbottom = "padding-bottom: " . $paddingbottom . "px;"; else: $paddingbottom = ""; endif;

// [BACKGROUND]
$escolhaBG = get_sub_field('escolha_background');
$corBG = get_sub_field('cor_bg'); $imagemBG = get_sub_field('imagem_bg');
$parallax = get_sub_field('parallax');
if($parallax == 1):
    $parallax = " cta_paralax ";
else:
    $parallax = "";
endif;


if($escolhaBG == 0):
    $BG = "background-color: " . $corBG . ";";
elseif($escolhaBG == 1):
    $BG = "background-image:url(' " . $imagemBG . " '); background-repeat: no-repeat;";
else:
    $BG = "";
endif;
    
// [COR FONTE]
$corFonte = get_sub_field('cor_fonte');
$corFonte = "color: " . $corFonte . ";"; 
    
// [ANIMAÇÕES]
$escolhaAnimacao = get_sub_field('escolha_animacao');
if($escolhaAnimacao == 0):
    $animacao = "";
    elseif($escolhaAnimacao == 1):
        $animacao = "data-aos='fade-up' data-aos-duration='1000' data-aos-delay='300'";
        elseif($escolhaAnimacao == 2):
            $animacao = "data-aos='fade-down' data-aos-duration='1000' data-aos-delay='300'";
            elseif($escolhaAnimacao == 3):
                $animacao = "data-aos='fade-left' data-aos-duration='1000' data-aos-delay='300'";
                elseif($escolhaAnimacao == 4):
                    $animacao = "data-aos='fade-right' data-aos-duration='1000' data-aos-delay='300'";
                endif;
                    
$geraisCSS = $corFonte . $margintop . $marginbottom . $paddingtop . $paddingbottom . $BG;

// [UTILIZAR VARIÁVEIS]
// Variáveis: $geraisCSS, $corFonte, $animacao, $parallax

?>