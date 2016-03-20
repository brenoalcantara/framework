<?php
/**
 * Sol\Core
 *
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2015 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
*/

namespace Sol\Core;

use Exception;

/**
 * Template
 * Classe para renderizacao de templates
 *
 * @version 1.0.0
 * @todo Add suporte a laços de repetição
 */
class Template {
	/**
	 * Recebe o caminho do arquivo do template
	 *
	 * @var string $file
	 */
	private $file;

	/**
	 * Recebe um array com os valores a serem substituidos no arquivo
	 *
	 * @var array $values
	 */
	private $values = array();

	/**
	 * Metodo construtor
	 *
	 * @param string $file
	 * @return void
	 */
	public function __construct($file) {
		$this->file = $file;
	}

	/**
	 * Seta os valores que serão substituidos no template
	 *
	 * @param string $key
	 * @param string $value
	 * @return void
	 */
	public function setTag($key, $value) {
		$this->values[$key] = $value;
	}

	/**
	 * Percorre as marcas do template e as substitui pelos valores
	 *
	 * @return string $output
	 */
	public function output() {
		try {
			$output = file_get_contents($this->file);

			foreach ($this->values as $key => $value) {
				$tag = "$key";
				$output = str_replace($tag, $value, $output);
			}

			return $output;
		} catch(Exception $e) {
			echo 'Erro: ' . $e->getMessage();
		}
	}

	/**
	 * Mescla as partes do template
	 *
	 * @param string $templates
	 * @param string $separator
	 * @return string $output
	 */
	public static function outputTemplates($templates, $separator = "\n") {
		try {
			$output = '';

			foreach ($templates as $template) {
				$content = $template->output();
				$output .= $content . $separator;
			}

			return $output;
		} catch(Exception $e) {
			echo 'Erro: ' . $e->getMessage();
		}
	}
}
?>
