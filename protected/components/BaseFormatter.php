<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseFormatter
 *
 * @author Lam
 */
class BaseFormatter extends CFormatter {
	
	public function formatEnum($value, $type=null) {
		if (!$value) return '';
		
		if (is_array($value)) {
			$p = $value;
			$value = $p[0];
			$type = $p[1];
		}
		return Lookup::item($type, $value);
	}
	
}
