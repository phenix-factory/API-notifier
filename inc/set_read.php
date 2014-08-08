<?php

if (!defined('_ECRIRE_INC_VERSION')) return;

function inc_set_read_dist($id_notification) {
    include_spip('action/editer_objet');
    return objet_modifier('notification', $id_notification, array('lu' => 1));
}