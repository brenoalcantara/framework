<?php
/**
 * Sol\Core\Database
 * 
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2017 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace Sol\Core\Database; 

use PDO;
use PDOException;

/**
 * Connection
 * Classe final padrao Singleton para conexao com o Mysql 
 * 
 * @version 1.0.1
 * @todo Add suporte para outros bancos: PostgreSql, Sqlite...
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
     * Método clone da classe
     * 
     * @return void 
     */
    private function __clone() {}
    
    /**
     * Método wakeup da classe
     * 
     * @return void 
     */
    private function __wakeup() {}

    /**
     * Retorna a conexão
     * 
     * @return resource|string
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
