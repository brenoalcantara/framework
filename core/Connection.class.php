<?php
/**
 * Framework\Core
 * 
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2015 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @package Framework\Core
 */
namespace Framework\Core;

/**
 * Connection
 * Classe final padrao Singleton para conexao com o Mysql 
 * 
 * @version 1.0.0
 */
final class Connection
{
	/**
	 * Constantes para a definição da string de conexão via PDO.
	 */ 
	const DSN  = 'mysql:host=localhost;dbname=database';
	const USER = 'root';
	const PASS = 'password';

	/**
	 * Recebe a conexão
	 * 
	 * @var string $conn
	 */ 
	private static $conn;

	/**
	 * Método construtor da classe
	 * 
	 * @return void 
	 */
	private function __construct(){}

	/**
	 * Retorna a conexão
	 * 
	 * @return resource
	 */
	public static function getConnection() {
		try {
			if (self::$con == NULL){
				self::$con = new PDO(self::DSN, self::USER, self::PASS);
				return self::$con;
			}
		}
		catch(PDOException $erro) {
			echo 'Erro: ' . $erro->getMessage();
		}
	}
}
