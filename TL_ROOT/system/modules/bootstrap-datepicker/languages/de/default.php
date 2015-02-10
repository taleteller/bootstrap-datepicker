<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * @package    bootstrap-datepicker
 * @author     Thomas Holzeisen <info@holzeisen.de>
 * @copyright  2015 by Thomas Holzeisen
 * @license    LGPL 3.0
 *
 */

$GLOBALS['TL_LANG']['FFL']['bootstrap-datepicker'] = array('Datumsauswahl', 'Eingabefeld mit Datumsauswahl im Kalender');

$GLOBALS['TL_LANG']['tl_form_field']['bsdp_adjust'] = array(
	'label' =>         array('Ausrichtung','Plazierung des Popup-Kalenders zum Eingabefeld.'),
	// for some odd reason sides are swapped between visual placing and adjustment
	// possibly the devs thought of the small arrow instead of the calendar placement
	'options' =>       array('top left'         => 'Unten Rechts',
	                         'top right'        => 'Unten Links',
	                         'bottom left'      => 'Oben Rechts',
	                         'bottom right'     => 'Oben Links',
	                         'auto'             => 'Automatisch'
	                        ),
);

$GLOBALS['TL_LANG']['tl_form_field']['bsdp_range'] = array(
	'label' =>         array('Wählbarer Zeitraum','Zeitraum aus dem im Kalender ausgewählt werden kann.'),
	'options' =>       array('future'           => 'Nur Datum aus der Zukunft',
	                         'past'             => 'Nur Datum aus der Vergangenheit',
	                         'range'            => 'Angegebener Zeitrahmen'
	                        ),
);

$GLOBALS['TL_LANG']['tl_form_field']['bsdp_datemin'] = array('Frühester Zeitpunkt','Es kann kein früheres Datum ausgewählt werden.');
$GLOBALS['TL_LANG']['tl_form_field']['bsdp_datemax'] = array('Spätester Zeitpunkt','Es kann kein späteres Datum ausgewählt werden.');
$GLOBALS['TL_LANG']['tl_form_field']['bsdp_class']   = array('CSS-Klasse','Hier können Sie eine oder mehrere Klassen eingeben.');


$GLOBALS['TL_LANG']['ERR']['bsdp']['configerror']    = 'Die Konfiguration dieses Eingabefeldes ist fehlerhaft, bitte benachrichtigen Sie den Seitenbetreiber.';
$GLOBALS['TL_LANG']['ERR']['bsdp']['datepastonly']   = 'Bitte wählen Sie ein Datum aus der Vergangenheit.';
$GLOBALS['TL_LANG']['ERR']['bsdp']['datefutureonly'] = 'Bitte wählen Sie ein Datum aus der Zukunft.';
$GLOBALS['TL_LANG']['ERR']['bsdp']['dateafter']      = 'Bitte wählen Sie ein Datum aus, das nach dem %s liegt.';
$GLOBALS['TL_LANG']['ERR']['bsdp']['datebefore']     = 'Bitte wählen Sie ein Datum aus, das vor dem %s liegt.';
