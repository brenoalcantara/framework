<?php

/**
* 
*/
class Criteria implements Expression
{
	private $expressions;
	private $operators;
	private $properties
	
	public function __construct() {
		$this->expressions = array();
        $this->operators = array();
	}
}