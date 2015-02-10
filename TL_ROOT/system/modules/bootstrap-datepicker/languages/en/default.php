<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * @package    bootstrap-datepicker
 * @author     Thomas Holzeisen <info@holzeisen.de>
 * @copyright  2015 by Thomas Holzeisen
 * @license    LGPL 3.0
 *
 */

$GLOBALS['TL_LANG']['FFL']['bootstrap-datepicker'] = array('Date picker', 'Text field with popup calendar date picking.');

$GLOBALS['TL_LANG']['tl_form_field']['bsdp_adjust'] = array(
	'label' =>         array('Adjustment','Which direction the popup calendar will open.'),
	// for some odd reason sides are swapped between visual placing and adjustment
	// possibly the devs thought of the small arrow instead of the calendar placement
	'options' =>       array('top left'         => 'bottom right',
	                         'top right'        => 'bottom left',
	                         'bottom left'      => 'top right',
	                         'bottom right'     => 'top left',
	                         'auto'             => 'automatically'
	                        ),
);

$GLOBALS['TL_LANG']['tl_form_field']['bsdp_range'] = array(
	'label' =>         array('Timeframe','Timeframe you can choose from.'),
	'options' =>       array('future'           => 'Future dates only',
	                         'past'             => 'Past dates only',
	                         'range'            => 'selected timeframe'
	                        ),
);

$GLOBALS['TL_LANG']['tl_form_field']['bsdp_datemin'] = array('Earliest date','The earliest date you can choose from.');
$GLOBALS['TL_LANG']['tl_form_field']['bsdp_datemax'] = array('Latest date','The latest date you can choose from.');
$GLOBALS['TL_LANG']['tl_form_field']['bsdp_class']   = array('CSS class','You can specify one or more classes here.');


$GLOBALS['TL_LANG']['ERR']['bsdp']['configerror']    = 'The configuration of this input field is wrong, contact site owner.';
$GLOBALS['TL_LANG']['ERR']['bsdp']['datepastonly']   = 'Please choose a date from the past.';
$GLOBALS['TL_LANG']['ERR']['bsdp']['datefutureonly'] = 'Please choose a date from the future.';
$GLOBALS['TL_LANG']['ERR']['bsdp']['dateafter']      = 'Please choose a date past %s.';
$GLOBALS['TL_LANG']['ERR']['bsdp']['datebefore']     = 'Please choose a date before %s.';
