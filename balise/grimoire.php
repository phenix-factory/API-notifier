<?php

/**
 * Renvoie le tableau correspondant a un index du grimoire.
 * le tableau est renvoyer en JSON afin d'être exploité par javascript
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

function balise_GRIMOIRE_dist($p) {

    $index = interprete_argument_balise(1,$p);

    return calculer_balise_dynamique($p, 'GRIMOIRE', array('id_notification'));
}

function balise_GRIMOIRE_stat($args, $context_compil) {

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

function balise_GRIMOIRE_dyn($index, $args, $id_notification) {
    // On va lire le grimoire

    // récupération de la page du grimoire
    $entre_grimoire = $GLOBALS['notification_grimoire'][$index];
    // Traduction dans une langue
    $entre_grimoire['text'] = _T($entre_grimoire['text'], $args);
    // On ajoute l'id_notification pour pouvoir manipuler l'état de la notification plus tard
    $entre_grimoire['id_notification'] = $id_notification;

    return json_encode($entre_grimoire);
}