<?php
/**
 * Options du plugin API Notifierau chargement
 *
 * @plugin     API Notifier
 * @copyright  2014
 * @author     Phenix
 * @licence    GNU/GPL
 * @package    SPIP\Notifier\Options
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


// Un tableau de base si il n'est pas déclarer par l'utilisateur
if (!isset($GLOBALS['notification_grimoire'])) {
    $GLOBALS['notification_grimoire'] =
        array(
            /**
             * Chaque élément indexer contient un tableau "noty" qui sera converti en JSON
             * Les paramètres: http://ned.im/noty/#options
             */
            1 => array(
                'text' => 'Notification de test',
                // alert, success, error, warning, information, confirm
                'type' => 'error',
                // Si jamais on veux envoyer un mail, on créer une entré "facteur" qui contient le tableau du mail
                'facteur' => array(
                    'sujet' => 'Email de test',
                    'corps' => array(
                        'texte' => 'Notifacation de test',
                        'html' => '<strong>Notification de test</strong>',
                        'from' => $GLOBALS['meta']['email_webmaster'],
                        'nom_envoyeur' => $GLOBALS['meta']['nom_site']
                    )
                )
            )
        );
}