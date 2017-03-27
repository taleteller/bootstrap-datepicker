<?php

/**
 * @package    bootstrap-datepicker
 * @author     Thomas Holzeisen <info@holzeisen.de>
 * @copyright  2015 by Thomas Holzeisen
 * @license    LGPL 3.0
 *
 */

class BootstrapRangepickerField extends TextField
{
	// custom template
	protected $strTemplate = 'form_textfield';
	public function generate()
	{

 		// derive input format for calendar
 		$this->inputFormat = strtolower(\Date::getInputFormat());
 		// fallback format
 		if (!$this->inputFormat) { $this->inputFormat == 'mm/dd/yyyy'; }
 		// derive language code
                $langCode = strtolower(substr($GLOBALS['TL_LANGUAGE'],0,2));
 		

                // additional attributes for input fields
 		$attr = '';
		if ($this->mandatory) {
                        $attr .= ' required="required"';
		}
		
		// additional parameters to pass with script
		$params = '';
		
		// pass min and max date to the parameters
		if ($this->bsdp_range != '') {
			$objToday = new \Date();
			if ($this->bsdp_range == 'past') {
                                $params .= sprintf(", endDate: '%s'",$objToday->date);
			} elseif ($this->bsdp_range == 'future') {
                                $params .= sprintf(", startDate: '%s'",$objToday->date);
			} elseif ($this->bsdp_range == 'range') {
                                if ($this->bsdp_datemin != '') {
                                    $params .= sprintf(", startDate: '%s'",$this->bsdp_datemin);
                                }
                                if ($this->bsdp_datemax != '') {
                                    $params .= sprintf(", endDate: '%s'",$this->bsdp_datemax);
                                }
			}
		}
 		
 		

                // first input field
                $result = sprintf('<input type="text" name="%s[]" id="ctrl_start_%s" class="form-control" value="%s"%s>',
                        $this->strName,
                        $this->strId,
                        specialchars($this->varValue[0]),
                        $attr
                );
                // delimiter
                $result .= '<span class="input-group-addon"> '.($this->bsdp_delimiter == ''?'&ndash;':$this->bsdp_delimiter).' </span>';
                // second input field
                $result .= sprintf('<input type="text" name="%s[]" id="ctrl_start_%s" class="form-control" value="%s"%s>',
                        $this->strName,
                        $this->strId,
                        specialchars($this->varValue[1]),
                        $attr
                );
                                
                // wrapper group
                $result = sprintf('<div id="ctrl_grp_%s" class="input-daterange input-group %s">'.$result.'</div>',
                                                        $this->strId,
                                                        $this->bsdp_class);
 		
		// initialization script, only to be applied in front end
                if (TL_MODE=="FE") { 
                        $result .= sprintf("<script>$(document).ready(function(){ $('#ctrl_grp_%s').datepicker({ orientation: '%s', language: '%s', format:'%s'%s}); });</script>",
                                $this->strId,
                                $this->bsdp_adjust,
                                $langCode, 
                                $this->inputFormat,
                                $params
                        );
                        
                        // import assets
                        $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/bootstrap-datepicker/assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js';
                        $GLOBALS['TL_CSS'][] = 'system/modules/bootstrap-datepicker/assets/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css|static';
                        // import localized assets, except for 'en' since its embedded
                        if ($langCode != 'en') {
                                $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/bootstrap-datepicker/assets/bootstrap-datepicker/dist/locales/bootstrap-datepicker.'.$langCode.'.min.js';
                        }
		}
		return $result;
	}

 	public function validator($varInput)
 	{
                // since we get more than one value, we have to loop them
                foreach ($varInput as $value) {

                        $dateFormat = $GLOBALS['TL_CONFIG']['dateFormat'];
                        if ($value != '') {
                                // first lets validate the input field, and take the stamp of it
                                try {
                                        $objInputDate = new \Date($value, $dateFormat);
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


}
