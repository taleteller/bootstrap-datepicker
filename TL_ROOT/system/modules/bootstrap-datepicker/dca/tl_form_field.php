<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * @package    bootstrap-datepicker
 * @author     Thomas Holzeisen <info@holzeisen.de>
 * @copyright  2015 by Thomas Holzeisen
 * @license    LGPL 3.0
 *
 */

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['bootstrap-datepicker'] = '{type_legend},type,name,label;{fconfig_legend},mandatory,bsdp_adjust,placeholder,bsdp_range;{expert_legend:hide},value,bsdp_class,accesskey;';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'bsdp_range';
$GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['bsdp_range_range'] = 'bsdp_datemin,bsdp_datemax';


// css classes - we have to introduce a custom field, because contao default class field would be applied to the input field but not the group
$GLOBALS['TL_DCA']['tl_form_field']['fields']['bsdp_class'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['bsdp_class'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''" 
);


// adjustment of the calendar
$GLOBALS['TL_DCA']['tl_form_field']['fields']['bsdp_adjust'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['bsdp_adjust']['label'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('top left','top right','bottom left', 'bottom right', 'auto'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['bsdp_adjust']['options'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(16) NOT NULL default 'top right'"
);

// adjustment of the calendar
$GLOBALS['TL_DCA']['tl_form_field']['fields']['bsdp_range'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['bsdp_range']['label'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('past','future', 'range'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['bsdp_range']['options'],
	'eval'                    => array('tl_class'=>'w50', 'includeBlankOption' => true, 'submitOnChange' => true),
	'sql'                     => "varchar(16) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['bsdp_datemin'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['bsdp_datemin'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'w50  clr'),
	'sql'                     => "varchar(16) NOT NULL default ''" 
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['bsdp_datemax'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['bsdp_datemax'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(16) NOT NULL default ''" 
);
