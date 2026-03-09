<?php
/**
 * Plugin Name: Atratis Auto Updates
 * Description: Ativa atualizações automáticas para o WordPress e plugins
 * Version: 1.0
 * Author: Atratis
 */

//Ativar atualizações automáticas para o WordPress core (versões principais e secundárias)
add_filter('auto_update_core', '__return_true');

//Ativar atualizações automáticas para plugins
add_filter('auto_update_plugin', '__return_true');

