<?php
/**
 * Core
 * 
 * Classe final no padrao Singleton para conexao com o Mysql
 *
 * @access public
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2015 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @version 1.0.0
 */

namespace Core;

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
	 * @access private
	 * @var string $conn
	 */ 
	private static $conn;

	/**
	 * Método construtor da classe
	 * 
	 * @access private
	 * @return void 
	 */
	private function __construct(){}

	/**
	 * Retorna a conexão
	 * 
	 * @access public
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