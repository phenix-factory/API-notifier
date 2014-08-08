<?php
if (!defined('_ECRIRE_INC_VERSION')) return;

function inc_notifier_dist($index, $id_auteur, $parametre = array()) {

    // En premier on test si l'index existe dans le grimoire
    if (!array_key_exists($index, $GLOBALS['notification_grimoire']))
        return false;

    // On va chercher l'API objet de SPIP
    include_spip('action/editer_objet');
    // Et on ajoute la notification dans la base de donnée.
    $notification = array(
        'id_auteur' => $id_auteur,
        'index_notification' => $index,
        'parametre' => serialize($parametre),
        'lu' => 0
    );

    // La notification à été créer ! Il est temps d'envoyer le mail (si besoin)
    if ($GLOBALS['notification_grimoire'][$index]['facteur']) {
        // On a besoin de l'email de l'utilisateur
        $email = sql_getfetsel('email', 'spip_auteurs', 'id_auteur='.intval($id_auteur));
        $envoyer_mail = charger_fonction ('envoyer_mail', 'inc');
        $envoyer_mail(
            $email,
            _T($GLOBALS['notification_grimoire'][$index]['facteur']['sujet'], $parametre),
            array(
                'html' => _T($GLOBALS['notification_grimoire'][$index]['facteur']['corps'], $parametre)
            )
        );
    }

    return objet_inserer('notification',null, $notification);
}
