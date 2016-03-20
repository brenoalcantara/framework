<?php
/**
 * Sol\Core
 * 
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2015 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @package Core
 */
namespace Sol\Core;

/**
 * Session
 * Classe final para gerenciamento de sessão
 *
 * @version 1.0.0
 */
final class Session
{
	/**
	 * Metodo construtor da classe. Inicializa a sessão
	 * 
	 * @return void 
	 */
	public function __construct() {
		session_start();
	}

	/**
	 * Impede a clonagem da classe
	 * 
	 * @return string
	 */
	public function __clone() {
		throw new Exception('Clone não permitido.');
	}

	/**
	 * Seta a variavel da sessao e o seu valor
	 * 
	 * @param mixed $var
	 * @param mixed $valor
	 * @return void
	 */
	public function setSession($var, $value) {
		$_SESSION[$var] = $value;
	}

	/**
	 * Retorna o valor da variavel da sessao
	 * 
	 * @param mixed $var
	 * @return mixed
	 */
	public function getSession($var) {
		if (isset($_SESSION[$var])) {
			return $_SESSION[$var];
		}
	}

	/**
	 * Destrói a sessão
	 * 
	 * @return void
	 */
	public function sessionDestroy() {
		$_SESSION = array();
        session_destroy();
	}
}
