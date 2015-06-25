<?php

/**
 * 
 * Core
 * 
 * Classe para criação de hash
 * 
 * @access public
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2015 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @version 1.0.0
*/

class Crypt {
	
	/**
	 * Prefixo: 2a
	 * 
	 * @access private
	 * @var string $prefix
	*/
	private $prefix;

	/**
	 * Custo: 10
	 * 
	 * @access private
	 * @var int $cost 
	*/
	private $cost;
	
	/**
	 * Tamanho: 22
	 * 
	 * @access private
	 * @var string $length 
	*/
	private $length;
	
	/**
	 * Método construtor da classe
	 *  
	 * @param string $prefix
	 * @param int $cost
	 * @param string $length
	 * @return void
	*/ 
	public function __construct($prefix = '2a', $cost = 10, $length = '22') {
		$this->prefix = $prefix;
		$this->cost = $cost;
		$this->length = $length;
	}
	
	/**
	 * Encripta a string
	 * 
	 * @access public
	 * @param string $string
	 * @return string $string
	*/ 
	public function encripty($string) {
		$salt = $this->generateSalt();
		$hash = $this->generateHash($salt);
		return crypt($string, $hash);
	}
	
	/**
	 * Checa a string 
	 * 
	 * @access public
	 * @param string $string
	 * @param string $hash
	 * @return boolean
	*/
	public static function check($string, $hash) {
		return (crypt($string, $hash) === $hash);
	}
	
	/**
	 * Gera o salt
	 * 
	 * @access public
	 * @return string $salt
	*/
	public function generateSalt() {
		$salt = '';
		$collection = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$max = strlen($collection) - 1;
		
		for($i = 0; $i < $this->length; $i++) {
			$salt .= $collection{mt_rand(0, $max)};
		}
		return $salt;
	}
	
	/**
	 * Gera o hash
	 * 
	 * @access public
	 * @param string $salt
	 * @return string $hash
	*/
	public function generateHash($salt) {
		return sprintf('$%s$%02d$%s$', $this->prefix, $this->cost, $salt);
	}
	
	/**
	 * Gera o token
	 * 
	 * @access public
	 * @param string $string
	 * @return string $token
	*/
	public function generateToken($string) {
		$token = $this->encripty($string);
		return base64_encode($token);
	}
	
	/**
	 * Checa o token
	 * 
	 * @access public
	 * @param string $string
	 * @param string $token
	 * @return string $salt
	*/
	public static function checkToken($string, $token) {
		$hash = base64_decode($token);
		return (crypt($string, $hash) === $hash);
	}
}