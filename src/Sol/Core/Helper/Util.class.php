<?php
/**
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2015 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @package Sol\Core
 */
namespace Sol\Core\Helper;

/**
 * Util
 * Classe com funções utilitárias
 *
 * @version 1.0.0
 */
class Util
{
	/**
	 * Checa se o e-mail é válido
	 *
	 * @param string $email
	 * @return boolean
	 */
	public static function isValidEmail($email) {
            if (!preg_match("/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\-]+\.[a-z]{2,4}$/", $email)) {
                return false;
            }
            return true;
	}

	/**
	 * Checa se a url é válida
	 *
	 * @param string $url
	 * @return boolean
	 */
	public static function isValidUrl($url) {
            if (!preg_match("|^http(s)?://[a-z0-9-]+(\.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i", $url)) {
                return false;
            }
            return true;
	}
}
