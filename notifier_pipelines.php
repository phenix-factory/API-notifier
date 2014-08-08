<?php
/**
 * Utilisations de pipelines par API Notifier
 *
 * @plugin     API Notifier
 * @copyright  2014
 * @author     Phenix
 * @licence    GNU/GPL
 * @package    SPIP\Notifier\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

function notifier_jquery_plugins($scripts) {

    $config = lire_config('notifier');

    if ($config['javascript'])
        $scripts[] = 'lib/noty/js/noty/packaged/jquery.noty.packaged.js';

    return $scripts;
}

function notifier_insert_head($flux) {

    $config = lire_config('notifier');
    if ($config['javascript'])
        $flux .= '<script src="'.produire_fond_statique('javascript/spip_noty.js').'" type="text/javascript"></script>';

    return $flux;
}