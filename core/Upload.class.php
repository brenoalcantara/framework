<?php  

/**
 * Core
 * 
 * Classe para upload de arquivos.
 * 
 * @access public
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2015 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @version 1.0.0
 */ 

namespace Core;

class Upload
{
	/**
	 * Arquivo do form
	 * @access private
	 * @var resource $file 
	 */
	private $file;

	/**
	 * Destino do arquivo
	 * @access private
	 * @var string $path 
	 */
	private $path;

	/**
	 * Nome do arquivo
	 * @access private
	 * @var string $name 
	 */
	private $name;

	/**
	 * Tipo do arquivo
	 * @access private
	 * @var string $type 
	 */
	private $type;

	/**
	 * Nome temporario do arquivo
	 * @access private
	 * @var string $tmpName 
	 */
	private $tmpName;

	/**
	 * Mensagem de sucesso ou erro
	 * @access private
	 * @var string $message 
	 */
	private $message;

	/**
	 * Tamanho do arquivo
	 * @access private
	 * @var int $size 
	 */
	private $size;

	/**
	 * Largura da imagem
	 * @access private
	 * @var int $width 
	 */
	private $width;

	/**
	 * Altura da imagem
	 * @access private
	 * @var int $height 
	 */
	private $height;

	/**
	 * Array com as extensoes permitidas
	 * @access private
	 * @var array $allowedExtensions 
	 */
	private $allowedExtensions;

	/**
	 * Tamanho maximo permitido
	 * @access private
	 * @var int $maxSize 
	 */
	private $maxSize;

	/**
	 * Metodo construtor da classe
	 * @access public
	 * @param resource $file
	 * @return void
	 */ 
	public function __construct($file) {
		$this->file = $file;
		foreach ($this->file as $value) {
			$this->name = $value['name'];
			$this->type = $value['type'];
			$this->tmpName = $value['tmp_name'];
			$this->size = $value['size'];


			$imageSize = getimagesize($this->tmpName);
			
			if ($imageSize != false) {
				$this->width = $imageSize[0];
				$this->height = $imageSize[1];
			}
		}
	}

	/**
	 * Seta o destino do arquivo
	 * @access public
	 * @param string $path
	 * @return void
	 */
	public function setPath($path) {
		/**
		 * Checa se o diretorio tem permissao de escrita 
		 */
		if (!is_dir($path)) {
			mkdir($path, 0777, true);
		}

		$this->path = $path;
	}

	/**
	 * Seta as extensoes permitidas
	 * @access public
	 * @param array $extesions
	 * @return void
	 */
	public function setAllowedExtensions($extensions) {
		if (is_array($extensions)){
			$this->allowedExtensions = $extensions;
		} else {
			$this->allowedExtensions = array ($extensions);
		}
	}

	/**
	 * Seta o tamanho maximo permitido
	 * @access public
	 * @param int $size
	 * @return void
	 */
	public function setMaxSize($size) {
		$this->maxSize = $size;
	}

	/**
	 * Seta a mensagem de sucesso ou erro
	 * @access public
	 * @param string $message
	 * @return void
	 */
	public function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * Retorna o nome do arquivo
	 * @access public
	 * @return string $name
	 */
	public function getName() {
		return $this->slugify($this->name);
	}

	/**
	 * Retorna a extensao do arquivo
	 * @access public
	 * @return string $extension
	 */
	public function getExtension() {
		return end(explode('.', $this->name));
	}

	/**
	 * Retorna a largura da imagem.
	 * @access public
	 * @return int $width
	 */
	public function getWidth() {
		return $this->width;
	}

	/**
	 * Retorna a altura da imagem
	 * @access public
	 * @return int $height
	 */
	public function getHeight() {
		return $this->height;
	}

	/**
	 * Retorna a mensagem de erro ou sucesso
	 * @access public
	 * @return string $message
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * Executa o upload do arquivo
	 * @access public
	 * @return void
	 */
	public function upload() {
		if(!is_dir($this->path)){
			$this->setMessage('O destino não é um diretório!');
		} elseif(!is_writable($this->path)) {
			$this->setMessage('O destino não tem permissão de escrita!');
		} elseif($this->getName() == ''){
			$this->setMessage('Nenhum arquivo encontrado!');
		} elseif(!in_array($this->getExtension(), $this->allowedExtensions)) {
			$this->setMessage('Arquivo no formato inválido!');
		} elseif($this->size > $this->maxSize) {
			$this->setMessage('Tamanho máximo excedido. Limite: '.$this->maxSize.' bytes!');
		} else {
			if (!move_uploaded_file($this->tmpName, $this->path.$this->getName())){
				$this->setMessage('Falha no upload do arquivo!');
			} else {
				$this->setMessage('Sucesso no upload do arquivo!');
			}
		}
	}

	/**
	 * Retira os caracteres especiais e acentos do nome do arquivo
	 * @access private
	 * @param string $string
	 * @return string $string
	 */
	private function slugify($string) {
        $signal = array(
            'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
            'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;|&ordf;/',
            'C' => '/&Ccedil;/',
            'c' => '/&ccedil;/',
            'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
            'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
            'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
            'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
            'N' => '/&Ntilde;/',
            'n' => '/&ntilde;/',
            'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
            'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;|&ordm;/',
            'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
            'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
            'Y' => '/&Yacute;/',
            'y' => '/&yacute;|&yuml;/');

        return preg_replace($signal, array_keys($signal), strtolower(htmlentities(str_replace(array
        (" ", "_", ",", ":", "?", "!", "+", "@", "&"), "-", $string), ENT_NOQUOTES, "UTF-8")));
    }
}