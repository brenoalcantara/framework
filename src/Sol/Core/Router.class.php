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
 * @version 1.1.0
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
	public function __construct()
        {
            $param = filter_input(INPUT_GET,'param',FILTER_SANITIZE_STRING);
	    $this->url = (!empty($param)) ? explode('/', $param) : array('');
	}

	/**
	 * Retorna um parâmetro específico
	 *
	 * @param string $param
	 * @return string|bool
	 */
	public function getParam($param){
            if (array_key_exists($param, $this->url)) {
                return $this->url[$param];
            } else {
                return false;
            }
	}

	/**
	 * Retorna o controller da url
	 *
	 * @return string
	 */
	public function getController(){
            $this->controller = ($this->url[0] == null) ? '' : $this->url[0];
            return $this->controller;
	}

	/**
	 * Retorna o método
	 *
	 * @return string
	 */
	public function getAction(){
            $this->action = (isset($this->url[1]) && strlen($this->url[1]) > 0 && is_string($this->url[1])) ? $this->url[1] : '';
            return $this->action;
	}
}
