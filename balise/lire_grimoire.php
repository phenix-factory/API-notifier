<?php

/**
 * Renvoie le tableau correspondant a un index du grimoire.
 * le tableau est renvoyer en JSON afin d'être exploité par javascript
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

function balise_LIRE_GRIMOIRE_dist($p) {
    return calculer_balise_dynamique($p, 'LIRE_GRIMOIRE', array('id_notification', 'index_notification'));
}

function balise_LIRE_GRIMOIRE_stat($args, $context_compil) {

    $index = $args[1];
    $id_notification = $args[0];
    // On récupère args
    $parametre = unserialize(
        sql_getfetsel(
            'parametre',
            'spip_notifications',
            'id_notification='.intval($id_notification)
        )
    );

    return array($index, $parametre, $id_notification);
}

function balise_LIRE_GRIMOIRE_dyn($index, $args, $id_notification) {
    // On va lire le grimoire

    // récupération de la page du grimoire
    $entre_grimoire = $GLOBALS['notification_grimoire'][$index];

    // S'il n'y a pas de squelette référencé, c'est une chaine de langue
    if (!$GLOBALS['notification_grimoire'][$index]['squelette'])
        // Traduction dans une langue
        $entre_grimoire['text'] = _T($entre_grimoire['text'], $args);
    // Sinon, on récupère le squelette qui correspond
    else {
        $entre_grimoire['text'] = recuperer_fond(
            $GLOBALS['notification_grimoire'][$index]['squelette'],
            $args
        );
    }

    return $entre_grimoire['text'];
}