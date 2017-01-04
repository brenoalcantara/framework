<?php
/**
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2015 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @package App\Dao
 */
namespace App\Dao;

/**
 * User
 * Classe DAO para persistência de dados
 *
 * @version 1.0.0
 */
class User {

    /**
     * Recebe a conexão
     *
     * @var string $conn
     */
    private $conn;

    /**
     * Inicializa a conexão com o banco
     *
     * @param int|null $id
     * @return void
     */
    public function __construct($id = null) {
        $this->conn = Connection::getConnection();
    }

    /**
     * Insere os dados
     *
     * @param object User $user
     * @return int
     */
    public function insert(User $user) {
        try {
            $this->conn->beginTransaction();

            $sql = $this->conn->prepare("INSERT INTO user (email, password, status)
			VALUES (?, ?, ?)");

            $sql->bindValue(1, $user->getEmail(), PDO::PARAM_STR);
            $sql->bindValue(2, $user->getPassword(), PDO::PARAM_STR);
            $sql->bindValue(3, $user->getStatus(), PDO::PARAM_BOOL);
            $sql->execute();

            $lastId = $this->conn->lastInsertId();
            $this->conn->commit();

            return $lastId;
        } catch (PDOException $erro) {
            $this->conn->rollback();
            echo 'Erro: ' . $erro->getMessage();
        }
    }

    /**
     * Atualiza os dados
     *
     * @param object User $user
     * @param int $id
     * @return void
     */
    public function update(User $user, $id) {
        try {
            $this->conn->beginTransaction();

            $sql = $this->conn->prepare("UPDATE user SET email = ?, password = ?, status = ?
			WHERE id = ?");

            $sql->bindValue(1, $user->getEmail(), PDO::PARAM_STR);
            $sql->bindValue(2, $user->getPassword(), PDO::PARAM_STR);
            $sql->bindValue(3, $user->getStatus(), PDO::PARAM_INT);
            $sql->bindValue(4, $id, PDO::PARAM_INT);
            $sql->execute();

            $this->conn->commit();
        } catch (PDOException $erro) {
            $this->conn->rollback();
            echo 'Erro: ' . $erro->getMessage();
        }
    }

    /**
     * Deleta um registro
     *
     * @param int $id
     * @return void
     */
    public function delete($id) {
        try {
            $this->conn->beginTransaction();

            $sql = $this->conn->prepare("DELETE FROM user WHERE id = ?");
            $sql->bindValue(1, $id, PDO::PARAM_INT);
            $sql->execute();

            $this->conn->commit();
        } catch (PDOException $erro) {
            $this->conn->rollback();
            echo 'Erro: ' . $erro->getMessage();
        }
    }

    public function __destruct() {
        $this->conn = NULL;
    }

}
