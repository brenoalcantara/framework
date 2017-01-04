<?php
/**
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2015 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @package Sol\Core
 */
namespace Sol\Core;

/**
 * Router
 * Classe para roteamento de URLs
 *
 * @version 1.0.0
 */
class Router
{
	/**
	 * Recebe a url
	 *
	 * @var array $url
	 */
	private $url = array();

	/**
	 * Recebe o controller
	 *
	 * @var string $controller
	 */
	private $controller;

	/**
	 * Recebe o método
	 *
	 * @var string $action
	 */
	private $action;

	/**
	 * Método construtor da classe
	 *
	 * @return void
	 */
	public function __construct(){
		$this->url = (isset($_GET['param'])) ? explode('/', $_GET['param']) : array('');
	}

	/**
	 * Retorna um parâmetro específico
	 *
	 * @param string $param
	 * @return mixed
	 */
	public function getParam($param){
		if (array_key_exists($param, $this->url)) {
			return $this->url[$param];
		} else {
			return false;
		}
	}

	/**
	 * Retorna o controller
	 *
	 * @return string
	 */
	public function getController(){
		$this->controller = ($this->url[0] == null) ? 'index' : $this->url[0];
		return (is_string($this->controller)) ? $this->controller : 'index';
	}

	/**
	 * Retorna o método
	 *
	 * @return string
	 */
	public function getAction(){
		$this->action = (isset($this->url[1]) && strlen($this->url[1]) != 0 && is_string($this->url[1])) ? $this->url[1] : 'init';
		return $this->action;
	}
}
