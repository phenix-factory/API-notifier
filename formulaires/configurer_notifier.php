<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function formulaires_configurer_notifier_saisies_dist() {

    $saisies = array(
        array(
            'saisie' => 'oui_non',
            'options' => array(
                'nom' => 'javascript',
                'label' => _T('notifier:javascript')
            )
        )
    );

    return $saisies;
}

function formulaires_configurer_notifier_charger_dist() {
    return lire_config('notifier');
}