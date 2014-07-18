<?php

class Number extends Eloquent{

	public static function updateAverage(){

		$average = Number::avg('number');
		return $average;
	}	
}