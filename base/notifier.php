<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     API Notifier
 * @copyright  2014
 * @author     Phenix
 * @licence    GNU/GPL
 * @package    SPIP\Notifier\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Déclaration des alias de tables et filtres automatiques de champs
 *
 * @pipeline declarer_tables_interfaces
 * @param array $interfaces
 *     Déclarations d'interface pour le compilateur
 * @return array
 *     Déclarations d'interface pour le compilateur
 */
function notifier_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['notifications'] = 'notifications';

	return $interfaces;
}


/**
 * Déclaration des objets éditoriaux
 *
 * @pipeline declarer_tables_objets_sql
 * @param array $tables
 *     Description des tables
 * @return array
 *     Description complétée des tables
 */
function notifier_declarer_tables_objets_sql($tables) {

	$tables['spip_notifications'] = array(
		'type' => 'notification',
		'principale' => "oui",
		'field'=> array(
			"id_notification"    => "bigint(21) NOT NULL",
			"id_auteur"          => "bigint(21) NOT NULL DEFAULT 0",
			"index_notification" => "text NOT NULL DEFAULT ''",
			"parametre" => "text NOT NULL DEFAULT ''",
			"lu"                 => "int(6) NOT NULL DEFAULT 0",
			"date"               => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_notification",
		),
		'titre' => "'' AS titre, '' AS lang",
		'date' => "date",
		'champs_editables'  => array(),
		'champs_versionnes' => array(),
		'rechercher_champs' => array("id_auteur" => 8),
		'tables_jointures'  => array(),


	);

	return $tables;
}



?>