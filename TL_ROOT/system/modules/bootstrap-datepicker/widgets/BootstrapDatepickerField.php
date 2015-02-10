<?php

/**
 * @package    bootstrap-datepicker
 * @author     Thomas Holzeisen <info@holzeisen.de>
 * @copyright  2015 by Thomas Holzeisen
 * @license    LGPL 3.0
 *
 */

use Netzmacht\Bootstrap\Core\Bootstrap;
use Netzmacht\Contao\FormHelper\GeneratesAnElement;
use Netzmacht\Html\Element;

class BootstrapDatepickerField extends Widget implements GeneratesAnElement
{
	// custom template
	protected $strTemplate = 'form_datepicker';
	public function generate()
	{
		// import assets
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/bootstrap-datepicker/assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.js';
		$GLOBALS['TL_CSS'][] = 'system/modules/bootstrap-datepicker/assets/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css';
		// import localized assets, except for 'en' since its embedded
		$langCode = strtolower(substr($GLOBALS['TL_LANGUAGE'],0,2));
		if ($langCode != 'en') {
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/bootstrap-datepicker/assets/bootstrap-datepicker/dist/locales/bootstrap-datepicker.'.$langCode.'.min.js';
		}

		// derive input format for calendar
		$this->inputFormat = strtolower(\Date::getInputFormat());
		// fallback format
		if (!$this->inputFormat) { $this->inputFormat == 'mm/dd/yyyy'; }
		// create the input field
		$input = Element::create('input')
			->addAttributes(
				array(
					'name' => specialchars($this->name),
					'placeholder' => $this->placeholder,
					'maxlength' => strlen($this->inputFormat),
					'value' => $this->value
				)
			);
		if ($this->mandatory) {
			$input->addClass('mandatory')
				->addAttributes(array('required' => true));
		}
		// pass min and max date to the input field
		if ($this->bsdp_range != '') {
			$objToday = new \Date();
			if ($this->bsdp_range == 'past') {
				$this->endDate = $objToday->date;
			} elseif ($this->bsdp_range == 'future') {
				$this->startDate = $objToday->date;
			} elseif ($this->bsdp_range == 'range') {
				$this->startDate = $this->bsdp_datemin;
				$this->endDate = $this->bsdp_datemax;
			}
		}
		// return result
		return $input;
	}

	public function validator($varInput)
	{

		if ($varInput != '') {
			$dateFormat = $GLOBALS['TL_CONFIG']['dateFormat'];

			// first lets validate the input field, and take the stamp of it
			try {
				$objInputDate = new \Date($varInput, $dateFormat);
				$stampInputDate = $objInputDate->dayBegin;
			} catch (\Exception $e) {
				// its not even a date we got submitted, fail hard!
				$this->addError($e->getMessage());
				return '';
			}
			// have we got a contraining time range?
			if ($this->bsdp_range != '') {
				// lets get stamp for today
				$objToday = new \Date();
				$stampToday = $objToday->dayBegin;
				if ($this->bsdp_range == 'past' && $stampInputDate >= $stampToday ) 
				{
					$this->addError($GLOBALS['TL_LANG']['ERR']['bsdp']['datepastonly']);
				} 
				elseif ($this->bsdp_range == 'future' && $stampInputDate < $stampToday ) 
				{
					$this->addError($GLOBALS['TL_LANG']['ERR']['bsdp']['datefutureonly']);
				}
				elseif ($this->bsdp_range == 'range')
				{

					// try to get comparsion dates
					try {
						$stampDateMin = 0;
						$stampDateMax = 0;
						if ($this->bsdp_datemin) { 
							$objDate = new \Date($this->bsdp_datemin,$dateFormat); 
							$stampDateMin = $objDate->dayBegin;
						}
						if ($this->bsdp_datemax) { 
							$objDate = new \Date($this->bsdp_datemax,$dateFormat); 
							$stampDateMax = $objDate->dayBegin;
						}
						// compare the date range
						if ($stampDateMin != 0 && $stampInputDate < $stampDateMin) 
						{
							$this->addError(sprintf($GLOBALS['TL_LANG']['ERR']['bsdp']['dateafter'],$this->bsdp_datemin));
						}
						if ($stampDateMax != 0 && $stampInputDate > $stampDateMax) 
						{
							$this->addError(sprintf($GLOBALS['TL_LANG']['ERR']['bsdp']['datebefore'],$this->bsdp_datemax));
						}

					} catch (\Exception $e) {
						// failed to interpret dates from config
						$this->addError($GLOBALS['TL_LANG']['ERR']['bsdp']['configerror']);
					}
				} // end range_checks
			}
		} //end, we got input
		return $varInput;
	}
}
