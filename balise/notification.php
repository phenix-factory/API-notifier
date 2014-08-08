<?php

/**
 * Déclarer la balise #NOTIFICATION qui affiche le nombre de notification d'un auteur.
 * Cette balise peut s'utiliser dans une boucle ou seul avec un id_auteur en argument.
 */
if (!defined('_ECRIRE_INC_VERSION')) return;

function balise_NOTIFICATION_dist($p) {

    $id_auteur = interprete_argument_balise(1,$p);
    if (!$id_auteur) $id_auteur = champ_sql('id_auteur', $p);

    return calculer_balise_dynamique($p, 'NOTIFICATION', array());
}

function balise_NOTIFICATION_stat($args, $context_compil) {
    return array($args[0]);
}

function balise_NOTIFICATION_dyn($id_auteur) {
    return trouver_nombre_notification($id_auteur);
}

/**
 * Renvoie le nombre de notification d'un auteur
 *
 * @param mixed $id_auteur
 * @access public
 * @return mixed
 */
function trouver_nombre_notification($id_auteur) {
    return sql_countsel('spip_notifications', 'id_auteur = '.intval($id_auteur).' AND lu != 1');
}