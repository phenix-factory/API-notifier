<?php

/**
 * Fichier appeler via AJAX.
 * Il marque une notification comme étant lue.
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

function action_api_lue_dist() {

    $id_notification = _request('arg');

    // Si on est autoriser à marquer la notification comme lue
    if (autoriser('lue', 'notification', $id_notification)) {
        $set_read = charger_fonction('set_read', 'inc');
        $set_read($id_notification);

    }
    // Sinon, bien marqué qu'on est pas trop con et que c'est protégé.
    else {
        include_spip('inc/minipres');
        echo minipres("Pas d'autorisation", $corps="Vous n'avez pas l'autorisation");
        exit();
    }

}