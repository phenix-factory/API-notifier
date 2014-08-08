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

    $scripts[] = 'lib/noty/js/noty/packaged/jquery.noty.packaged.js';

    return $scripts;
}

function notifier_insert_head($flux) {

    $flux .= '<script src="'.produire_fond_statique('javascript/spip_noty.js').'" type="text/javascript"></script>';

    return $flux;
}