<?php
/**
 * Classe para renderizacao do template
 */
class Template {
	/**
	 * Atributo que recebe o caminho do arquivo do template
	 */
	private $file;

	/**
	 * Atributo que recebe um array com os valores a serem substituidos no arquivo
	 */
	private $values = array();

	/**
	 * Metodo publico construtor que recebe o caminho do arquivo
	 */
	public function __construct($file) {
		$this->file = $file;
	}

	/**
	 * Metodo publico para setar os valores que serão substituidos no template
	 */
	public function setTag($key, $value) {
		$this->values[$key] = $value;
	}

	/**
	 * Metodo publico para percorrer as marcas do template e substitui-las pelos valores
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
	 * Metodo publico estatico para mesclar as partes do template
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