<?php
/**
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2017 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @package Sol\Core\Model
 */
namespace Sol\Core\Model;

use Sol\Core\Database\Connection;

/**
 * Base
 * Classe base para implementação das classes de domínio
 * 
 * @version 1.0.0
 * 
 */
class DataMappers
{
    /**
     * Recebe a conexão
     *
     * @var string $conn
     */
    private $conn;
    
    /**
     * Recebe o id do objeto que será carregado
     *
     * @var string $conn
     */
    private $id;
    
    /**
     * Recebe o nome da tabela que será carregada
     *
     * @var string $conn
     */
    private $table;


    /**
     * Inicializa a conexão com o banco
     *
     * @param int|null $id
     * @return void
     */
    public function __construct($id = null, $table = null) {
        $this->id = $id;
        $this->table = $table;
        $this->conn = Connection::getConnection();
        
        if (!is_null($this->id)) {
            $this->load();
        }
    }
    
    public function load() {
        $sql = "SELECT * FROM {$this->table} WHERE id = {$this->id} ";
        $query = $this->conn->query($sql);
        
        $result = $query->fetch(\PDO::FETCH_OBJ);
        
        return $result;
    }
    
    
}
