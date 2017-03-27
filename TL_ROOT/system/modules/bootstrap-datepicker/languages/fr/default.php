<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * @package    bootstrap-datepicker
 * @author     Thomas Holzeisen <info@holzeisen.de>
 * @copyright  2015 by Thomas Holzeisen
 * @license    LGPL 3.0
 *
 */

// Yes i know, this translation is wonky!
// Any native frech speaker is welcome to provide better text!

$GLOBALS['TL_LANG']['FFL']['bootstrap-datepicker'] = array('Sélection de la date', 'Champ de texte avec la date popup calendrier cueillette.');
$GLOBALS['TL_LANG']['FFL']['bootstrap-rangepicker'] = array('Sélection de la période', 'Boîte avec deux champs de date dans le calendrier des périodes.');

$GLOBALS['TL_LANG']['tl_form_field']['bsdp_adjust'] = array(
	'label' =>         array('Ajustement','Quelle direction le calendrier contextuel se ouvre.'),
	'options' =>       array('top left'         => 'en haut à droite',
	                         'top right'        => 'en haut à gauche',
	                         'bottom left'      => 'en bas à droite',
	                         'bottom right'     => 'en basà gauche',
	                         'auto'             => 'automatique'
	                        ),
);

$GLOBALS['TL_LANG']['tl_form_field']['bsdp_range'] = array(
	'label' =>         array('Période','Délai vous pouvez choisir.'),
	'options' =>       array('future'           => 'Dates futures seulement',
	                         'past'             => 'Dates passées seulement',
	                         'range'            => 'période sélectionnée'
	                        ),
);

$GLOBALS['TL_LANG']['tl_form_field']['bsdp_delimiter'] = array('Les champs delimiter','Séparateur entre les champs de date, trait d\'union sauf définition contraire.');
$GLOBALS['TL_LANG']['tl_form_field']['bsdp_datemin'] = array('première date','La première date vous pouvez choisir parmi.');
$GLOBALS['TL_LANG']['tl_form_field']['bsdp_datemax'] = array('date limite','La dernière date à laquelle vous pouvez choisir parmi.');
$GLOBALS['TL_LANG']['tl_form_field']['bsdp_class']   = array('CSS class','Vous pouvez spécifier un ou plusieurs classe ici.');


$GLOBALS['TL_LANG']['ERR']['bsdp']['configerror']    = 'La configuration de ce champ de saisie est erronée, propriétaire du site de contact.';
$GLOBALS['TL_LANG']['ERR']['bsdp']['datepastonly']   = 'Se il vous plaît choisir une date du passé.';
$GLOBALS['TL_LANG']['ERR']['bsdp']['datefutureonly'] = 'Se il vous plaît choisir une date de l\'avenir.';
$GLOBALS['TL_LANG']['ERR']['bsdp']['dateafter']      = 'Se il vous plaît choisir une date passée %s.';
$GLOBALS['TL_LANG']['ERR']['bsdp']['datebefore']     = 'Se il vous plaît choisir une date antérieure %s.';
